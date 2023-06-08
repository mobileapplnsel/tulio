<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Project;
use App\Models\Shortlist;
use App\Models\User;
use App\Models\Technique;
use App\Models\Ambience;
use App\Models\Design;
use Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;



class DesignerController extends Controller
{
    public function login()
    {
        //set default page meta details
        $title = "Project Management Tool for Architects & Interior Designers | Tulio";
        $description = "A soft furnishings selection and project management tool for Architects & Interior Designers which helps product selection, price discovery, project board creation and client servicing";
        $keywords = "Curtain selection portal, curtain selection platform, curtain selection software, soft-furnishings selection portal, soft-furnishings project software, Interior design project management, Interior design project management services, Interior design project management software";
        
        return view('designer.login',compact('title','description','keywords'));
    }

    public function authenticate(Request $request)
    {
       //validate fields
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        
        //find user in database
        $user = User::where('email', $request->email)->first();

        //if user doesnt exist throw error
        if(! isset($user)){
            return redirect()->route('login')->withErrors(['email' => 'Invalid email or password']);
        }else{  
            //if user exist check if verified
            if(isset($user->email_verified_at)){
            
                $user->email_verified_at = date('Y/m/d H:i:s', time());
                $credentials = $request->only('email', 'password');
                    if (auth()->guard('designer')->attempt($credentials+['user_type'=>2])||
                        auth()->guard('designer')->attempt($credentials+['user_type'=>3])) {
                        return redirect()->route('designer.dashboard');
                    }
                     return redirect()->route('login')->withErrors(['email' => 'Invalid email or password']);
            }else{
                return redirect()->route('login')->with('success','Your Account hasnt been Approved yet.');
            }
        
        }
    }

    public function register()
    {
        return view('designer.register');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email:rfc,dns|unique:users',
            'password' => 'required|confirmed',
            'last_name' => 'required',
            'company_studio_name' => 'required',
            'phone_number' => 'required',
            'design' => 'required',
        ]);
        //|regex:/^([0-9\s\-\+\(\)]*)$/|min:10
        //dd($request->size);die;
        
        $data = $request->only('name', 'email', 'password','last_name','design','company_studio_name','phone_number');
        $data['poc_name'] = 'Tania Guha';
        $data['poc_number'] = '+91 92255 55559';
        $data['user_type'] =  $data['design'] == 'Architect' ? 3 : 2;
        $data['password'] = Hash::make($data['password']);
        
         if($request->design == 'Architect' || $request->design == 'Designer' || $request->design == 'Hotelier')
        {
            if(Empty($request->size))
            {
            
                return redirect()->route('register')->with('success','Select Size');
            }
            else
            {
                
                 $data['size'] = $request->size;
            }
        }
        else
        {
                 $data['size'] = 0;
        }
          
        
        // Send Enquiry Emails instead of creating user if the user is Hotelier or Home Owner
       
        if($request->design == 'Homeowner' ||$request->design == 'Hotelier'){
        
            $senderEmail = 'hello@tulio.design';
            Notification::route('mail',$senderEmail)->notify(new \App\Notifications\CustomerInterest($data['name'],$data['email'],$data['phone_number']));
            Notification::route('mail',$data['email'])->notify(new \App\Notifications\CustomerInterestAutoReply());

            return redirect()->route('login')->with('success','Thank You For Registering, One of Our Team Members will reach out to you soon');

        }
        else
        {
        // create user and send approval request   
//dd($data);
        $user = User::create($data);

        Notification::route('mail',$request->email)
        ->notify(new \App\Notifications\RegisterWelcome());

        Notification::route('mail','hello@tulio.design')
        ->notify(new \App\Notifications\ApprovalRequest(
        $request->name,
        $request->last_name,
        $request->design,
        $request->company_studio_name,
        $request->email,
        $request->phone_number));
        
       
        return redirect()->route('login')->with('success','Thank You For Registering, One of Our Team Members will Approve Account Soon');
        }
    }

    public function dashboard()
    {
        // $categories = Category::root()->with('children')->get();
        $categories = Category::findMany([1, 10, 17]);
        $filtered_products = [];
        foreach ($categories as $category){
            $selected_categories = $category->children()->pluck('cat_id');
            $selected_categories->add($category->cat_id);
            array_push($filtered_products,Product::with('detail.colours.colour','image')->whereIn('cat_id',$selected_categories)); 
        }
       $iterator = 0;
        return view('user.dashboard',compact('categories','filtered_products','iterator'));
    }

    public function profile()
    {
    //    $categories = Category::root()->with('children')->get();
        $categories = Category::findMany([1, 10, 17]);
        return view('user.profile',compact('categories'));
    }

    public function profileUpdate(Request $request)
    {
        $user = auth()->guard('designer')->user();
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'password' => 'confirmed',
            'poc_name' => 'required',
            'poc_number' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10'
        ]);
        $data = $request->only('name', 'email', 'password','poc_name','poc_number');
        if($data['password'])
        {
            $data['password'] = Hash::make($data['password']);
        }
        else
        {
            unset($data['password']);
        }
        
        $user->update($data);
        return redirect()->route('designer.profile')->with('success','Profile updated successfully');
    }

    public function shortlist()
    {   
        $techniques = Technique::all();
        $ambiences = Ambience::all();
        $designs = Design::all();

        $shortlists = auth()->guard('designer')->user()->shortlists()
                      ->when(request('type'),function($q){
                        $q->whereHas('product.detail',function($q){
                          $q->where('pd_sc',request('type'));
                        });
                      })->when(request('technique'),function($q){
                        $q->whereHas('product.detail',function($q){
                          $q->where('pd_tq', 'like', '%'.request('technique').'%');
                        });
                      })->when(request('ambience'),function($q){
                        $q->whereHas('product.detail',function($q){
                          $q->where('pd_am', 'like', '%'.request('ambience').'%');
                        });
                      })->when(request('design'),function($q){
                        $q->whereHas('product.detail',function($q){
                          $q->where('pd_de', 'like', '%'.request('design').'%');
                        });
                      })
                      ->when(request('category'),function($q){
                        
                        $q->join('product', 'product_id', '=', 'product.p_id')
                        ->join('category', 'category.cat_id', '=', 'product.cat_id')
                        ->where('parent_id',request('category'));
                    })->get();

        $shortlist_categories = Category::findMany([1, 10, 17])->pluck('cat_nm','cat_id');
        // $categories = Category::root()->with('children')->get();
        $categories = Category::findMany([1, 10, 17]);
        return view('user.shortlist', compact('shortlists','categories','shortlist_categories','techniques','ambiences','designs'));
    }

    public function shortlistDestroy(Shortlist $shortlist)
    {
        $shortlist->delete();
        return redirect()->route('designer.shortlist');
    }

    public function projectDestroy(Project $project)
    {
        $project->delete();
        return redirect()->route('designer.project');
    }

    public function project()
    {
        // $categories = Category::root()->with('children')->get();
        $categories = Category::findMany([1, 10, 17]);
        return view('user.project', compact('categories'));
    }

    public function projectBoard(Request $request)
    {
        $user = auth()->guard(guard_name())->user();
        $projects = $user->projects()->with('rooms.products',function($q){$q->whereNotNull('product_id');})->where('status','active')->get();
        $assign_project = $user->assign_projects()->with('rooms.products',function($q){$q->whereNotNull('product_id');})->get();
        $assign_project->each(function($p) use($projects){$projects->push($p);});
        // $categories = Category::root()->with('children')->get();
        $categories = Category::findMany([1, 10, 17]);
        $project_id = $request->project?decrypt($request->project):null;
        $project = $project_id?$projects->where('id',$project_id)->first():$projects->first();
        $projects = $projects->flatMap(function($p){return [encrypt($p->id)=>$p->name];});
        return view('user.project-board',compact('projects','project','user','categories'));
    }

    public function placeOrder(Request $request)
    {
        $this->validate($request, [
            'project' => 'required',
        ]);
        $project = Project::find(decrypt($request->project));
        $project->status = 'Complete';
        $project->save();
        return response()->json(['success'=>'Order placed successfully']);
    }

    public function shareProject(Project $project,Request $request)
    { 

        $shared_name = "Shared User";
        if($request->name){
            session(['comment_by'=>decrypt($request->name)]);
            $shared_name = decrypt($request->name);
        }
        return view('user.project-board',compact('project','shared_name'));
    }

    public function projectCompleted()
    {

        $user = auth()->guard(guard_name())->user();
        $projects = $user->projects()->where('status','Complete')->paginate(5);
        $assign_project = $user->assign_projects()->where('status','Complete')->paginate(5);
        $assign_project->each(function($p) use($projects){$projects->push($p);});
        // $categories = Category::root()->with('children')->get();
        $categories = Category::findMany([1, 10, 17]);

        return view('user.project-completed',compact('projects','user','categories'));
    }

    public function projectShare(Request $request)
    {
        $this->validate($request, [
            'project_id' => 'required',
            'name'=>'required|max:50',
            'email'=>'required|email:rfc,dns',
            'phone'=>'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
        ]);
        $project = Project::find(decrypt($request->project_id));
        Notification::route('mail',$request->email)
                    ->notify(new \App\Notifications\ProjectShare($project,$request->name));
        return response()->json(['message'=>'Project shared successfully']);
    }

    public function projectUpdate(Request $request)
    {  
        $this->validate($request, [
        'projectname'=>'required',
        'shared_name'=>'required'
    ]);

    $user = User::where('id', $request->user_id)->first();
   
    Notification::route('mail',$user->email)
    ->notify(new \App\Notifications\UpdateProject(
        $request->projectname,
        $request->shared_name,
        $request->additional_message
    ));
    return "mailsent";
    }

    public function projectApproval(Request $request)
    { 
        $this->validate($request, [
            'projectname'=>'required',
            'shared_name'=>'required'
        ]);

        $user = User::where('id', $request->user_id)->first();
       
        Notification::route('mail',$user->email)
        ->notify(new \App\Notifications\ApproveProjectNotif(
            $request->projectname,
            $request->shared_name,
            $request->additional_message
        ));
        return "mailsent";
    }


    public function assistant()
    {
        Notification::send(User::admin()->first(),
        new \App\Notifications\AssistantNotification(auth()->guard('designer')->user()));
        return response()->json(['message'=>'Someone will be with you shortly']);
    }
}
