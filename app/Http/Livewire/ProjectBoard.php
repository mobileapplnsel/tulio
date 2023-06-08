<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\ProjectRoom;
use App\Models\ProjectRoomProduct;
use App\Models\Colour;
use App\Traits\CalculatePrice;
use App\Models\Technique;
use App\Models\Ambience;
use App\Models\Design;

use Livewire\Component;

class ProjectBoard extends Component
{
    use CalculatePrice;

    public $categories,$filter,$project_name,$room_name,$selected_room,$selected_project,$techniques,$ambiences,$designs,$selected_shortlist=null,$product_attributes;
    public function mount($user)
    {
        $this->user = $user;
        $this->categories = Category::pluck('cat_nm', 'cat_id');
        $this->techniques = Technique::all();
        $this->ambiences = Ambience::all();
        $this->designs = Design::all();

        
       
    }

    protected function getShortlists()
    {
        return $this->user->shortlists()
        ->when($this->filter['category']??false, function ($query) {
            $query->join('product', 'product_id', '=', 'product.p_id');
            return  $query->where('cat_id', $this->filter['category']);
        })->when($this->filter['type']??false, function ($query) {
            return $query->whereHas('product.detail', function ($query) {
                return $query->where('pd_sc', $this->filter['type']);
            });
        })->when($this->filter['technique']??false, function ($query) {
            return $query->whereHas('product.detail', function ($query) {
                return $query->where('pd_tq', 'like', '%'.$this->filter['technique'].'%');
            });
        })->when($this->filter['ambience']??false, function ($query) {
            return $query->whereHas('product.detail', function ($query) {
                return $query->where('pd_am', 'like', '%'.$this->filter['ambience'].'%');
            });
        })->when($this->filter['design']??false, function ($query) {
            return $query->whereHas('product.detail', function ($query) {
                return $query->where('pd_de', 'like', '%'.$this->filter['design'].'%');
            });
        })->get();
        
    }

    public function addProject()
    {
        if($this->project_name)
        {
            $project = $this->user->projects()->create([
                'name' => $this->project_name,
                'sort_order' => $this->user->projects()->count()+1,
                'status' => 'active',
            ]);
            $project->rooms()->createMany([
                [
                    'name' => 'Living Area',
                    'sort_order' => 1,
                ],
                [
                    'name' => 'Master Bedroom',
                    'sort_order' => 2,
                ],
                [
                    'name' => 'Kids Bedroom',
                    'sort_order' => 3,
                ],
            ]);
            $this->project_name = '';
        }
    }

    public function createOption($room_id)
    {
        $room = ProjectRoom::findOrFail($room_id);
        if($room->parent){
            $room = $room->parent;
        }else{
            if($room->options()->count()==0){
                $room->name .= ' > Option 1';
                $room->save();
            }
        }
        $room_name = explode(' > ',$room->name)[0];
        $option_room = $room->options()->create([
            'project_id' => $room->project_id,
            'sort_order' => $room->sort_order,
            'name' => $room_name.' > Option '.($room->options()->count()+2),
        ]);
        $option_room->products()->createMany($room->products->toArray());
    }

    public function createRoom($project_id)
    {
        if($this->room_name){
            $project = $this->user->projects()->findOrFail($project_id);
            $project->rooms()->create([
                'sort_order' => $project->rooms()->count()+1,
                'name' => $this->room_name,
            ]);
            $this->room_name = '';
        }
    }

    public function removeRoom($room_id)
    {
        $room = ProjectRoom::findOrFail($room_id);
        $room->products->each(function ($product) {
            $product->components()->delete();
            $product->delete();
        });
        if($room->parent){
            if($room->parent->options()->count()==1){
                $room->parent->name = explode(' > ',$room->name)[0];
                $room->parent->save();
            }
        }
        $room->delete();
    }

    public function selectProduct($shortlist_id)
    {
        if(!$this->selected_room||!$this->selected_project){
            session()->flash('error', 'Please select a room');
            return;
        }
        $shortlist = $this->user->shortlists()->findOrFail($shortlist_id);
        $room = ProjectRoom::findOrFail($this->selected_room);
        // if($room->products()->where(['product_id'=> $shortlist->product_id,'color'=>$shortlist->colour->c_no])->exists()){
        //     session()->flash('error', 'Product already added to room');
        //     return;
        // }
        $this->selected_shortlist = $shortlist->toArray();
        $this->product = $shortlist->product;
        $this->selected_shortlist['color_id'] = $shortlist->colour_id;
        $this->selected_shortlist['color'] = $shortlist->colour->c_no;
        $this->selected_shortlist['color_nm'] = $shortlist->colour->c_nm;
        $this->selected_shortlist['code'] = $this->product->p_cd;
        $this->selected_shortlist['name'] = $this->product->detail->pd_nm;
        $this->selected_shortlist['pd_sc'] = $this->product->detail->pd_sc;
        $this->selected_shortlist['pd_ds'] = $this->product->detail->pd_ds;
        $this->selected_shortlist['quantity_type'] = 'Single';
        $this->selected_shortlist['size'] = $this->product->detail->pd_pr;

        if(select_calc($this->product->cat_id) == "blinds"){
            if($this->product){
                $this->selected_shortlist["size"] = 1;
            }
        
            $this->product_attributes = $this->GetProductAttributes($this->product);
        }
        
        if(select_calc($this->product->cat_id) == "simple"){
            $this->product_attributes = $this->GetProductAttributes($this->product);
        }
    }

    public function editProduct($product_id)
    {
        $room = ProjectRoom::findOrFail($this->selected_room);
        $product = $room->products()->findOrFail($product_id);
        $this->product = $product->product;
        $this->selected_shortlist = $product->toArray();
        $this->selected_shortlist['code'] = $this->product->p_cd;
        $this->selected_shortlist['name'] = $this->product->detail->pd_nm;
        $this->selected_shortlist['pd_sc'] = $this->product->detail->pd_sc;
        $this->selected_shortlist['pd_ds'] = $this->product->detail->pd_ds;
        $this->selected_shortlist['quantity_type'] = 'Single';
    }

    public function calculatePrice()
    {

     

        $this->validate([
            'selected_shortlist.quantity' => 'required|numeric|min:1|max:10',
            'selected_shortlist.quantity_type' => 'required|in:Pair,Single',
            'selected_shortlist.length' => 'required|numeric|min:1',
            'selected_shortlist.width' => 'required|numeric|min:1',
            'selected_shortlist.lining_type' => 'required|in:Blackout,Dimout,Standard',
            'selected_shortlist.mount_type' => 'required|in:Wall Mount,Ceiling Mount',
            'selected_shortlist.hardware_type' => 'required|in:Manual,Motorized,No Hardware',
            'selected_shortlist.power_type' => 'required|in:Battery,Electric Wired',
            'selected_shortlist.control_type' => 'required|in:Home Automation,Remote',
        ],[],[
            'selected_shortlist.quantity' => 'Quantity',
            'selected_shortlist.quantity_type' => 'Quantity Type',
            'selected_shortlist.length' => 'Length',
            'selected_shortlist.width' => 'Width',
            'selected_shortlist.lining_type' => 'Lining Type',
            'selected_shortlist.mount_type' => 'Mount Type',
            'selected_shortlist.hardware_type' => 'Hardware Type',
            'selected_shortlist.power_type' => 'Power Type',
            'selected_shortlist.control_type' => 'Control Type',
        ]);
        
        $this->selected_shortlist['price'] = $this->calculation($this->product,$this->selected_shortlist);
       
        
    }

    public function generateBoard($project){
        $has_products=false;
        $project_rooms=$project["rooms"];

        foreach ($project_rooms as $value) {
            if(count($value["products"]) > 0){
                $has_products=true;
            }
        }

        if($has_products==true){

        
           $project=encrypt($project["id"]);
            return redirect()->intended("designer/project-board?project=".$project);
          

        }else{
            session()->flash('error', 'Please add Product to room');
            return;
        }
        
    }

    public function addProduct()
    {


        $this->validate([
            'selected_shortlist.price' => 'required|numeric|min:1',
        ],[],[
            'selected_shortlist.price' => 'Price',
        ],['selected_shortlist.price.numeric'=>'There is some issue in Price Calculation']);
        $room = ProjectRoom::findOrFail($this->selected_room);
        $room->products()->updateOrCreate(['id'=>$this->selected_shortlist['id']],[
            'product_id'=> $this->selected_shortlist['product_id'],
            'name' => $this->selected_shortlist['name'],
            'color_id'=> $this->selected_shortlist['color_id'],
            'color'=> $this->selected_shortlist['color'],
            'color_nm'=> $this->selected_shortlist['color_nm'],
            'quantity'=> $this->selected_shortlist['quantity'],
            'length'=> $this->selected_shortlist['length'],
            'width'=> $this->selected_shortlist['width'],
            'lining_type'=> $this->selected_shortlist['lining_type'],
            'mount_type'=> $this->selected_shortlist['mount_type'],
            'hardware_type'=> $this->selected_shortlist['hardware_type'],
            'power_type'=> $this->selected_shortlist['power_type'],
            'control_type'=> $this->selected_shortlist['control_type'],
            'price'=> $this->calculation($this->product,$this->selected_shortlist),
            'unit'=> $this->selected_shortlist['unit'],
            'sort_order'=> $this->selected_shortlist['sort_order']??$room->products()->count()+1,
        ]);

        $this->selected_shortlist = [];
    }

    public function removeRoomProduct($product_id)
    {
        $product = ProjectRoomProduct::findOrFail($product_id);
        $product->components()->delete();
        $product->delete();
    }

    public function setRoom($selected_room,$roomid){
   
        if($selected_room == $roomid){
            $this->selected_room = 0;
        }else{
            $this->selected_room = $roomid;
        }
    }

    public function setProject($selected_project,$projectid){
        
        if($selected_project == $projectid){
            $this->selected_project = 0;
        }else{
            $this->selected_project = $projectid;
        }
    }


    
    public function render()
    {
        $colours = Colour::get(['c_id','c_nm']);
        
        $path = base_path('storage/app/currency.json');
        $currency = json_decode(file_get_contents($path), true);
        $projects = $this->user->projects()->where('status','Active')->with('rooms.products',function($q){$q->whereNotNull('product_id');})->get();
        $assign_project = $this->user->assign_projects()->with('rooms.products',function($q){$q->whereNotNull('product_id');})->get();
        $assign_project->each(function($p) use($projects){$projects->push($p);});
        
        return view('livewire.project-board',[
            'shortlists' => $this->getShortlists(),
            'projects' => $projects,
            'currency' => $currency,
            'colours' => $colours
        ]);
    }
}
