<div>
    <a href="javascript:void(0)" wire:click="$toggle('show')" class="search">SEARCH</a>
    @if ($show)
    <div class="header-search">
        <div class="content">
            <input type="search" class="input-search" placeholder="Search ..." wire:model="search">
        </div>


        @if(strlen($this->search)<2)


        @else
        @if ($search)
            <div class="search-result">
                @if ($categories->count()||$products->count() ||$technique->count() )
                    @if ($categories->count())
                    <div class="category">
                     @foreach ($categories as $category)
                         <a href="{{route('category',$category)}}" target="_blank">{{$category->cat_nm}}</a>
                     @endforeach  
                    </div>
                    @endif

                    @if ($technique->count())
                    <div class="product">
                     @foreach ($technique as $technique)
                     <a href="{{route('product',$technique)}}" target="_blank">{{optional($technique->detail)->pd_nm}} - (Technique: {{optional($technique->detail)->pd_tq[0]}})</a>
                     @endforeach  
                    </div>
                    @endif

                    <div class="product">
                     @foreach ($products as $product)
                     <a href="{{route('product',$product)}}" target="_blank">{{optional($product->detail)->pd_nm}} - @php
                        print_r(\App\Models\Category::where(['cat_id' => $product->cat_id])->pluck('cat_nm')->first())
                      @endphp
                     </a>
                     @endforeach  
                    </div>               
                @else
                <div class="no-result">
                    <p>No result found</p>
                </div>  
                @endif
            </div>
        @endif
        @endif
    </div>
    @endif
</div>
