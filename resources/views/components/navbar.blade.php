<div class="wrapper">
    <div class="hamburger-menu image-container">
        <img loading="lazy" src="{{asset('assets/hamburger-menu.svg')}}" alt="" />
    </div>
    
        <div class="image-container">
            <a href="{{route('home')}}"><img src="{{asset('assets/logo.png')}}" style="width:140px;height:auto;" alt="Tulio" /></a>
        </div>
    
    <div class="mobile-nav-icons">
        {{-- <div class="image-container">
            <a href="{{route('contact')}}"><img loading="lazy" src="{{asset('assets/call.svg')}}" alt="" /></a>
        </div> --}}
        @livewire('search')&nbsp;&nbsp;
    </div>
    <nav>
        <ul class="menu-home-desktop">
            <!--<li class="label-menu">SOLUTIONS</li>-->
            <li><a data-single-click href="{{route('process')}}">PROCESS</a></li>
            <li><a data-single-click href="{{route('hotelier')}}">HOTELS & CONTRACTS</a></li>
            <li><a data-single-click href="{{route('designer')}}">A+ID PORTAL</a></li>
            <li><a data-single-click href="{{route('contact')}}">STUDIO LOCATOR</a></li>
            <!--<li><a data-single-click href="">JOURNAL</a>-->
            <!--    <ul class="submenu">-->
            <!--        <li><a data-single-click href="">Curtains Spaces</a></li>-->
            <!--        <li><a data-single-click href="">Blinds Spaces</a></li>-->
            <!--        <li><a data-single-click href="">DIY</a></li>-->
            <!--        <li><a data-single-click href="">Video Bytes</a></li>-->
            <!--        <li><a data-single-click href="">Expert Speaks</a></li>-->
            <!--    </ul>-->
            <!--</li>-->
            <!--<li><a data-single-click href="">RESOURCES</a>-->
            <!--    <ul class="submenu">-->
            <!--        <li><a data-single-click href="{{route('tulio-care')}}">Tulio Care</a></li>-->
            <!--        <li><a data-single-click href="{{route('faq')}}">FAQs</a></li>-->
            <!--    </ul>-->
            <!--</li>-->
            <!--<li><a data-single-click href="{{route('about-us')}}">ABOUT US</a>-->
            <!--    <ul class="submenu">-->
            <!--        <li><a data-single-click href="{{route('contact')}}">Contact</a></li>-->
            <!--        <li><a data-single-click href="">Career</a></li>-->
            <!--    </ul>-->
            <!--</li>-->
            @livewire('search')&nbsp;&nbsp;
            {{-- <li id="google_translate_element"></li> --}}
        </ul>
        <hr>
        <ul class="menu-home-desktop menu-bottom">
            <!--<li class="label-menu">PRODUCTS</li>-->
            @foreach ($categories as $category)
            <li>
                <!--<a data-single-click href="{{route('category',$category)}}">{{$category->cat_nm}}</a>-->
                <a data-single-click href="{{ $category->cat_nm==='Rugs' ? route('category',$category) : route('product.type',['category' => $category]) }}">{{$category->cat_nm==='Blinds' ? 'Roman Blinds' : $category->cat_nm}}</a>
                @php
                    $techniques = App\Models\Technique::all();
                    $ambiences = App\Models\Ambience::all();
                @endphp

                <ul class="submenu mega_submenu">
                    <div class="categoryFilter">
                        <span>Discover by Category</span>
                        <li><a data-single-click href="{{route('category',$category)}}">See All</a></li>
                        {{-- @if($category->cat_nm !='Rugs') --}}
                          @foreach ($category->children  as $child)
                          <!--<li><a data-single-click href="{{route('category',$child)}}">{{$child->cat_nm}}</a></li>-->
                              @if($child->cat_id == '19' || $child->cat_id == '20' || $child->cat_id == '21' || $child->cat_id == '22')
                                  <li><a data-single-click href="{{ route('product.category',['category' => $category,'subcategory' => $child->slug]) }}">{{$child->cat_nm}}</a>
                                  </li>
                              @endif
                          @endforeach
                        {{-- @endif --}}
                    </div>
            
                    <div class="categoryFilter">
                        <span>Discover by Ambience</span>
                        @foreach($ambiences as $ambience)
                          @php
                              $ambience_detail = App\Models\Ambience::join('ambience_detail', 'ambience_detail.ambience_id', '=', 'ambiences.id')->where('ambience_detail.ambience_id',$ambience->id)->where('ambience_detail.cat_id',$category->cat_id)->first();                 
                          @endphp
                          @if(!empty($ambience_detail->slug))
                          <li><a data-single-click href="{{ route('product.all.category',['category' => $category,'subcategory' => 'ambience','technique_slug' => $ambience_detail->slug]) }}">{{$ambience->name}}</a></li>
                          @endif
                        @endforeach
                    </div>
                    
                    
                    
                    <div class="categoryFilter">
                        <span>New Releases</span>
                        @php
                          $selected_categories = $category->children()->pluck('cat_id');
                          $selected_categories->add(['cat_id'=>$category->cat_id]);
                          $category_products = App\Models\Product::with('detail.colours.colour','image')->whereIn('cat_id',$selected_categories)->where('featured','1')->orderBy('p_up_dt', 'DESC');
                        @endphp
                        <div class="navbar-image"> 
                        @foreach ($category_products->limit(2)->get() as $product)     
                            @php
                              $img_alt = App\Models\ImageAlt::where('image',$product->image->image)->pluck('alt')->first();
                            @endphp
                            <a style="all: unset;" data-single-click href="{{route('product',[$product])}}">
                              <div class="ni-box">
                                  <img loading="lazy" onerror="imgError(this);" src="{{$product->closeup_image}}" alt="{{(isset($img_alt)) ? $img_alt : $product->detail->pd_nm}}" class="featured-image"> 
                                  <br>
                                  <span class="featured-img-text ni-box-text">{{$product->detail->pd_nm}}</span>
                              </div>
                            </a>
                        @endforeach
                        </div>
                    </div>
                </ul>

            </li>
            @endforeach
        </ul>
    </nav>
</div>
<div class="mobile-nav-overlay"></div>
<nav class="mobile-nav">
    <div class="cancel-nav image-container">
        <img src="{{asset('assets/cancel-nav.svg')}}" alt="" />
    </div>
    <div>
        <ul>
            <li><a data-single-click href="{{route('product-list')}}">PRODUCTS</a></li>
            <li><a data-single-click href="{{route('process')}}">PROCESS</a></li>
            <li><a data-single-click href="{{route('hotelier')}}">HOTELS & CONTRACTS</a></li>
            <li><a data-single-click href="{{route('designer')}}">A+ID PORTAL</a></li>
            <li><a data-single-click href="{{route('contact')}}">STUDIO LOCATOR</a></li>
            {{-- <li id="google_translate_element2" ></li> --}}
        </ul>
        <hr>
        <ul class="">
            @foreach ($categories as $category)
            <li><a data-single-click href="{{route('category',$category)}}">{{\Str::upper($category->cat_nm)}}</a></li>
            @endforeach
        </ul>
    </div>
</nav>

<!-- g-translate js -->
<script type="text/javascript">

// store google translate's change event
trackChange = null;
pageDelayed = 3000;

// overwrite prototype to snoop, reset after we find it (keep this right before translate init)
Element.prototype._addEventListener = Element.prototype.addEventListener;
Element.prototype.addEventListener = function(a,b,c) {
  reset = false;

  // filter out first change event
  if (a == 'change'){
    trackChange = b;
    reset = true;
  }

  if(c==undefined)
    c=false;

  this._addEventListener(a,b,c);

  if(!this.eventListenerList)
    this.eventListenerList = {};

  if(!this.eventListenerList[a])
    this.eventListenerList[a] = [];

  this.eventListenerList[a].push({listener:b,useCapture:c});

  if (reset){
    Element.prototype.addEventListener = Element.prototype._addEventListener;
  }
};


function googleTranslateElementInit() {
  new google.translate.TranslateElement({ pageLanguage: 'en' }, 'google_translate_element');

  let first = $('#google_translate_element');
  let second = $('#google_translate_element2');

  let nowChanging = false;

  // we need to let it load, since it'll be in footer a small delay shouldn't be a problem
  setTimeout(function(){
    select = first.find('select');
    // lets clone the translate select
    second.html(first.clone());
    second.find('select').val(select.val());

    // add our own event change
    first.find('select').on('change', function(event){
      if (nowChanging == false){
        second.find('select').val($(this).val());
      }
      return true;
    });

    second.find('select').on('change', function(event){
      if (nowChanging){
        return;
      }

      nowChanging = true;
      first.find('select').val($(this).val());
      trackChange();

      // give this some timeout incase changing events try to hit each other                    
      setTimeout(function(){
        nowChanging = false;
      }, 1000);

    });
  }, pageDelayed);
}
</script>
