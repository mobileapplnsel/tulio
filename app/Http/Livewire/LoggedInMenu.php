<?php

namespace App\Http\Livewire;
use Livewire\Component;



// $categories = Category::root()->with('children')->get();
$categories = Category::findMany([1, 10, 17]);
?>
<ul class="menu-home-desktop top">
@foreach ($categories as $category)
<li>
    <a href="{{route('category',$category)}}">{{$category->cat_nm}}</a>
    @if ($category->children->count())
    <ul class="submenu">
        @foreach ($category->children  as $child)
        <li><a href="{{route('category',$child)}}">{{$child->cat_nm}}</a>
          @if($child->children->count())
          <ul class="submenu">
              @foreach ($child->children  as $child)
              <li><a href="{{route('category',$child)}}">{{$child->cat_nm}}</a></li>
              @endforeach
          </ul>
          @endif
        </li>
        @endforeach
    </ul>
    @endif
</li>
@endforeach
</ul>

