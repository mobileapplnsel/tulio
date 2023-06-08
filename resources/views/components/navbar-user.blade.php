<div class="wrapper">
    <div class="hamburger-menu image-container">
        <img loading="lazy" src="{{asset('assets/hamburger-menu.svg')}}" alt="" />
    </div>
    
        <div class="image-container">
            <a href="{{route('designer.dashboard')}}"><img src="{{asset('assets/logo.png')}}" style="width:140px" alt="Tulio" /></a>
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
            <!--<li><a data-single-click href="{{route('hotelier')}}">HOTELS & CONTRACTS</a></li>-->
            <li><a data-single-click href="{{route('product-list')}}">PRODUCTS</a></li>
            <li><a data-single-click href="{{route('designer.shortlist')}}">SHORTLISTED</a></li>
            <li><a data-single-click href="{{route('designer.project')}}">PROJECTS</a></li>
            <li><a data-single-click href="{{asset('USER-GUIDE.pdf')}}" target="_blank">USER GUIDE</a></li>
            <li><a data-single-click href="{{route('tulio-care')}}">TULIO CARE</a></li>
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
            
            <li><a data-single-click href="#" class="userName"><svg style="enable-background:new 0 0 50 50;" version="1.1" viewBox="0 0 50 50" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <g id="Layer_1"><path d="M25,1C11.767,1,1,11.767,1,25c0,7.091,3.094,13.472,8,17.869v0.017l0.348,0.3c0.061,0.053,0.128,0.097,0.19,0.149   c0.431,0.364,0.875,0.713,1.331,1.047c0.123,0.09,0.246,0.177,0.371,0.264c0.484,0.34,0.979,0.664,1.487,0.968   c0.085,0.051,0.172,0.099,0.257,0.148c0.557,0.324,1.126,0.629,1.71,0.908c0.006,0.003,0.012,0.005,0.018,0.008   c1.249,0.595,2.559,1.082,3.915,1.456c0.025,0.007,0.05,0.015,0.075,0.021c0.641,0.175,1.293,0.322,1.954,0.443   c0.062,0.011,0.123,0.022,0.185,0.033c0.638,0.112,1.284,0.201,1.939,0.262c0.075,0.007,0.15,0.011,0.224,0.017   C23.663,48.965,24.327,49,25,49s1.337-0.035,1.996-0.09c0.075-0.006,0.15-0.01,0.224-0.017c0.655-0.06,1.301-0.15,1.939-0.262   c0.062-0.011,0.123-0.022,0.185-0.033c0.661-0.121,1.313-0.268,1.954-0.443c0.025-0.007,0.05-0.014,0.075-0.021   c1.356-0.374,2.666-0.861,3.915-1.456c0.006-0.003,0.012-0.005,0.018-0.008c0.584-0.279,1.153-0.585,1.71-0.908   c0.086-0.05,0.172-0.097,0.257-0.148c0.509-0.304,1.004-0.629,1.487-0.968c0.124-0.087,0.248-0.174,0.371-0.264   c0.456-0.334,0.9-0.683,1.331-1.047c0.062-0.052,0.129-0.096,0.19-0.149l0.348-0.3v-0.017c4.906-4.398,8-10.778,8-17.869   C49,11.767,38.233,1,25,1z M25,25c-4.411,0-8-3.589-8-8s3.589-8,8-8s8,3.589,8,8S29.411,25,25,25z M28,27c6.065,0,11,4.935,11,11   v3.958c-0.042,0.035-0.086,0.067-0.128,0.102c-0.395,0.321-0.8,0.626-1.214,0.918c-0.092,0.065-0.182,0.132-0.274,0.195   c-0.447,0.305-0.906,0.591-1.373,0.862c-0.085,0.05-0.171,0.099-0.257,0.148c-0.49,0.275-0.989,0.533-1.498,0.769   c-0.053,0.025-0.107,0.049-0.161,0.073c-1.661,0.755-3.411,1.302-5.212,1.626c-0.057,0.01-0.114,0.021-0.171,0.031   c-0.567,0.097-1.139,0.172-1.715,0.225c-0.079,0.007-0.159,0.012-0.239,0.018C26.175,46.97,25.589,47,25,47   s-1.175-0.03-1.758-0.077c-0.079-0.006-0.159-0.011-0.239-0.018c-0.576-0.053-1.148-0.127-1.715-0.225   c-0.057-0.01-0.114-0.02-0.171-0.031c-1.801-0.324-3.551-0.871-5.212-1.626c-0.054-0.025-0.108-0.048-0.161-0.073   c-0.509-0.236-1.008-0.494-1.498-0.769c-0.086-0.049-0.171-0.098-0.257-0.148c-0.467-0.27-0.926-0.557-1.373-0.862   c-0.093-0.063-0.183-0.13-0.274-0.195c-0.414-0.292-0.819-0.596-1.214-0.918c-0.042-0.034-0.086-0.067-0.128-0.102V38   c0-6.065,4.935-11,11-11H28z M41,40.076V38c0-6.271-4.464-11.519-10.38-12.735C33.261,23.464,35,20.431,35,17   c0-5.514-4.486-10-10-10s-10,4.486-10,10c0,3.431,1.739,6.464,4.38,8.265C13.464,26.481,9,31.729,9,38v2.076   C5.284,36.135,3,30.831,3,25C3,12.869,12.869,3,25,3s22,9.869,22,22C47,30.831,44.716,36.135,41,40.076z"/></g><g/>
            </svg>{{auth()->guard('designer')->user()->name}}</a>
            <ul class="submenu">
                <li><a data-single-click href="{{route('designer.dashboard')}}">Dashboard</a></li>
                <li><a data-single-click href="{{route('designer.profile')}}">Profile</a></li>
                <li><a data-single-click href="{{route('designer.project-completed')}}">Completed Projects</a></li>
                <li>
                    <form method="POST" id="logout" action="{{ route('logout') }}">
                        @csrf
                    </form>
                    <a data-single-click href="{{route('logout')}}" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            $('form#logout').submit();">Logout</a>
                </li>
            </ul>
        </li>
        @livewire('search')&nbsp;&nbsp;
            {{-- <li id="google_translate_element"></li> --}}
        </ul>
   
        <hr>
        <ul><li><a href="{{route('product-list')}}">
             </a></li></ul>
             
        <ul class="menu-home-desktop top">
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
                        @foreach ($category->children  as $child)
                        <!--<li><a data-single-click href="{{route('category',$child)}}">{{$child->cat_nm}}</a></li>-->
                            @if($child->cat_id == '19' || $child->cat_id == '20' || $child->cat_id == '21' || $child->cat_id == '22')
                                <li><a data-single-click href="{{ route('product.category',['category' => $category,'subcategory' => $child->slug]) }}">{{$child->cat_nm}}</a>
                                </li>
                            @endif
                        @endforeach
                        
                        
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
        <img loading="lazy" src="{{asset('assets/cancel-nav.svg')}}" alt="" />
    </div>
    <div>
        <ul>
            <li><a data-single-click href="{{route('product-list')}}">PRODUCTS</a></li>
            <li><a data-single-click href="{{route('designer.shortlist')}}">SHORTLISTED</a></li>
            <li><a data-single-click href="{{route('designer.project')}}">PROJECTS</a></li>
            <li><a data-single-click href="{{asset('USER-GUIDE.pdf')}}" target="_blank">USER GUIDE</a></li>
            <li><a data-single-click href="{{route('tulio-care')}}">TULIO CARE</a></li>
            <li><a data-single-click href="#" class="userName"><svg style="enable-background:new 0 0 50 50;" version="1.1" viewBox="0 0 50 50" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <g id="Layer_1"><path d="M25,1C11.767,1,1,11.767,1,25c0,7.091,3.094,13.472,8,17.869v0.017l0.348,0.3c0.061,0.053,0.128,0.097,0.19,0.149   c0.431,0.364,0.875,0.713,1.331,1.047c0.123,0.09,0.246,0.177,0.371,0.264c0.484,0.34,0.979,0.664,1.487,0.968   c0.085,0.051,0.172,0.099,0.257,0.148c0.557,0.324,1.126,0.629,1.71,0.908c0.006,0.003,0.012,0.005,0.018,0.008   c1.249,0.595,2.559,1.082,3.915,1.456c0.025,0.007,0.05,0.015,0.075,0.021c0.641,0.175,1.293,0.322,1.954,0.443   c0.062,0.011,0.123,0.022,0.185,0.033c0.638,0.112,1.284,0.201,1.939,0.262c0.075,0.007,0.15,0.011,0.224,0.017   C23.663,48.965,24.327,49,25,49s1.337-0.035,1.996-0.09c0.075-0.006,0.15-0.01,0.224-0.017c0.655-0.06,1.301-0.15,1.939-0.262   c0.062-0.011,0.123-0.022,0.185-0.033c0.661-0.121,1.313-0.268,1.954-0.443c0.025-0.007,0.05-0.014,0.075-0.021   c1.356-0.374,2.666-0.861,3.915-1.456c0.006-0.003,0.012-0.005,0.018-0.008c0.584-0.279,1.153-0.585,1.71-0.908   c0.086-0.05,0.172-0.097,0.257-0.148c0.509-0.304,1.004-0.629,1.487-0.968c0.124-0.087,0.248-0.174,0.371-0.264   c0.456-0.334,0.9-0.683,1.331-1.047c0.062-0.052,0.129-0.096,0.19-0.149l0.348-0.3v-0.017c4.906-4.398,8-10.778,8-17.869   C49,11.767,38.233,1,25,1z M25,25c-4.411,0-8-3.589-8-8s3.589-8,8-8s8,3.589,8,8S29.411,25,25,25z M28,27c6.065,0,11,4.935,11,11   v3.958c-0.042,0.035-0.086,0.067-0.128,0.102c-0.395,0.321-0.8,0.626-1.214,0.918c-0.092,0.065-0.182,0.132-0.274,0.195   c-0.447,0.305-0.906,0.591-1.373,0.862c-0.085,0.05-0.171,0.099-0.257,0.148c-0.49,0.275-0.989,0.533-1.498,0.769   c-0.053,0.025-0.107,0.049-0.161,0.073c-1.661,0.755-3.411,1.302-5.212,1.626c-0.057,0.01-0.114,0.021-0.171,0.031   c-0.567,0.097-1.139,0.172-1.715,0.225c-0.079,0.007-0.159,0.012-0.239,0.018C26.175,46.97,25.589,47,25,47   s-1.175-0.03-1.758-0.077c-0.079-0.006-0.159-0.011-0.239-0.018c-0.576-0.053-1.148-0.127-1.715-0.225   c-0.057-0.01-0.114-0.02-0.171-0.031c-1.801-0.324-3.551-0.871-5.212-1.626c-0.054-0.025-0.108-0.048-0.161-0.073   c-0.509-0.236-1.008-0.494-1.498-0.769c-0.086-0.049-0.171-0.098-0.257-0.148c-0.467-0.27-0.926-0.557-1.373-0.862   c-0.093-0.063-0.183-0.13-0.274-0.195c-0.414-0.292-0.819-0.596-1.214-0.918c-0.042-0.034-0.086-0.067-0.128-0.102V38   c0-6.065,4.935-11,11-11H28z M41,40.076V38c0-6.271-4.464-11.519-10.38-12.735C33.261,23.464,35,20.431,35,17   c0-5.514-4.486-10-10-10s-10,4.486-10,10c0,3.431,1.739,6.464,4.38,8.265C13.464,26.481,9,31.729,9,38v2.076   C5.284,36.135,3,30.831,3,25C3,12.869,12.869,3,25,3s22,9.869,22,22C47,30.831,44.716,36.135,41,40.076z"/></g><g/>
            </svg>{{auth()->guard('designer')->user()->name}}</a>
            <ul class="submenu">
                <li><a data-single-click href="{{route('designer.dashboard')}}">Dashboard</a></li>
                <li><a data-single-click href="{{route('designer.profile')}}">Profile</a></li>
                <li><a data-single-click href="{{route('designer.project-completed')}}">Completed Projects</a></li>
                <li>
                    <form method="POST" id="logout" action="{{ route('logout') }}">
                        @csrf
                    </form>
                    <a data-single-click href="{{route('logout')}}" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            $('form#logout').submit();">Logout</a>
                </li>
            </ul>
            {{-- <li id="google_translate_element2" ></li> --}}
        </li>
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