



<div class="row flex-row">
    <div class="col-md-6">
        <div class="product-gallery product-gallery-vertical">
            <div class="row">
            <div id="product-zoom-gallery">
                    <!--<a class="product-gallery-item-modified" data-image="productpagesassets/images/products/single/1.jpg" data-zoom-image="productpagesassets/images/products/single/1-big.jpg" style="margin-bottom:2.5rem">-->
                    @php
                                        $img_alt = App\Models\ImageAlt::where('image',$product->image->image)->pluck('alt')->first();
                    @endphp
                    <img loading="lazy" id="btn1" src="{{$product->closeup_image_thumb}}"
                        alt="{{(isset($img_alt)) ? $img_alt : 'product cross'}}" class="">
                    <!--</a>   -->

                    <img loading="lazy" id="btn2" src="{{$product->front_image_thumb}}"
                        alt="{{(isset($img_alt)) ? $img_alt : 'product cross'}}" class="">
                    <!--</a>-->

                    <img loading="lazy" id="btn3" src="{{$product->angle_image_thumb}}"
                        alt="{{(isset($img_alt)) ? $img_alt : 'product cross'}}" class="">
                    <!--</a>-->
                </div><!-- End .product-image-gallery -->
                <figure class="product-main-image">
                    <div class="scroll ">
                        <div class="zoom-box active">
                            <picture>
                                <source media="(max-width: 1023px)" srcset="{{$product->closeup_image_thumb}}">
                                <source media="(min-width: 1024px)" srcset="{{$product->closeup_image}}">
                                <img id="product-zoom1" src="{{$product->closeup_image}}"
                                                    data-zoom-image="" alt="{{(isset($img_alt)) ? $img_alt : 'product image'}}" class="" >
                            </picture>
                        
                            </div>
                        <!-- <img loading="lazy" id="dummy1"> -->
                        <div class="zoom-box">
                        <picture>
                                <source media="(max-width: 1023px)" srcset="{{$product->front_image_thumb}}">
                                <source media="(min-width: 1024px)" srcset="{{$product->front_image}}">
                                <img loading="lazy" id="product-zoom2" src="{{$product->front_image}}"
                                                    data-zoom-image="" alt="{{(isset($img_alt)) ? $img_alt : 'product image'}}" class="" >
                            </picture>
                        
                            </div>
                        <!-- <img loading="lazy" id="dummy2"> -->
                        <div class="zoom-box">
                        <picture>
                                <source media="(max-width: 1023px)" srcset="{{$product->angle_image_thumb}}">
                                <source media="(min-width: 1024px)" srcset="{{$product->angle_image}}">
                                <img loading="lazy" id="product-zoom3" src="{{$product->angle_image}}"
                                                    data-zoom-image="" alt="{{(isset($img_alt)) ? $img_alt : 'product image'}}" class="" >
                            </picture>
                        
                        </div>
                        <!-- <img loading="lazy" id="dummy3"> -->
                    </div>
                </figure><!-- End .product-main-image -->


            </div><!-- End .row -->
        </div><!-- End .product-gallery -->
    </div><!-- End .col-md-6 -->

    <div class="col-md-6">
        <div class="product-details ">
            @if (session('wishlist-message'))
                <div class="alert alert-warning">
                    {{ session('wishlist-message') }}
                </div>
            @endif
            <div class="title flexBox">
                @php
                    $user = auth()->guard('designer')->user();
                @endphp
                <h1 class="product-title {{$user? ($user->wishlists()->where('p_id',$this->product->p_id)->count()?'active':''):''}}">
                    {{-- @if(!empty($product->h1))
                        {{$product->h1}}
                    @else --}}
                        {{optional($product->detail)->pd_nm}}
                    {{-- @endif --}}
                </h1>
                <span>
                    @if($user)
                    
                        @if($user->shortlists()->where('product_id',$this->product->p_id)->count())
                        <a href="javascript:void(0)" class="btn-product btn-wishlists" wire:click="delete"  title="Wishlist">
                        <svg style="color: rgb(39, 208, 69);" xmlns="http://www.w3org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16"> <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z" fill="#27d045"></path> </svg>
                        </a>
                        @else
                        <a href="javascript:void(0)" class="btn-product btn-wishlists" wire:click="save"  title="Wishlist">
                        <svg style="color: rgb(39, 208, 69);" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16"> <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z" fill="#27d045"></path> </svg>
                        </a>
                        @endif
                    
                    @endif
                </span>
            </div>
                    <!-- End .product-title -->
            <p class="productSku">{{optional($product->detail)->pd_sc}} <span>SKU No. {{$product->p_cd}}</span></p>
            <div class="shortDescription">
                <p>{{optional($product->detail)->pd_ds}}</p>
                <br><p>{{optional($product->detail)->pd_ts}}</p>
            </div>
            <div style="height:30px;clear:both;width:85%;margin-top:20px;">
                <span style="float:left;">
                    @foreach($product->colours as $colour)
                    <div class="toolbox">
                    <span class="colorcirclelarge {{$product_config['colour_id']==$colour->c_id?'selected':''}}"
                        wire:click="switchcolor({{$colour->c_id}})" style=";background-color:#{{$colour->colour->c_no}};margin-right:10px"></span>
                        <span class="tooltiptext">{{ $colour->colour->c_nm}}</span>
                    </div>
                        @endforeach
                    @error('product_config.colour_id')
                        <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                </span>
                <span style="float:right"></span>
            </div>
            <div>
            <div class="hiideWhilecalulate">
             @if (!$calculate_price)
            <div class="product-price"  style="margin-top:35px; clear:both">
                <span>
                    <span style="font-size:20px;font-family: 'Montserrat';
                    font-weight: 500;">{{convert_currency($price)}}</span>
                </span>
            </div>
            @error('price')
                <strong class="text-danger">{{ $message }}</strong>
            @enderror
            @endif

            @if (select_calc($product->category->cat_id) == 'curtain')
            @if (! $calculate_price)
            <div class="note" style="clear:both">
                <p style="font-family: 'Montserrat';
                font-weight: 400;color:#666">*Price calculated for a window size of 300 cm width X 300 cm height,<br> considering standard lining and manual hardware</p>
            </div>
            @endif
            
            @else
            
            @endif


            </div>
                @if ($calculate_price)

                <form class="content" style="margin-left:0px;">
                    <div name="Curtains" class="productCustomOptions">

                        <button type="button" class="collapsible">Quantity</button>
                        <div class="collapsiblecontent">
                            <input type="text" class="quantitybox" wire:model.defer="product_config.quantity" wire:change="calculatePrice"
                                style="width:40px;" min="1" max="10" step="1" data-decimals="0" required value="1">
                            @error('product_config.quantity')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror

                            @if (select_calc($product->category->cat_id) == 'curtain' || select_calc($product->category->cat_id) == 'curtainpanels')
                            <label for="cur_pyes">Pair</label>
                            <input type="radio" id="cur_pyes" name="cur_pair" wire:model.defer="product_config.quantity_type" wire:change="calculatePrice" value="Pair">
                            <label for="cur_pno">Single</label>
                            <input type="radio" id="cur_pno" name="cur_pair" wire:model.defer="product_config.quantity_type" wire:change="calculatePrice" value="Single">
                            @endif
                        </div>

                        @if (select_calc($product->category->cat_id) == 'simple')
                        <button type="button" class="collapsible">Variations</button>
                        <div class="collapsiblecontent">
                            {{-- create counter to iterate and populate options in select  --}}
                            @php
                            $sizeCounter=1;
                            @endphp
                            <select name="size" id="size" wire:model.defer="product_config.size" wire:change="calculatePrice">
                                @foreach($product_attributes as $key=>$value)
                                @if(str_contains($key,"variant_value_".$sizeCounter))
                                @if($value)
                                    <option value={{ $value }}>
                                            @foreach($product_attributes as $key2=>$value2)
                                            @if(str_contains($key2,"variant_name_".$sizeCounter))
                                            {{$value2}}
                                            @endif
                                            @endforeach
                                    </option>
                                    @php
                                    $sizeCounter++;
                                    @endphp
                                 @endif   
                                @endif
                            @endforeach
                            </select>
                            </div>
                            @endif
                            
                            @if (select_calc($product->category->cat_id) == 'curtain')
                        <button type="button" class="collapsible">Furnishing Unit Dimensions <span class="infoIcon openPopup" data-rel="how_to_measure">i</span></button>
                        <div class="collapsiblecontent">
                            <label style="padding-left:0px;" for="cur_wwidth">Width</label>
                            <input type="text" name="cur_wwidth" wire:model.defer="product_config.width" wire:change="calculatePrice" style="width:70px;">
                            @error('product_config.width')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                            <span class="multiply">&nbsp; &times; &nbsp;</span>
                            <label for="cur_wlength" style="padding-left:0px">Height</label>
                            <input type="text" name="cur_wlength" wire:model.defer="product_config.length" wire:change="calculatePrice" style="width:70px;vertical-align:middle">
                            @error('product_config.length')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                            
                            <label for="unit">Unit</label>
                            <select name="unit" id="unit" wire:model.defer="product_config.unit" wire:change="calculatePrice">
                                <option value="cm">cm</option>
                                <option value="inch">inch</option>
                            </select>
                        </div>
                        @if (strpos($product->category->cat_nm, 'Sheer') === false && strpos($product->category->cat_nm, 'sheer') === false)
                        <button type="button" class="collapsible">Lining Type <span class="infoIcon openPopup" data-rel="lining_type">i</span></button>
                        <div class="collapsiblecontent">
                            <label for="cur_lt_blackout" style="padding-left:0px">Blackout</label>
                            <input type="radio" id="cur_lt_blackout" name="lining_type" wire:model.defer="product_config.lining_type" wire:change="calculatePrice" value="Blackout">
                            <label for="cur_lt_dimout">Dimout</label>
                            <input type="radio" id="cur_lt_dimout" name="lining_type" wire:model.defer="product_config.lining_type" wire:change="calculatePrice" value="Dimout">
                            <label for="cur_lt_standard">Standard</label>
                            <input type="radio" id="cur_lt_standard" name="lining_type" wire:model.defer="product_config.lining_type" wire:change="calculatePrice" value="Standard">
                        </div>
                        @endif
                        <button type="button" class="collapsible">Mount Type <span class="infoIcon openPopup" data-rel="mount_type">i</span></button>
                        <div class="collapsiblecontent">
                            <label for="cur_wallmount" style="padding-left:0px">Wall Mount</label>
                            <input type="radio" id="cur_wallmount" name="mount_type" wire:model.defer="product_config.mount_type" wire:change="calculatePrice" value="Wall Mount">
                            <label for="cur_ceilingmount">Ceiling Mount</label>
                            <input type="radio" id="cur_ceilingmount" name="mount_type" wire:model.defer="product_config.mount_type" wire:change="calculatePrice" value="Ceiling Mount" checked>
                        </div>
                        <button type="button" class="collapsible">Hardware Type</button>
                        <div class="collapsiblecontent">
                            <label for="cur_motorized" style="padding-left:0px">Motorized</label>
                            <input type="radio" id="cur_motorized" name="hardware_type" wire:model.defer="product_config.hardware_type" wire:change="calculatePrice" value="Motorized">
                            <label for="cur_manual">Manual</label>
                            <input type="radio" id="cur_manual" name="hardware_type" wire:model.defer="product_config.hardware_type" wire:change="calculatePrice" value="Manual">
                            <label for="cur_no_hardware">No Hardware</label>
                            <input type="radio" id="cur_no_hardware" name="hardware_type" wire:model.defer="product_config.hardware_type" wire:change="calculatePrice" value="No Hardware">
                        </div>
                        @if ($product_config['hardware_type']=='Motorized')
                        <div class="motorizedoptions">
                            <button type="button" class="collapsible">Power Type</button>
                            <div class="collapsiblecontent">
                                <label for="cur_battery" style="padding-left:0px">Battery</label>
                                <input type="radio" id="cur_battery" name="power_type" wire:model.defer="product_config.power_type" wire:change="calculatePrice" value="Battery">
                                <label for="cur_electricwired">Electric Wired</label>
                                <input type="radio" id="cur_electricwired" name="power_type" wire:model.defer="product_config.power_type" wire:change="calculatePrice" value="Electric Wired">
                            </div>
                            <button type="button" class="collapsible">Control Type</button>
                            <div class="collapsiblecontent">
                                <label for="cur_remote" style="padding-left:0px">Remote</label>
                                <input type="radio" id="cur_remote" name="control_type" wire:model.defer="product_config.control_type" wire:change="calculatePrice" value="Remote">
                                <label for="cur_homeautomation">Home Automation</label>
                                <input type="radio" id="cur_homeautomation" name="control_type" wire:model.defer="product_config.control_type" wire:change="calculatePrice" value="Home Automation">
                            </div>
                        </div>
                        
                        @endif

                        @endif

                        @if (select_calc($product->category->cat_id) == 'sandwichpanels')

                        

                        <button type="button" class="collapsible">Furnishing Unit Dimensions <span class="infoIcon openPopup" data-rel="how_to_measure">i</span></button>
                        <div class="collapsiblecontent">

                            
                            <label for="cur_wwidth">Width</label>
                            <input type="text" name="cur_wwidth" wire:model.defer="product_config.width" wire:change="calculatePrice" style="width:70px;">
                            @error('product_config.width')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror

                            <span class="multiply">&nbsp; &times; &nbsp;</span>

                            <label for="cur_wlength" style="padding-left:0px">Length</label>
                            <input type="text" name="cur_wlength" wire:model.defer="product_config.length" wire:change="calculatePrice" style="width:70px;vertical-align:middle">
                            @error('product_config.length')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
      
                            <label for="unit">Unit</label>
                            <select name="unit" id="unit" wire:model.defer="product_config.unit" wire:change="calculatePrice">
                                <option value="inch">Sq.ft</option>
                            </select>
                        </div>

                        @endif





                        @if (select_calc($product->category->cat_id) == 'blinds')

                        

                        <button type="button" class="collapsible">Furnishing Unit Dimensions <span class="infoIcon openPopup" data-rel="how_to_measure">i</span></button>
                        <div class="collapsiblecontent">


                            
                            <label for="cur_wwidth">Width</label>
                            <input type="text" name="cur_wwidth" wire:model.defer="product_config.width" wire:change="calculatePrice" style="width:70px;">
                            @error('product_config.width')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror

                            <span class="multiply">&nbsp; &times; &nbsp;</span>

                            <label for="cur_wlength" style="padding-left:0px">Height</label>
                            <input type="text" name="cur_wlength" wire:model.defer="product_config.length" wire:change="calculatePrice" style="width:70px;vertical-align:middle">
                            @error('product_config.length')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
      
                            <label for="unit">Unit</label>
                            <select name="unit" id="unit" wire:model.defer="product_config.unit" wire:change="calculatePrice">
                                <option value="inch">Sq.ft</option>
                            </select>
                        </div>



                        <button type="button" class="collapsible">Blind Type</button>
                        <div class="collapsiblecontent">
                            {{-- create counter to iterate and populate options in select  --}}
                            @php
                            $sizeCounter=1;
                            @endphp
                            <select name="size" id="size" wire:model.defer="product_config.size" wire:change="calculatePrice">
                                @foreach($product_attributes as $key=>$value)
                                @if(str_contains($key,"blind_type_".$sizeCounter))
                                @if($value)
                                    <option value={{ $sizeCounter }}>
                                            @foreach($product_attributes as $key2=>$value2)
                                            @if(str_contains($key2,"blind_type_".$sizeCounter))
                                            {{$value2}}
                                            @endif
                                            @endforeach
                                    </option>
                                    @php
                                    $sizeCounter++;
                                    @endphp
                                 @endif   
                                @endif
                            @endforeach
                            </select>
                            </div>

                            <button type="button" class="collapsible">Hardware Type</button>
                            <div class="collapsiblecontent">
                                <label for="cur_motorized" style="padding-left:0px">Motorized</label>
                                <input type="radio" id="cur_motorized" name="hardware_type" wire:model.defer="product_config.hardware_type" wire:change="calculatePrice" value="Motorized">
                                <label for="cur_manual">Manual</label>
                                <input type="radio" id="cur_manual" name="hardware_type" wire:model.defer="product_config.hardware_type" wire:change="calculatePrice" value="Manual">
                            </div>

                            @if ($product_config['hardware_type']=='Motorized')
                        <div class="motorizedoptions">
                            <button type="button" class="collapsible">Control Type</button>
                            <div class="collapsiblecontent">
                                <label for="cur_remote" style="padding-left:0px">Remote Operation</label>
                                <input type="radio" id="cur_remote" name="control_type" wire:model.defer="product_config.control_type" wire:change="calculatePrice" value="Remote">
                                <label for="cur_homeautomation">Home Automation</label>
                                <input type="radio" id="cur_homeautomation" name="control_type" wire:model.defer="product_config.control_type" wire:change="calculatePrice" value="Home Automation">
                            </div>
                        </div>
                            @endif



                        @endif




                        @if (select_calc($product->category->cat_id) == 'curtainpanels')
                        <button type="button" class="collapsible">Furnishing Unit Dimensions <span class="infoIcon openPopup" data-rel="how_to_measure">i</span></button>
                        <div class="collapsiblecontent">
                            
                            <label for="cur_wwidth">Width</label>
                            <input type="text" name="cur_wwidth" wire:model.defer="product_config.width" wire:change="calculatePrice" style="width:70px;margin-left:10px">
                            @error('product_config.width')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                            <span class="multiply">&nbsp; &times; &nbsp;</span>
                            <label for="cur_wlength" style="padding-left:0px">Height</label>
                            <input type="text" name="cur_wlength" wire:model.defer="product_config.length" wire:change="calculatePrice" style="width:70px;vertical-align:middle">
                            @error('product_config.length')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                            <label for="unit">Unit</label>
                            <select name="unit" id="unit" wire:model.defer="product_config.unit" wire:change="calculatePrice">
                                <option value="cm">cm</option>
                                <option value="inch">inch</option>
                            </select>
                        </div>

                        @if (strpos($product->category->cat_nm, 'Sheer') === false && strpos($product->category->cat_nm, 'sheer') === false)
                        <button type="button" class="collapsible">Lining Type <span class="infoIcon openPopup" data-rel="lining_type">i</span></button>
                        <div class="collapsiblecontent">
                            <label for="cur_lt_blackout" style="padding-left:0px">Blackout</label>
                            <input type="radio" id="cur_lt_blackout" name="lining_type" wire:model.defer="product_config.lining_type" wire:change="calculatePrice" value="Blackout">
                            <label for="cur_lt_dimout">Dimout</label>
                            <input type="radio" id="cur_lt_dimout" name="lining_type" wire:model.defer="product_config.lining_type" wire:change="calculatePrice" value="Dimout">
                            <label for="cur_lt_standard">Standard</label>
                            <input type="radio" id="cur_lt_standard" name="lining_type" wire:model.defer="product_config.lining_type" wire:change="calculatePrice" value="Standard">
                        </div>
                        @endif
                        
                        <button type="button" class="collapsible">Mount Type <span class="infoIcon openPopup" data-rel="mount_type">i</span></button>
                        <div class="collapsiblecontent">
                            <label for="cur_wallmount" style="padding-left:0px">Wall Mount</label>
                            <input type="radio" id="cur_wallmount" name="mount_type" wire:model.defer="product_config.mount_type" wire:change="calculatePrice" value="Wall Mount">
                            <label for="cur_ceilingmount">Ceiling Mount</label>
                            <input type="radio" id="cur_ceilingmount" name="mount_type" wire:model.defer="product_config.mount_type" wire:change="calculatePrice" value="Ceiling Mount" checked>
                        </div>
                        <button type="button" class="collapsible">Hardware Type</button>
                        <div class="collapsiblecontent">
                            <label for="cur_motorized" style="padding-left:0px">Motorized</label>
                            <input type="radio" id="cur_motorized" name="hardware_type" wire:model.defer="product_config.hardware_type" wire:change="calculatePrice" value="Motorized">
                            <label for="cur_manual">Manual</label>
                            <input type="radio" id="cur_manual" name="hardware_type" wire:model.defer="product_config.hardware_type" wire:change="calculatePrice" value="Manual">
                        </div>
                        @if ($product_config['hardware_type']=='Motorized')
                        <div class="motorizedoptions">
                            <button type="button" class="collapsible">Power Type</button>
                            <div class="collapsiblecontent">
                                <label for="cur_battery" style="padding-left:0px">Battery</label>
                                <input type="radio" id="cur_battery" name="power_type" wire:model.defer="product_config.power_type" wire:change="calculatePrice" value="Battery">
                                <label for="cur_electricwired">Electric Wired</label>
                                <input type="radio" id="cur_electricwired" name="power_type" wire:model.defer="product_config.power_type" wire:change="calculatePrice" value="Electric Wired">
                            </div>
                            <button type="button" class="collapsible">Control Type</button>
                            <div class="collapsiblecontent">
                                <label for="cur_remote" style="padding-left:0px">Remote</label>
                                <input type="radio" id="cur_remote" name="control_type" wire:model.defer="product_config.control_type" wire:change="calculatePrice" value="Remote">
                                <label for="cur_homeautomation">Home Automation</label>
                                <input type="radio" id="cur_homeautomation" name="control_type" wire:model.defer="product_config.control_type" wire:change="calculatePrice" value="Home Automation">
                            </div>
                        </div>
                        
                        @endif

                        @endif

                        
                        <div class="calculatedPrice">
                            

                            <input id="product-price" style="display:none;" type="text" wire:loading.remove class="calculatedPrice" value="{{$price}}" disabled>
                            <div class="product-price"  style="margin-top:20px; clear:both">
                               <span style="border: 1px solid #c96;padding: 10px;" class"rSymb">
                                <span style="font-size:20px;font-family: 'Montserrat';
                                font-weight: 500;">{{convert_currency($price)}}</span>
                               </span>
                            </div>

                            <input type="text" wire:loading wire:target="calculatePrice"  class="calculatedPrice" value="Loading ...">
                            
                        </div>
                        @error('price')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                </form>


                {{-- <script>

                    let oldCurrency = 'INR';
                    let oldValue = document.getElementById("product-price").value;


                   let selectElement = document.getElementById("currency_selector");



                   selectElement.addEventListener('change', (event) => {
                    console.log(document.getElementById("currency_selector").value);
                    let selectedCurrency = document.getElementById("currency_selector").value;
                    let productPrice = document.getElementById("product-price").value;

                    let url = 'https://v6.exchangerate-api.com/v6/954aa5b6c7b8eb9edddd8eda/latest/INR';

                    
                    // fetching api response and returning it with parsing into js obj and in another then method receiving that obj
                    fetch(url).then(response => response.json()).then(result =>{

                        if(selectedCurrency== 'INR'){
                            document.getElementById("product-price").value = oldValue; 
                        }else{

                        console.log("results",result);
                        let exchangeRate = result.conversion_rates[selectedCurrency]; // getting user selected TO currency rate
                        let totalExRate = (productPrice * exchangeRate).toFixed(2); // multiplying user entered value with selected TO currency rate
                        //exchangeRateTxt.innerText = `${amountVal} ${fromCurrency.value} = ${totalExRate} ${toCurrency.value}`;
                        console.log("converted",totalExRate);
                        document.getElementById("product-price").value = totalExRate;
                        oldCurrency = selectedCurrency;

                        }
                    }).catch(() =>{ // if user is offline or any other error occured while fetching data then catch function will run
                        exchangeRateTxt.innerText = "Something went wrong";
                    });


                    });

                    

                
                </script> --}}
               


                <div class="infoPopup" id="mount_type">
                    <div class="content">
                        <span class="infoIcon">i</span>
                        <span class="closePop">&times;</span>
                        <h3>MOUNT TYPE</h3>

                        <h5>Ceiling Mount</h5>
                        <p>Recommended to have a ceiling mounted curtain track for all
                        curtains where a cove is available. The track is screwed in the
                        ceiling of the room/space and the track is mounted.</p>
                        <h5>Wall Mount</h5>
                        <p>Recommended when the track is to be mounted from one end of
                        the wall to another end as there is no cove available. The track us
                        screwed on either sides of the wall and the track is mounted.
                        </p>
                        <h5>Mount Type not decided</h5>
                        <p>In a situation where the mount type is not decided, you could
                        choose the ceiling mount type for the sake of price calculation</p>
                    </div>
                </div>
                <div class="infoPopup" id="lining_type">
                    <div class="content">
                        <span class="infoIcon">i</span>
                        <span class="closePop">&times;</span>
                        <h3>LINING TYPE</h3>

                        <h5>Blackout Lining</h5>
                        <p>Blackout Linings are a 3 layered lining fabric which are attached to the
        solid curtain to block almost 100% sunlight, giving a hotel room like
        environment in your space. This is highly recommended in spaces where
        televisions are viewed, rooms where privacy is needed, or a space where
        you like to nap in the day at times!</p>
                        <h5>Dimout Lining</h5>
                        <p>Dimout Linings is a lining fabric which is attached to the solid curtain to
        block about 70% sunlight. Dimout fabrics significantly reduce the degree
        of light transmission from one side to the other.
                        </p>
                        <h5>Standard Lining</h5>
                        <p>Standard Lining is attached to the solid curtain to block about 20%
        sunlight, this lining is a satin lining and can be used for curtains where
        privacy is not required as such.</p>
                    </div>
                </div>
                <div class="infoPopup" id="how_to_measure">
                    <div class="content">
                        <span class="infoIcon">i</span>
                        <span class="closePop">&times;</span>
                        <h3>HOW TO MEASURE</h3>
                        <p>Please note that the measurements inserted by you are an estimate to get the
                            price of the curtain or blind, however the final measurements will be taken by our
                            installation team so you need not stress over this!
                        </p>
                        <h5>Within the window frame:</h5>
                        <ul>
                            <li>Width of a Blind within the window frame: please measure
                                the width of the blind starting from one end of the window
                                frame to the other.
                            </li>
                            <li>Drop of the Blind within the window frame: please measure
                                the height of the blind starting from top of the window
                                frame till the bottom of the window frame.
                            </li>
                        </ul>
                        <h5>Outside the window frame:</h5>
                        <ul>
                            <li>Width of a Blind outside the window frame: please measure
                                the width of the blind starting from one end of the window
                                frame to the other and add 10 to 15 cms to this depending
                                upon the availability of space
                            </li>
                            <li>Drop of the Blind within the window frame: please measure
                                the height of the blind starting from top of the window
                                frame till the bottom of the window frame and add about 10
                                cms so that the blind is below the window frame.

                            </li>
                        </ul>
                        <h5>Floor to Ceiling</h5>
                        <ul>
                            <li>Width of the Curtain: please measure the width of the curtain from one end of
                                the cove to another end of the cove in total, that will be the width of the
                                required curtain
                            </li>
                            <li>Drop of the Curtain: measure the total height of the curtain from the ceiling to
                                the floor, this will be the height of the required curtain. In case you do not want
                                the curtain to touch the floor you can reduce by 1.27 cms
                            </li>
                        </ul>
                        <h5>Above the Window</h5>
                        <ul>
                            <li>Width of the Curtain: please measure the width of the curtain from one end of
                                the window to another end of the window in total and add 15 cms on each side,
                                that will be the width of the required curtain. In case there is a door on one of
                                the sides, do add 15 cms only on one side. In a situation where there are doors
                                on either sides, do not add any extra cms to the width of the window
                            </li>
                            <li>Drop of the Curtain: measure the total height of the curtain about 20 cms
                                above the window, this will be the height of the required curtain. In case you do
                                not want the curtain to touch the floor you can reduce by 1 cm.
                            </li>
                        </ul>

                    </div>
                </div>
                @endif


                @if (session('message'))
                    <div class="alert alert-secondary">
                        {{ session('message') }}
                    </div>
                @endif
                @if (auth()->guard('designer')->check())
                <div class="contactformproductdetailsSubmit">
                    <div class="button">
                        @if ($calculate_price)
                        <a href="javascript:void(0)" onclick="history.back()" class="cta-button-outline">Continue Browsing</a>
                        @else
                        <a href="javascript:void(0)" wire:click="$set('calculate_price',true)" class="cta-button-outline">Price Calculator</a>
                        @endif
                        @if (session('message'))
                            <a href="{{route('designer.shortlist')}}" class="cta-button-outline">Go To Shortlist</a>
                        @else
                        <button type="button" wire:click="save" class="cta-button-black-bg">Shortlist</button>
                        @endif
                    </div>
                </div>
                @else

                <div class="leaveMessage">
                <h3 id="product-enquiry-success">Liked our product?</h3>
                <p>Leave your details here enabling us to contact you</p>

                <form name="product-enquiry-form" class="enquiryForm">

                    @error('price')
                        <strong>{{ $message }}</strong>
                    @enderror
                    <ul name="type" class="flex-box">
                        <li>
                            <input type="radio" checked style="margin: 0px 10px;" name="type" id="homeowner" name="visitor_type" value="homeowner">
                            <label for="homeowner" >Homeowner</label>
                        </li>
                        <li>
                            <input type="radio" name="type" id="hotelier" name="visitor_type"  value="hotelier">
                            <label style="margin-left:10px;" for="hotelier">Hotelier</label>
                        </li>
                        <li>
                            <input type="radio" name="type" id="aplusid" name="visitor_type" value="architect">
                            <label style="margin-left:10px;" for="aplusid">A+ID</label>
                        </li>
                    </ul>
                    <div class="field">
                        <input type="text" name="popup-name" required wire:model.defer="form.name" style="width:100%;" placeholder="Name">
                        @error('form.name')
                            <strong>{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="fields">
                        <div class="field">
                            <input type="tel" name="popup-number" required placeholder="Phone No." id="phone5">
                            <span id="valid-msg5" class="hide">✓ Valid</span>
                            <span id="error-msg5" class="hide"></span>
                            <input type="hidden" name="iti__selected-dial-code">
                            @error('form.phone')
                                <strong>{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="field">
                            <input type="text" name="popup-email" required wire:model.defer="form.email" placeholder="Email">
                            @error('form.email')
                                <strong>{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                    <input id="popup-form-token" name="_token" type="hidden" value="{{csrf_token()}}">
                </form>
                <div class="contactformproductdetailsSubmit">
                    <div class="button">
                        <button id="product-enquiry-btn" onclick="submitEnquiryForm()" class="cta-button-black" type="button">Submit</button>    
                    </div>
                </div>
                                </div>
                @endif
            </div>
        </div>

    </div><!-- End .row -->
</div><!-- End .product-details-top -->
<style>
    .zoom-box{
    position: relative;
}
.zoom-box img{
    vertical-align: bottom;
}
.zoom-box .zoom-selector{
    position: absolute;
    background-image: url("../images/selector.png");
    background-repeat: repeat;
    display: none;
    cursor: crosshair;
}
.zoom-box .viewer-box{
    position: absolute;
    border: 1px solid rgb(239,237,240);
    display: none;
    overflow: hidden;
}
.zoom-box .viewer-box>img{
    position: absolute;
    left: 0;
    top: 0;
}
.page-wrapper.productDetailsPage .container .scroll img{
    position: relative;
    opacity: 1;
}
.page-wrapper.productDetailsPage .container .scroll .zoom-box {
    position: absolute;
    opacity: 0;
}
.product-gallery {
    margin-bottom: 2rem;
    position: relative;
    z-index: 9;
}
.product-gallery.product-gallery-vertical .row figure.product-main-image .scroll .zoom-box.active {
    opacity: 1;
    position: static;
}
@media screen and (max-width: 991px){
        .header-search {
        display: block;
        position: absolute;
        z-index: 999;
    }
    }
</style>

@if (auth()->guard('designer')->check())
@else
<style>
    .header-search {
    position: absolute !important;
    top: 65px !important;
}
</style>
@endif

@section('script')

<script src="{{asset('scripts/jquery.jqZoom.js')}}"></script>

<script>
    console.log("hello");
function submitEnquiryForm(){

    var formSubmitBtn = document.getElementById("product-enquiry-btn");
    var formSuccess= document.getElementById("product-enquiry-success");
    //validate and send email
    var form = document.forms['product-enquiry-form'];



    if( form.reportValidity()){

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            formSuccess.innerHTML = 'Someone will be with you shortly';
            formSuccess.classList.add('form-success-text'); 
            formSubmitBtn.style.display='none';

        }
    }
    
    xhttp.open("POST", "/contact-mail", true);
    const formData = new FormData(form)
    xhttp.send(formData);
     formSubmitBtn.innerHTML = "Loading";
     formSubmitBtn.onclick = function(){console.log("please wait")};
     

    }else{
        console.log("not sending");
        
    }

}
</script>

<script src="{{asset('scripts/jquery.jqZoom.js')}}"></script>






<script>

    Livewire.on('updateZoom', postId => {
        loadZoomFeature();
    })

    function loadZoomFeature() {
 
        $(document).on('click','div.infoPopup .content span.closePop', function(){
            $('div.infoPopup').fadeOut();
        });
        var wWidth = $(window).width()
        if( wWidth >= 1024){
            $(".product-main-image img").jqZoom({
                selectorWidth: 30,
                selectorHeight: 30,
                viewerWidth: 800,
                viewerHeight: 715
            });
        }

        $(document).on('click','span.openPopup', function(){
            var ids = $(this).attr('data-rel');
            $('div.infoPopup#'+ids).fadeIn();
        });

        $('.product-gallery.product-gallery-vertical .row div#product-zoom-gallery img').click(function(){
            var indexer = $(this).index();
            $('.product-gallery.product-gallery-vertical .row figure.product-main-image .scroll .zoom-box').removeClass('active');
            $('.product-gallery.product-gallery-vertical .row figure.product-main-image .scroll .zoom-box:eq('+indexer+')').addClass('active');
        })

    }

    $(document).ready(loadZoomFeature());
</script>

@endsection
