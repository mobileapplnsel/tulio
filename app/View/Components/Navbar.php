<?php

namespace App\View\Components;

use App\Models\Category;
use Illuminate\View\Component;

class Navbar extends Component
{
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    { 
        // $categories = Category::root()->get();
        // for limited categories show below code 
        $categories = Category::findMany([1, 10, 17]);
        return view('components.navbar',compact('categories'));
    }
}
