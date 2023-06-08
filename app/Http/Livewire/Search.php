<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;

class Search extends Component
{
    public $show=false,$search='';

    public function render()
    {   

        // // get 5 categories which match search text
        // $categories = Category::when($this->search, function ($query) {
        //     return $query->where('cat_nm', 'like', '%' . $this->search . '%');
        // })->limit(5)->get();


                // get 5 categories which match search text
                $categories = Category::whereIn('cat_id',[10,17,1,21,22,19,20,17,50,51,52])->when($this->search, function ($query) {
                    return $query->where('cat_nm', 'like', '%' . $this->search . '%');
                })->limit(5)->get();

        // get 5 products which match search text
        $products = Product::whereIn('cat_id',[10,17,1,21,22,19,20,17,50,51,52])->when($this->search, function ($query) {
            return $query->whereHas('detail',function($q){
                $q->where('pd_nm','like','%'.$this->search.'%');
            })->orWhere('p_cd','like','%'.$this->search.'%');
        })->limit(5)->get();

        // get 5 products which match technique of search text
        $technique =  Product::whereIn('cat_id',[10,17,1,21,22,19,20,17,50,51,52])->when($this->search, function ($query) {
            return $query->whereHas('detail',function($q){
                $q->where('pd_nm','like','%'.$this->search.'%');
            })->orWhereHas('detail',function($q){
                $q->where('pd_tq','like','%'.$this->search.'%');
            });
        })->limit(5)->get();




        return view('livewire.search',compact('categories','products','technique'));
    }
}
