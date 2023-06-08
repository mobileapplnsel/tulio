<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Hotel;
use App\Models\Product;
use App\Models\ProjectRoom;
use App\Models\Shortlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use App\Models\Signature_Products;
use App\Models\User;
use Illuminate\Support\Facades\Notification;
use App\Models\Technique;
use App\Models\Ambience;
use App\Models\Design;
use App\Models\NewsLetter;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //set default page meta details
            $title = "Design-Led Curtains and Blinds for Hotel Projects | Tulio Design";
            $description = "Tulio Design provides complete, turn-key solutions for large hotel projects, including infrastructure & on-site installation. Our fully integrated company handles every aspect of the process, from manufacturing to final installation";
            $keywords = "Hotel curtains, Custom curtains for hotels, Designer hotel curtains, Luxury hotel curtains, Blackout hotel curtains, Soundproof hotel curtains, Hotel curtain fabric, Hotel window treatments, Hotel room curtains, Hotel drapery";
        $signature_products = Signature_Products::where('id',1)->first();
        return view('home',compact('signature_products','title','description','keywords'));
    }
    
    public function process()
    {
        $title = "Standardized Process for Curtains, Blinds & Rugs Creation | Tulio";
        $description = "Shop for high-quality Premium blinds online at Tulio Design. Choose from a wide collection of custom window blinds for your Space. Request a quote Now!";
        $keywords = "blinds curtains, made to measure roller blinds, vertical blinds curtains, roller blinds made to measure, curtains roller blinds, roller blinds curtains, roller, blinds with curtains, curtains, vertical blinds, vertical blinds with curtains, living room roller blinds, roller blinds manufacturer";
        return view('process',compact('title','description','keywords'));
    }
    public function hotel(Hotel $hotel)
    {
        $title = $hotel->meta_title;
        $description = $hotel->meta_description;
        $keywords = $hotel->meta_keyword;
        return view('hotel',compact('hotel','title','description','keywords'));
    }

    public function hotelier()
    {
        //set default page meta details
        $title = "Design-Led Curtains and Blinds for Hotel Projects | Tulio Design";
        $description = "Tulio Design provides complete, turn-key solutions for large hotel projects, including infrastructure & on-site installation. Our fully integrated company handles every aspect of the process, from manufacturing to final installation";
        $keywords = "Hotel curtains, Custom curtains for hotels, Designer hotel curtains, Luxury hotel curtains, Blackout hotel curtains, Soundproof hotel curtains, Hotel curtain fabric, Hotel window treatments, Hotel room curtains, Hotel drapery";
        
        //$hotels = Hotel::all();
        $hotels = Hotel::orderBy('sequence', 'ASC')->get();
        //dd($hotels);
        return view('hotelier',compact('hotels','title','description','keywords'));
    }


    public function designer()
    {
         //set default page meta details
         $title = "A+ ID Portal: Interior Designer & Architect Project Management Software | Tulio";
         $description = "Tulio Portal - a project management & specification software for interior designers & architects that simplifies the process by bringing everything together in one place. Explore our made-to-measure textile solutions to help enhance the spaces A&D designs";
         $keywords = "Interior design project management, Interior design project management services, Interior design project management software, Interior design project management process, Interior design project portal, Interior design project management techniques, Interior design project management tools";
 
        return view('designer',compact('title','description','keywords'));
    }

    public function contacts()
    {
        return view('store_locator');
    }

    public function faq()
    {
        $title = " ";
        $description = " ";
        $keywords = " ";

       return view('faq',compact('title','description','keywords'));
        
    }

    public function privacy_policy()
    {
        return view('privacy_policy');
    }
    public function tulio_care()
    {
        return view('tulio-care');
    }

    public function terms_conditions()
    {
        return view('terms_conditions');
    }
    public function aboutUs()
    {
        return view('about');
    }

    public function category(Category $category)
    {   
        $techniques = Technique::all();
        $ambiences = Ambience::all();
        $designs = Design::all();
        // $categories = Category::root()->with('children')->get();
        $categories = Category::findMany([1, 10, 17]);
        $selected_categories = $category->children()->pluck('cat_id');
        $selected_categories->add(['cat_id'=>$category->cat_id]);
        $products = Product::with('detail.colours.colour','image')->whereIn('cat_id',$selected_categories)
                ->join('product_detail', 'product_detail.p_id', '=', 'product.p_id')
                ->when(request('sortby'), function ($query) {
                    if(request('sortby') == 'price_low_to_high'){
                        $query->orderBy('product_detail.pd_pr', 'asc');
                    }elseif(request('sortby') == 'price_high_to_low'){
                        $query->orderBy('product_detail.pd_pr', 'desc');
                    }
                    elseif(request('sortby') == 'name_a_to_z'){
                        $query->orderBy('product_detail.pd_nm', 'asc');
                    }elseif(request('sortby') == 'name_z_to_a'){
                        $query->orderBy('product_detail.pd_nm', 'desc');
                    }
                    elseif(request('sortby') == 'new'){
                        $query->orderBy('product_detail.pd_cr_dt', 'desc');
                    }
                })
                ->when(request('type'),function($q){
                    $q->whereHas('detail',function($q){
                        $q->where('pd_sc',request('type'));
                    });
                })->when(request('technique'),function($q){
                    $q->whereHas('detail',function($q){
                        $q->where('pd_tq','LIKE','%'.request('technique').'%');
                    });
                })->when(request('ambience'),function($q){
                    $q->whereHas('detail',function($q){
                        $q->where('pd_am','LIKE','%'.request('ambience').'%');
                    });
                })->when(request('design'),function($q){
                    $q->whereHas('detail',function($q){
                        $q->where('pd_de','LIKE','%'.request('design').'%');
                    });
                })->latest()->paginate(12)->appends(request()->all());

                $user = auth()->guard('designer')->user();

                //set default page meta details
                $title = $category->meta_title;
                $description = $category->meta_description;
                $keywords = $category->keyword;


                //set page specific meta details
                // if($category->cat_id == 1 ||$category->parent_id == 1 ){
                //     $title = "Curtains Online: Buy Designer, Luxury, Embroidered & Premium Curtains | Tulio";
                //     $description = "Shop for designer curtains online at Tulio Design. Choose from a wide selection of luxury, premium, & embroidered curtains, or customize your own to fit any size project. Our curtain fabric solutions are tailored to meet the needs of architects & interior designers";
                //     $keywords = "curtains online, living room curtains, designs of curtains for bedroom, designer window curtains, modern living room curtains, window curtains online, bathroom curtains, curtain store, curtain cloth, made to measure curtains, roman curtains";
                // }elseif($category->cat_id == 10||$category->parent_id == 10 ){
                //     $title = "Blinds: Made to measure blinds - Custom Blinds for Hotel, Home & Office | Tulio";
                //     $description = "Shop for high-quality blinds curtain online at Tulio Design. Choose from a wide selection of custom window blinds for your home or office. Request a quote today";
                //     $keywords = "blinds curtains, made to measure roller blinds, vertical blinds curtains, roller blinds made to measure, curtains roller blinds, roller blinds curtains, roller, blinds with curtains, curtains, vertical blinds, vertical blinds with curtains, living room roller blinds, roller blinds manufacturer";
                // }
                

                return view('category', compact('category', 'products','categories','user','techniques','ambiences','designs','title','description','keywords'));
            }

    public function product(Product $product)
    {
        $title = $product->meta_title;
        $description = $product->meta_description;
        $keywords = $product->meta_keyword;
        $techniques = Technique::all();
        $ambiences = Ambience::all();
        $designs = Design::all();
        $shortlist = Shortlist::find(request('shortlist'));
        $relatedProducts = Product::limit(6)->where('cat_id',$product->cat_id)->get();
        if($relatedProducts->count()<6){
            $relatedProducts = Product::limit(6)->inRandomOrder()->get();
        }

        // $categories = Category::root()->with('children')->get();
        $categories = Category::findMany([1, 10, 17]);

        $user = auth()->guard('designer')->user();
        return view('product', compact('product','shortlist','relatedProducts','categories','user','techniques','ambiences','designs','title','description','keywords'));
    }

    public function productList()
    {
        $techniques = Technique::all();
        $ambiences = Ambience::all();
        $designs = Design::all();
        // $categories = Category::root()->with('children')->get();
        $categories = Category::findMany([1, 10, 17]);
        $myCategories = [1,10,21,22, 19,20,17,50,51,52];

    //   $products = Product::with('detail.colours.colour','image')
    $products = Product::whereIn('cat_id', $myCategories)
                    ->join('product_detail', 'product_detail.p_id', '=', 'product.p_id')
                    ->when(request('sortby') == null,function ($query) {
                        $query->orderBy('product.p_up_dt', 'desc');
                    })
                    ->when(request('sortby'), function ($query) {
                        if(request('sortby') == 'price_low_to_high'){
                            $query->orderBy('product_detail.pd_pr', 'asc');
                        }elseif(request('sortby') == 'price_high_to_low'){
                            $query->orderBy('product_detail.pd_pr', 'desc');
                        }
                        elseif(request('sortby') == 'name_a_to_z'){
                            $query->orderBy('product_detail.pd_nm', 'asc');
                        }elseif(request('sortby') == 'name_z_to_a'){
                            $query->orderBy('product_detail.pd_nm', 'desc');
                        }
                        elseif(request('sortby') == 'new'){
                            $query->orderBy('product_detail.pd_cr_dt', 'desc');
                        }
                    })
                    ->when(request('type'),function($q){
                        $q->whereHas('detail',function($q){
                            $q->where('pd_sc',request('type'));
                        });
                    })->when(request('technique'),function($q){
                        $q->whereHas('detail',function($q){
                            $q->where('pd_tq','LIKE','%'.request('technique').'%');
                        });
                    })->when(request('ambience'),function($q){
                        $q->whereHas('detail',function($q){
                            $q->where('pd_am','LIKE','%'.request('ambience').'%');
                        });
                    })->when(request('design'),function($q){
                        $q->whereHas('detail',function($q){
                            $q->where('pd_de','LIKE','%'.request('design').'%');
                        });
                    })->orderBy('cat_id')->paginate(12)->appends(request()->all());

                    $user = auth()->guard('designer')->user();
        return view('category', compact('products','categories','user','techniques','ambiences','designs'));
    }

    public function projectRoomComment(Request $request)
    {
        $request->validate([
            'room_id' => 'required',
            'comment' => 'required',
        ]);
        $room = ProjectRoom::find(decrypt($request->room_id));
        $room->comments()->create([
            'comment' => $request->comment,
            'comment_by' => (optional(auth()->guard(guard_name())->user())->name??(session('comment_by')??'NA')),
            'user_id' => optional(auth()->guard(guard_name())->user())->id,
        ]);
        return back()->with('success', 'Comment added successfully');
    }

public function contactMail(Request $request)
    {   

        $request->validate([
            'popup-name' => 'required',
            'popup-email' => 'required',
            'popup-number' => 'required'
        ]);
       
        $newsletter['name'] = $request->input('popup-name');
        $newsletter['email'] = $request->input('popup-email');
        $newsletter['phone'] = $request->input('popup-number');
        if($request->input('type')){
        $newsletter['type'] = $request->input('type');
        }else{
        $newsletter['type'] = "homeowner"; 
        }

        NewsLetter::create($newsletter);

        //send emails
        $senderEmail = 'hello@tulio.design';
        Notification::route('mail',$senderEmail)->notify(new \App\Notifications\CustomerInterest($request->input('popup-name'),$request->input('popup-email'),$request->input('popup-number')));
        Notification::route('mail',$request->input('popup-email'))->notify(new \App\Notifications\CustomerInterestAutoReply());

        return "mailsent";

    }

    public function magazine()
    {
         //set default page meta details
         $title = "Magazine | Tulio";
         $description = "A soft furnishings selection and project management tool for Architects & Interior Designers which helps product selection, price discovery, project board creation and client servicing";
         $keywords = "Curtain selection portal, curtain selection platform, curtain selection software, soft-furnishings selection portal, soft-furnishings project software, Interior design project management, Interior design project management services, Interior design project management software";
 
        return view('magazine',compact('title','description','keywords'));
    }


    public function magazineDetails()
    {
         //set default page meta details
         $title = "Magazine details | Tulio";
         $description = "A soft furnishings selection and project management tool for Architects & Interior Designers which helps product selection, price discovery, project board creation and client servicing";
         $keywords = "Curtain selection portal, curtain selection platform, curtain selection software, soft-furnishings selection portal, soft-furnishings project software, Interior design project management, Interior design project management services, Interior design project management software";
 
        return view('magazine_details',compact('title','description','keywords'));
    }
    
    
    // Code by Soumita Talukder
    
    public function viewProductType(Category $category)
    {
        // $categories = Category::root()->with('children')->get();
        
        $categories = Category::findMany([1, 10, 17]);
        $sub_cat_products = [];
        $cat_products = [];

        $sub_categories = $category->children;
        $cat_name = $category->pluck('cat_nm');
        $selected_categories = $category->children()->pluck('cat_id');
        $selected_categories->add(['cat_id'=>$category->cat_id]);

        array_push($cat_products,Product::with('detail.colours.colour','image')->whereIn('cat_id',$selected_categories));  

        $iterator = 0;
        $user = auth()->guard('designer')->user();

        //set default page meta details
        $title = $category->meta_title;
        $description = $category->meta_description;
        $keywords = $category->keyword;


        //set page specific meta details
        // if($category->cat_id == 1 ||$category->parent_id == 1 ){
        //     $title = "Curtains Online: Buy Designer, Luxury, Embroidered & Premium Curtains | Tulio";
        //     $description = "Shop for designer curtains online at Tulio Design. Choose from a wide selection of luxury, premium, & embroidered curtains, or customize your own to fit any size project. Our curtain fabric solutions are tailored to meet the needs of architects & interior designers";
        //     $keywords = "curtains online, living room curtains, designs of curtains for bedroom, designer window curtains, modern living room curtains, window curtains online, bathroom curtains, curtain store, curtain cloth, made to measure curtains, roman curtains";
        // }elseif($category->cat_id == 10||$category->parent_id == 10 ){
        //     $title = "Blinds: Made to measure blinds - Custom Blinds for Hotel, Home & Office | Tulio";
        //     $description = "Shop for high-quality blinds curtain online at Tulio Design. Choose from a wide selection of custom window blinds for your home or office. Request a quote today";
        //     $keywords = "blinds curtains, made to measure roller blinds, vertical blinds curtains, roller blinds made to measure, curtains roller blinds, roller blinds curtains, roller, blinds with curtains, curtains, vertical blinds, vertical blinds with curtains, living room roller blinds, roller blinds manufacturer";
        // }
        
        return view('type_product',compact('sub_categories','categories','iterator','category', 'cat_name', 'user', 'cat_products','title','description','keywords'));
    }

    public function viewProductCategory(Category $category,$subcategory)
    {
        // $categories = Category::root()->with('children')->get();
        $cat_id = Category::where('slug',$subcategory)->pluck('cat_id');
        $categories = Category::findMany([1, 10, 17]);
        $sub_categories = Category::where('cat_id',$cat_id)->first();
        $category_products = [];
        $techniques = Design::all();
        foreach ($techniques as $technique){
            // $selected_categories = $category->children()->pluck('cat_id');
            // $selected_categories->add($category->cat_id);
            array_push($category_products,Product::with('detail.colours.colour','image')->where('cat_id',$cat_id)
            ->join('product_detail', 'product_detail.p_id', '=', 'product.p_id')
            ->where('pd_de','LIKE','%'.$technique->name.'%'));
        }
          
        $iterator = 0;
        $user = auth()->guard('designer')->user();
        
        $title = $sub_categories->meta_title;
        $description = $sub_categories->meta_description;
        $keywords = $sub_categories->meta_keyword;
        
        return view('category_product',compact('sub_categories','techniques','category','categories','iterator','category_products', 'user','cat_id','title','description','keywords'));
    }

    public function viewAllProductCategory(Category $category,$subcategory,$technique_slug)
    {
        // $categories = Category::root()->with('children')->get();
        
        $categories = Category::findMany([1, 10, 17]);
        $sub_categories = "";
        $category_products = [];
        $techniques = Design::all();


        if($subcategory!='ambience')
        {
            $techniques_detail = Design::join('designs_detail', 'designs_detail.design_id', '=', 'designs.id')->where('designs_detail.slug',$technique_slug)->first();
            $technique_name = $techniques_detail->name;
            $cat_id = Category::where('slug',$subcategory)->pluck('cat_id');   
            $sub_categories = Category::where('cat_id',$cat_id)->first();
            $category_products = Product::with('detail.colours.colour','image')->where('cat_id',$cat_id)
            ->join('product_detail', 'product_detail.p_id', '=', 'product.p_id')
            ->where('pd_de','LIKE','%'.$technique_name.'%')
            ->when(request('sortby'), function ($query) {
                if(request('sortby') == 'price_low_to_high'){
                    $query->orderBy('product_detail.pd_pr', 'asc');
                }elseif(request('sortby') == 'price_high_to_low'){
                    $query->orderBy('product_detail.pd_pr', 'desc');
                }
                elseif(request('sortby') == 'name_a_to_z'){
                    $query->orderBy('product_detail.pd_nm', 'asc');
                }elseif(request('sortby') == 'name_z_to_a'){
                    $query->orderBy('product_detail.pd_nm', 'desc');
                }
                elseif(request('sortby') == 'new'){
                    $query->orderBy('product_detail.pd_cr_dt', 'desc');
                }
            })
            ->latest()->paginate(8)->appends(request()->all());

        }
        else
        {
            $techniques_detail = Ambience::join('ambience_detail', 'ambience_detail.ambience_id', '=', 'ambiences.id')->where('ambience_detail.slug',$technique_slug)->first();
            $technique_name = $techniques_detail->name;
            $cat_id = $category->children()->pluck('cat_id');
            $cat_id->add($category->cat_id);
            $category_products = Product::with('detail.colours.colour','image')->whereIn('cat_id',$cat_id)
                ->join('product_detail', 'product_detail.p_id', '=', 'product.p_id')
                ->where('pd_am','LIKE','%'.$technique_name.'%')
                ->when(request('sortby'), function ($query) {
                    if(request('sortby') == 'price_low_to_high'){
                        $query->orderBy('product_detail.pd_pr', 'asc');
                    }elseif(request('sortby') == 'price_high_to_low'){
                        $query->orderBy('product_detail.pd_pr', 'desc');
                    }
                    elseif(request('sortby') == 'name_a_to_z'){
                        $query->orderBy('product_detail.pd_nm', 'asc');
                    }elseif(request('sortby') == 'name_z_to_a'){
                        $query->orderBy('product_detail.pd_nm', 'desc');
                    }
                    elseif(request('sortby') == 'new'){
                        $query->orderBy('product_detail.pd_cr_dt', 'desc');
                    }
                })
                ->latest()->paginate(8)->appends(request()->all());
        }  
        $iterator = 0;
        $user = auth()->guard('designer')->user();
        
        $title = $techniques_detail->meta_title;
        $description = $techniques_detail->meta_description;
        $keywords = $techniques_detail->meta_keyword;
        
        return view('category_all_product',compact('sub_categories','technique_name','techniques_detail','category','categories','iterator','category_products', 'user','cat_id','title','description','keywords'));
    }

    public function viewAllProductAmbience(Category $category,$ambience_slug)
    {
        // $categories = Category::root()->with('children')->get();
        $ambience_detail = Ambience::join('ambience_detail', 'ambience_detail.ambience_id', '=', 'ambiences.id')->where('ambience_detail.slug',$ambience_slug)->first();
        $ambience_name = $ambience_detail->name;
        //$cat_id = Category::where('slug',$subcategory)->pluck('cat_id');
        $categories = Category::findMany([1, 10, 17]);
        //$sub_categories = Category::where('cat_id',$cat_id)->first();
        $category_products = [];
        $ambiences = Ambience::all();
        $cat_id = $category->children()->pluck('cat_id');
        $cat_id->add($category->cat_id);
        $category_products = Product::with('detail.colours.colour','image')->whereIn('cat_id',$cat_id)
            ->join('product_detail', 'product_detail.p_id', '=', 'product.p_id')
            ->where('pd_am','LIKE','%'.$ambience_name.'%')
            ->latest()->paginate(8)->appends(request()->all());
          
        $iterator = 0;
        $user = auth()->guard('designer')->user();
        
        $title = $ambience_detail->meta_title;
        $description = $ambience_detail->meta_description;
        $keywords = $ambience_detail->meta_keyword;
        
        return view('ambience_all_product',compact('ambience_name','ambiences','category','categories','iterator','category_products', 'user','cat_id','title','description','keywords'));
    }

    public function viewAllProductType()
    {
        // $categories = Category::root()->with('children')->get();
        $categories = Category::findMany([1, 10, 17]);
        $cat_id = request('cat_id');
        $category = Category::find($cat_id);
        $category_products = [];

            $selected_categories = $category->children()->pluck('cat_id');
            $selected_categories->add($category->cat_id);
            array_push($category_products,Product::with('detail.colours.colour','image')->whereIn('cat_id',$selected_categories));

        $iterator = 0;
        $user = auth()->guard('designer')->user();
        
        return view('type_all_product',compact('category','categories','iterator','category_products', 'user'));
    }
    
    // public function viewAllProductTechnique(Category $category,$technique_slug)
    // {
    //     // $categories = Category::root()->with('children')->get();
    //     $techniques_detail = Technique::join('techniques_detail', 'techniques_detail.technique_id', '=', 'techniques.id')->where('techniques_detail.slug',$technique_slug)->first();
    //     $technique_name = $techniques_detail->name;
    //     //$cat_id = Category::where('slug',$subcategory)->pluck('cat_id');
    //     $categories = Category::findMany([1, 10, 17]);
    //     //$sub_categories = Category::where('cat_id',$cat_id)->first();
    //     $category_products = [];
    //     $techniques = Technique::all();
    //         $selected_categories = $category->children()->pluck('cat_id');
    //         $selected_categories->add($category->cat_id);
    //          $category_products = Product::with('detail.colours.colour','image')->whereIn('cat_id',$selected_categories)
    //         ->join('product_detail', 'product_detail.p_id', '=', 'product.p_id')
    //         ->where('pd_tq','LIKE','%'.$technique_name.'%')
    //         ->latest()->paginate(8)->appends(request()->all());
          
    //     $iterator = 0;
    //     $user = auth()->guard('designer')->user();
        
    //     $title = $techniques_detail->meta_title;
    //     $description = $techniques_detail->meta_description;
    //     $keywords = $techniques_detail->meta_keyword;
        
    //     return view('technique_all_product',compact('sub_categories','technique_name','category','categories','iterator','category_products', 'user','cat_id','title','description','keywords'));
    // }
    
    // End of code by Soumita Talukder

}
