<?php

namespace App\Http\Livewire;

use App\Traits\CalculatePrice;
use Livewire\Component;

class ProductDetail extends Component
{
    use CalculatePrice;

    public $product,$price='NA',$product_config=[],$form=[],$calculate_price=false,$product_attributes;

    public function mount($product,$shortlist=null)
    {
        $this->user = auth()->guard('designer')->user();
        $this->product = $product;
        if($shortlist){
            $this->product_config = [
                'colour_id' => $shortlist->colour_id,
                'quantity' => $shortlist->quantity,
                'quantity_type'=>'Pair',
                'length'=>$shortlist->length,
                'width'=>$shortlist->width,
                'lining_type'=>$shortlist->lining_type,
                'mount_type'=>$shortlist->mount_type,
                'hardware_type'=>$shortlist->hardware_type,
                'power_type'=>$shortlist->power_type,
                'control_type'=>$shortlist->control_type,
                'unit'=>'cm',
                'size'=> $product->detail->pd_pr
            ];
        }else{
            $this->product_config = [
                'colour_id' => optional($this->product->colours->first())->c_id,
                'quantity' => 1,
                'quantity_type'=>'Pair',
                'length'=>300,
                'width'=>300,
                'lining_type'=>'Standard',
                'mount_type'=>'Wall Mount',
                'hardware_type'=>'Manual',
                'power_type'=>'Electric Wired',
                'control_type'=>'Home Automation',
                'unit'=>'cm',
                'size'=> $product->detail->pd_pr
            ];
        }
        if(select_calc($this->product->cat_id) == "blinds"){
        if($this->product){
            $this->product_config["size"] = 1;
            $this->product_config["length"] = 10;
            $this->product_config["width"] = 10;
            $this->product_config["unit"] = "sqft";
        }}

        if(select_calc($this->product->cat_id) == "sandwichpanels"){
            if($this->product){
                $this->product_config["length"] = 10;
                $this->product_config["width"] = 10;
                $this->product_config["unit"] = "sqft";
            }}

        if(select_calc($this->product->cat_id) == "simple"){
            if($this->product){
                $this->product_config["unit"] = "sqft";
            }}              

        $this->form = [
            'visitor_type'=>'Homeowner'
        ];
        $this->calculatePrice();
    }

    public function calculatePrice()
    {
        $this->price = 'NA';
        $this->validate([
            'product_config.quantity' => 'required|numeric|min:1|max:10',
            'product_config.quantity_type' => 'required|in:Pair,Single',
            'product_config.length' => 'required|numeric|min:1',
            'product_config.width' => 'required|numeric|min:1',
            'product_config.lining_type' => 'required|in:Blackout,Dimout,Standard',
            'product_config.mount_type' => 'required|in:Wall Mount,Ceiling Mount',
            'product_config.hardware_type' => 'required|in:Manual,Motorized,No Hardware',
            'product_config.power_type' => 'required|in:Battery,Electric Wired',
            'product_config.control_type' => 'required|in:Home Automation,Remote',
        ],[],[
            'product_config.quantity' => 'Quantity',
            'product_config.quantity_type' => 'Quantity Type',
            'product_config.length' => 'Height',
            'product_config.width' => 'Width',
            'product_config.lining_type' => 'Lining Type',
            'product_config.mount_type' => 'Mount Type',
            'product_config.hardware_type' => 'Hardware Type',
            'product_config.power_type' => 'Power Type',
            'product_config.control_type' => 'Control Type',
        ]);

        $this->price = $this->calculation($this->product,$this->product_config);
        if(select_calc($this->product->cat_id) == "blinds" || select_calc($this->product->cat_id) == "simple"){
        $this->product_attributes = $this->GetProductAttributes($this->product);
        }
    }

    public function save()
    {
        $this->calculatePrice();
        $this->validate([
            'product_config.colour_id' => 'required|numeric',
            'price' => 'required|numeric|min:1',
        ],[],[
            'product_config.colour_id' => 'Colour',
        ]);
        if($this->user){
            $this->user->shortlists()->updateOrCreate([
                'product_id' => $this->product->p_id,
                'colour_id' => $this->product_config['colour_id'],
            ],$this->product_config+['price'=>$this->calculation($this->product,$this->product_config)]);
            session()->flash('message','Item shortlisted successfully.');
            return;
        }

        $this->validate([
            'form.name' => 'required|string|max:255',
            'form.visitor_type'=>'required',
            'form.email'=>'required|email:rfc,dns',
            'form.phone' => 'required|digits:10',
            'price'=>'required|numeric|min:1',
        ],[],[
            'form.name'=>'Name',
            'form.email'=>'Email',
            'form.phone'=>'Phone',
        ]);

        $this->form = [
            'visitor_type'=>'Homeowner'
        ];

        session()->flash('message','Your order has been submitted successfully.');
    }

    public function delete(){
        //we will send users to shortlisted page so user can delete the right shortlised config of the product
        return redirect()->route('designer.shortlist');

    }

    
    public function switchcolor($c_id){

        //switch the images in gallery to appropriate images
        $this->product_config['colour_id'] = $c_id;
        $this->emit('updateZoom');
    }

    public function wishListToggle()
    {
       // dd("hi");
        // if(! $this->user){
        //     session()->flash('message','Please Sign In To A+ID Account to Short List');
        // }else{
        //     save();
        // }

        // Wish List code not in use anymore
        // if(auth()->guard('designer')->check()){
        //     $wishlist = auth()->guard('designer')->user()->wishlists()->where('p_id',$this->product->p_id)->first();
        //     if($wishlist){
        //         $wishlist->delete();
        //         session()->flash('wishlist-message','Product removed from wishlist.');
        //     }else{
        //         auth()->guard('designer')->user()->wishlists()->create([
        //             'p_id'=>$this->product->p_id
        //         ]);
        //         session()->flash('wishlist-message','Product added to wishlist.');
        //     }
        // }else{
        //     session()->flash('wishlist-message','Please login to add product to wishlist.');
        // }
    }

    
    public function render()
    {
        $this->product->setColor($this->product_config['colour_id']);

          $path = base_path('storage/app/currency.json');
          $currency = json_decode(file_get_contents($path), true);

        return view('livewire.product-detail',compact('currency'));
    }
}
