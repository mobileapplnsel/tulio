<div>
    <div class="title flex-box">
        <h1 class="cursive-title">Shortlisted products</h1>
        {!! Form::select('category', $categories, null, [
            'placeholder' => 'Select Category',
            'class' => 'filter-select',
            'wire:model' => 'filter.category',
        ]) !!}
    </div>



    <div class="wrapper filterFormWrapper">
        {{-- <p>Refine By:</p> --}}
        <div class="filterForm">
            {!! Form::select('type', ['Solid' => 'Solid', 'Sheer' => 'Sheer'], null, [
                'placeholder' => 'Type',
                'class' => 'filter-select',
                'wire:model' => 'filter.type',
            ]) !!}

            <select wire:model="filter.technique" class="filter-select" name="technique" id="productTq">
                <option value="">Technique</option>
                @foreach ($techniques as $technique)
                    @if (isset($_GET['technique']))
                        <option value="{{ $technique->name }}"
                            {{ $technique->name == $_GET['technique'] ? 'selected' : '' }}>{{ $technique->name }}
                        </option>
                    @else
                        <option value="{{ $technique->name }}">{{ $technique->name }}</option>
                    @endif
                @endforeach
            </select>

            <select wire:model="filter.ambience" class="filter-select" name="ambience" id="productTq">
                <option value="">Ambience</option>
                @foreach ($ambiences as $ambience)
                    @if (isset($_GET['ambience']))
                        <option value="{{ $ambience->name }}"
                            {{ $ambience->name == $_GET['ambience'] ? 'selected' : '' }}>{{ $ambience->name }}
                        </option>
                    @else
                        <option value="{{ $ambience->name }}">{{ $ambience->name }}</option>
                    @endif
                @endforeach
            </select>

            <select wire:model="filter.design" class="filter-select" name="design" id="productTq">
                <option value="">Design</option>
                @foreach ($designs as $design)
                    @if (isset($_GET['design']))
                        <option value="{{ $design->name }}"
                            {{ $design->name == $_GET['design'] ? 'selected' : '' }}>{{ $design->name }}</option>
                    @else
                        <option value="{{ $design->name }}">{{ $design->name }}</option>
                    @endif
                @endforeach
            </select>
            <a style="font-size: 13.333px;color: #333;" class="clear-all" href="#" id="clear-button"
                type="button">Clear All</a>
        </div>
    </div>
    <div class="row flex-box">
        <div class="col-md-6 flex-box">
            <section class="prodlist product-list-scroll">
                @if (session()->has('error'))
                    <script>
                        alert('{{ session()->get('error') }}');
                        setTimeout(() => {
                            $('.prodlist script').remove();
                        }, 1000);
                    </script>
                @endif
                <div id="productlist" class="column4">
                    <div class="wrapper desktop-image">
                        <ul class="center-images">
                            @forelse ($shortlists as $shortlist)
                                <li>
                                    <div class="desktop-image image-container">
                                        <div class="flex-box row">
                                            <div class="col_6">
                                                <div class="relative">
                                                    <img loading="lazy"
                                                        src="{{ $shortlist->product->setColor($shortlist->colour_id)->closeup_image }}"
                                                        alt="" class="" />
                                                    <a href="javascript:void(0)"
                                                        wire:click="selectProduct({{ $shortlist->id }})" class="add"
                                                        title="Add"><span class="add">&#10005;</span></a>
                                                </div>
                                            </div>
                                            <div class="col_6">
                                                <div class="productDetails">
                                                    <div class="flex-box">
                                                        <h2>
                                                            <a
                                                                href="javascript:void(0)">{{ $shortlist->product->detail->pd_nm }}</a>
                                                            <span class="colorcircle"
                                                                style="background-color:#{{ $shortlist->colour->c_no }};margin-right:10px"></span>
                                                        </h2>
                                                        <div class="priceBox">
                                                            <span>
                                                                {{ convert_currency($shortlist->price) }}
                                                            </span>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @empty
                                <h2>There is nothing in shortlist.</h2>
                            @endforelse
                        </ul>
                    </div>
            </section>
        </div>
        @if ($selected_shortlist)
            <div class="formPoup" style="display:block">
                <form class="content" style="margin-left:0px;">
                    <!-- <span class="closePop">&times;</span> -->
                    <div class="pop-head">
                        @php
                            $room = \App\Models\ProjectRoom::find($selected_room);
                        @endphp
                        <span class="">{{ $room->project->name }} > {{ $room->name }}</span>
                        <a href="javascript:void(0)" wire:click="$set('selected_shortlist',null)"
                            class="closePop">&times;</a>
                    </div>
                    <h2>
                        <a href="javascript:void(0)">{{ $selected_shortlist['name'] }}</a>
                        <span class="colorcircle"
                            style="background-color:#{{ $selected_shortlist['color'] }};margin-right:10px"></span>
                    </h2>
                    <p><strong>{{ $selected_shortlist['pd_sc'] }} curtain</strong> SKU No.
                        {{ $selected_shortlist['code'] }}</p>
                    <p>{{ $selected_shortlist['pd_ds'] }}</p>

                    <div name="Curtains" class="productCustomOptions">

                        <button type="button" class="collapsible">Quantity</button>
                        <div class="collapsiblecontent">
                            <input class="quantitybox" type="text" wire:model.defer="selected_shortlist.quantity"
                                wire:change="calculatePrice" style="width:40px;" min="1" max="10"
                                step="1" data-decimals="0" required value="1">
                            @error('selected_shortlist.quantity')
                                <strong class="error">{{ $message }}</strong>
                            @enderror

                            @if (select_calc($product->category->cat_id) == 'curtain')
                                <label class="autoWidth" for="cur_pyes">Pair</label>
                                <input type="radio" id="cur_pyes" name="cur_pair"
                                    wire:model.defer="selected_shortlist.quantity_type" wire:change="calculatePrice"
                                    value="Pair">
                                <span class="showOnMobile"></span>
                                <label class="autoWidth" for="cur_pno">Single</label>
                                <input type="radio" id="cur_pno" name="cur_pair"
                                    wire:model.defer="selected_shortlist.quantity_type" wire:change="calculatePrice"
                                    value="Single">
                                <span class="showOnMobile"></span>
                            @endif

                        </div>

                        @if (select_calc($product->category->cat_id) == 'simple')
                            <button type="button" class="collapsible">Variations</button>
                            <div class="collapsiblecontent">



                                {{-- create counter to iterate and populate options in select  --}}
                                @php
                                    $sizeCounter = 1;
                                @endphp

                                <select style="padding: 11px 15px;" name="size" id="size"
                                    wire:model.defer="selected_shortlist.size" wire:change="calculatePrice">

                                    @foreach ($product_attributes as $key => $value)
                                        @if (str_contains($key, 'variant_value_' . $sizeCounter))
                                            @if ($value)
                                                <option value={{ $value }}>

                                                    @foreach ($product_attributes as $key2 => $value2)
                                                        @if (str_contains($key2, 'variant_name_' . $sizeCounter))
                                                            {{ $value2 }}
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
                            <button type="button" class="collapsible">Furnishing Unit Dimensions </button>
                            <div class="collapsiblecontent">
                                <label for="cur_wlength" style="padding-left:0px">Height</label>
                                <input type="text" name="cur_wlength" wire:model.defer="selected_shortlist.length"
                                    wire:change="calculatePrice" style="width:40px;vertical-align:middle"><span
                                    class="multiply">&times;</span>
                                @error('selected_shortlist.length')
                                    <strong class="error">{{ $message }}</strong>
                                @enderror
                                <span class="showOnMobile"></span>
                                <label for="cur_wwidth">Width</label>
                                <input type="text" name="cur_wwidth" wire:model.defer="selected_shortlist.width"
                                    wire:change="calculatePrice" style="width:40px;margin-left:10px">
                                @error('selected_shortlist.width')
                                    <strong class="error">{{ $message }}</strong>
                                @enderror
                                <span class="showOnMobile"></span>
                                <div class="showOnMob"></div>
                                <label for="unit">Unit</label>
                                <select name="unit" id="unit" wire:model.defer="selected_shortlist.unit"
                                    wire:change="calculatePrice">
                                    <option value="cm">cm</option>
                                    <option value="inch">inch</option>
                                </select>
                                <span class="showOnMobile"></span>
                            </div>

                            @if (strpos($product->category->cat_nm, 'Sheer') === false && strpos($product->category->cat_nm, 'sheer') === false)
                                <button type="button" class="collapsible">Lining Type</button>
                                <div class="collapsiblecontent">
                                    <label class="autoWidth" for="cur_lt_blackout"
                                        style="padding-left:0px">Blackout</label>
                                    <input type="radio" id="cur_lt_blackout" name="lining_type"
                                        wire:model.defer="selected_shortlist.lining_type" wire:change="calculatePrice"
                                        value="Blackout">
                                    <span class="showOnMobile"></span>
                                    <label class="autoWidth" for="cur_lt_dimout">Dimout</label>
                                    <input type="radio" id="cur_lt_dimout" name="lining_type"
                                        wire:model.defer="selected_shortlist.lining_type" wire:change="calculatePrice"
                                        value="Dimout">
                                    <span class="showOnMobile"></span>
                                    <label class="autoWidth" for="cur_lt_standard">Standard</label>
                                    <input type="radio" id="cur_lt_standard" name="lining_type"
                                        wire:model.defer="selected_shortlist.lining_type" wire:change="calculatePrice"
                                        value="Standard">
                                    <span class="showOnMobile"></span>
                                </div>
                            @endif

                            <button type="button" class="collapsible">Mount Type </button>
                            <div class="collapsiblecontent">
                                <label class="autoWidth" for="cur_wallmount" style="padding-left:0px">Wall
                                    Mount</label>
                                <input type="radio" id="cur_wallmount" name="mount_type"
                                    wire:model.defer="selected_shortlist.mount_type" wire:change="calculatePrice"
                                    value="Wall Mount">
                                <span class="showOnMobile"></span>
                                <label class="autoWidth" for="cur_ceilingmount">Ceiling Mount</label>
                                <input type="radio" id="cur_ceilingmount" name="mount_type"
                                    wire:model.defer="selected_shortlist.mount_type" wire:change="calculatePrice"
                                    value="Ceiling Mount" checked>
                                <span class="showOnMobile"></span>
                            </div>
                            <button type="button" class="collapsible">Hardware Type</button>
                            <div class="collapsiblecontent">
                                <label class="autoWidth" for="cur_motorized"
                                    style="padding-left:0px">Motorized</label>
                                <input type="radio" id="cur_motorized" name="hardware_type"
                                    wire:model.defer="selected_shortlist.hardware_type" wire:change="calculatePrice"
                                    value="Motorized">
                                <span class="showOnMobile"></span>
                                <label class="autoWidth" for="cur_manual">Manual</label>
                                <input type="radio" id="cur_manual" name="hardware_type"
                                    wire:model.defer="selected_shortlist.hardware_type" wire:change="calculatePrice"
                                    value="Manual">
                                <span class="showOnMobile"></span>
                                <label class="autoWidth" for="cur_no_hardware">No Hardware</label>
                                <input type="radio" id="cur_no_hardware" name="hardware_type"
                                    wire:model.defer="selected_shortlist.hardware_type" wire:change="calculatePrice"
                                    value="No Hardware">
                                <span class="showOnMobile"></span>
                            </div>
                            @if ($selected_shortlist['hardware_type'] == 'Motorized')
                                <div class="motorizedoptions">
                                    <button type="button" class="collapsible">Power Type</button>
                                    <div class="collapsiblecontent">
                                        <label class="autoWidth" for="cur_battery"
                                            style="padding-left:0px">Battery</label>
                                        <input type="radio" id="cur_battery" name="power_type"
                                            wire:model.defer="selected_shortlist.power_type"
                                            wire:change="calculatePrice" value="Battery">
                                        <span class="showOnMobile"></span>
                                        <label class="autoWidth" for="cur_electricwired">Electric Wired</label>
                                        <input type="radio" id="cur_electricwired" name="power_type"
                                            wire:model.defer="selected_shortlist.power_type"
                                            wire:change="calculatePrice" value="Electric Wired">
                                        <span class="showOnMobile"></span>
                                    </div>
                                    <button type="button" class="collapsible">Control Type</button>
                                    <div class="collapsiblecontent">
                                        <label class="autoWidth" for="cur_remote"
                                            style="padding-left:0px">Remote</label>
                                        <input type="radio" id="cur_remote" name="control_type"
                                            wire:model.defer="selected_shortlist.control_type"
                                            wire:change="calculatePrice" value="Remote">
                                        <span class="showOnMobile"></span>
                                        <label class="autoWidth" for="cur_homeautomation">Home Automation</label>
                                        <input type="radio" id="cur_homeautomation" name="control_type"
                                            wire:model.defer="selected_shortlist.control_type"
                                            wire:change="calculatePrice" value="Home Automation">
                                        <span class="showOnMobile"></span>
                                    </div>
                                </div>
                            @endif
                        @endif

                        @if (select_calc($product->category->cat_id) == 'sandwichpanels')
                            <button type="button" class="collapsible">Furnishing Unit Dimensions <span
                                    class="infoIcon openPopup" data-rel="how_to_measure">i</span></button>
                            <div class="collapsiblecontent">

                                <label for="cur_wlength" style="padding-left:0px">Length</label>
                                <input type="text" name="cur_wlength" wire:model.defer="selected_shortlist.length"
                                    wire:change="calculatePrice" style="width:70px;vertical-align:middle">
                                @error('selected_shortlist.length')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                                <div class="showOnMob"></div>

                                <label for="cur_wwidth">Width</label>
                                <input type="text" name="cur_wwidth" wire:model.defer="selected_shortlist.width"
                                    wire:change="calculatePrice" style="width:70px;margin-left:10px">
                                @error('selected_shortlist.width')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                                <span class="multiply">&times;</span>

                                <label for="unit">Unit</label>
                                <select name="unit" id="unit" wire:model.defer="selected_shortlist.unit"
                                    wire:change="calculatePrice">
                                    <option value="inch">Sq.ft</option>
                                </select>
                            </div>
                        @endif



                        @if (select_calc($product->category->cat_id) == 'blinds')



                            <button type="button" class="collapsible">Furnishing Unit Dimensions <span
                                    class="infoIcon openPopup" data-rel="how_to_measure">i</span></button>
                            <div class="collapsiblecontent">

                                <label for="cur_wlength" style="padding-left:0px">Height</label>
                                <input type="text" name="cur_wlength" wire:model.defer="selected_shortlist.length"
                                    wire:change="calculatePrice" style="width:70px;vertical-align:middle">
                                @error('selected_shortlist.length')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                                <div class="showOnMob"></div>

                                <label for="cur_wwidth">Width</label>
                                <input type="text" name="cur_wwidth" wire:model.defer="selected_shortlist.width"
                                    wire:change="calculatePrice" style="width:70px;margin-left:10px">
                                @error('selected_shortlist.width')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                                <span class="multiply">&times;</span>

                                <label for="unit">Unit</label>
                                <select name="unit" id="unit" wire:model.defer="selected_shortlist.unit"
                                    wire:change="calculatePrice">
                                    <option value="inch">Sq.ft</option>
                                </select>
                            </div>



                            <button type="button" class="collapsible">Blind Type</button>
                            <div class="collapsiblecontent">
                                <label for="size">types</label>
                                {{-- create counter to iterate and populate options in select  --}}
                                @php
                                    $sizeCounter = 1;
                                @endphp
                                <select name="size" id="size" wire:model.defer="selected_shortlist.size"
                                    wire:change="calculatePrice">
                                    @foreach ($product_attributes as $key => $value)
                                        @if (str_contains($key, 'blind_type_' . $sizeCounter))
                                            @if ($value)
                                                <option value={{ $sizeCounter }}>
                                                    @foreach ($product_attributes as $key2 => $value2)
                                                        @if (str_contains($key2, 'blind_type_' . $sizeCounter))
                                                            {{ $value2 }}
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
                                <input type="radio" id="cur_motorized" name="hardware_type"
                                    wire:model.defer="selected_shortlist.hardware_type" wire:change="calculatePrice"
                                    value="Motorized">
                                <label for="cur_manual">Manual</label>
                                <input type="radio" id="cur_manual" name="hardware_type"
                                    wire:model.defer="selected_shortlist.hardware_type" wire:change="calculatePrice"
                                    value="Manual">
                            </div>

                            @if ($selected_shortlist['hardware_type'] == 'Motorized')
                                <div class="motorizedoptions">
                                    <button type="button" class="collapsible">Control Type</button>
                                    <div class="collapsiblecontent">
                                        <label for="cur_remote" style="padding-left:0px">Remote Operation</label>
                                        <input type="radio" id="cur_remote" name="control_type"
                                            wire:model.defer="selected_shortlist.control_type"
                                            wire:change="calculatePrice" value="Remote">
                                        <label for="cur_homeautomation">Home Automation</label>
                                        <input type="radio" id="cur_homeautomation" name="control_type"
                                            wire:model.defer="selected_shortlist.control_type"
                                            wire:change="calculatePrice" value="Home Automation">
                                    </div>
                                </div>
                            @endif


                        @endif


                        @if (select_calc($product->category->cat_id) == 'curtainpanels')
                            <button type="button" class="collapsible">Furnishing Unit Dimensions <span
                                    class="infoIcon openPopup" data-rel="how_to_measure">i</span></button>
                            <div class="collapsiblecontent">

                                <label for="cur_wwidth">Width</label>
                                <input type="text" name="cur_wwidth" wire:model.defer="selected_shortlist.width"
                                    wire:change="calculatePrice" style="width:70px;margin-left:10px">
                                @error('selected_shortlist.width')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                                <span class="multiply">&times;</span>
                                <label for="cur_wlength" style="padding-left:0px">Height</label>
                                <input type="text" name="cur_wlength" wire:model.defer="selected_shortlist.length"
                                    wire:change="calculatePrice" style="width:70px;vertical-align:middle">
                                @error('selected_shortlist.length')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                                <div class="showOnMob"></div>
                                <label for="unit">Unit</label>
                                <select name="unit" id="unit" wire:model.defer="selected_shortlist.unit"
                                    wire:change="calculatePrice">
                                    <option value="cm">cm</option>
                                    <option value="inch">inch</option>
                                </select>
                            </div>

                            <label for="cur_pyes">Pair</label>
                            <input type="radio" id="cur_pyes" name="cur_pair"
                                wire:model.defer="selected_shortlist.quantity_type" wire:change="calculatePrice"
                                value="Pair">
                            <label for="cur_pno">Single</label>
                            <input type="radio" id="cur_pno" name="cur_pair"
                                wire:model.defer="selected_shortlist.quantity_type" wire:change="calculatePrice"
                                value="Single">



                            @if (strpos($product->category->cat_nm, 'Sheer') === false && strpos($product->category->cat_nm, 'sheer') === false)
                                <button type="button" class="collapsible">Lining Type <span
                                        class="infoIcon openPopup" data-rel="lining_type">i</span></button>
                                <div class="collapsiblecontent">
                                    <label for="cur_lt_blackout" style="padding-left:0px">Blackout</label>
                                    <input type="radio" id="cur_lt_blackout" name="lining_type"
                                        wire:model.defer="selected_shortlist.lining_type" wire:change="calculatePrice"
                                        value="Blackout">
                                    <label for="cur_lt_dimout">Dimout</label>
                                    <input type="radio" id="cur_lt_dimout" name="lining_type"
                                        wire:model.defer="selected_shortlist.lining_type" wire:change="calculatePrice"
                                        value="Dimout">
                                    <label for="cur_lt_standard">Standard</label>
                                    <input type="radio" id="cur_lt_standard" name="lining_type"
                                        wire:model.defer="selected_shortlist.lining_type" wire:change="calculatePrice"
                                        value="Standard">
                                </div>
                            @endif

                            <button type="button" class="collapsible">Mount Type <span class="infoIcon openPopup"
                                    data-rel="mount_type">i</span></button>
                            <div class="collapsiblecontent">
                                <label for="cur_wallmount" style="padding-left:0px">Wall Mount</label>
                                <input type="radio" id="cur_wallmount" name="mount_type"
                                    wire:model.defer="selected_shortlist.mount_type" wire:change="calculatePrice"
                                    value="Wall Mount">
                                <label for="cur_ceilingmount">Ceiling Mount</label>
                                <input type="radio" id="cur_ceilingmount" name="mount_type"
                                    wire:model.defer="selected_shortlist.mount_type" wire:change="calculatePrice"
                                    value="Ceiling Mount" checked>
                            </div>
                            <button type="button" class="collapsible">Hardware Type</button>
                            <div class="collapsiblecontent">
                                <label for="cur_motorized" style="padding-left:0px">Motorized</label>
                                <input type="radio" id="cur_motorized" name="hardware_type"
                                    wire:model.defer="selected_shortlist.hardware_type" wire:change="calculatePrice"
                                    value="Motorized">
                                <label for="cur_manual">Manual</label>
                                <input type="radio" id="cur_manual" name="hardware_type"
                                    wire:model.defer="selected_shortlist.hardware_type" wire:change="calculatePrice"
                                    value="Manual">
                            </div>
                            @if ($selected_shortlist['hardware_type'] == 'Motorized')
                                <div class="motorizedoptions">
                                    <button type="button" class="collapsible">Power Type</button>
                                    <div class="collapsiblecontent">
                                        <label for="cur_battery" style="padding-left:0px">Battery</label>
                                        <input type="radio" id="cur_battery" name="power_type"
                                            wire:model.defer="selected_shortlist.power_type"
                                            wire:change="calculatePrice" value="Battery">
                                        <label for="cur_electricwired">Electric Wired</label>
                                        <input type="radio" id="cur_electricwired" name="power_type"
                                            wire:model.defer="selected_shortlist.power_type"
                                            wire:change="calculatePrice" value="Electric Wired">
                                    </div>
                                    <button type="button" class="collapsible">Control Type</button>
                                    <div class="collapsiblecontent">
                                        <label for="cur_remote" style="padding-left:0px">Remote</label>
                                        <input type="radio" id="cur_remote" name="control_type"
                                            wire:model.defer="selected_shortlist.control_type"
                                            wire:change="calculatePrice" value="Remote">
                                        <label for="cur_homeautomation">Home Automation</label>
                                        <input type="radio" id="cur_homeautomation" name="control_type"
                                            wire:model.defer="selected_shortlist.control_type"
                                            wire:change="calculatePrice" value="Home Automation">
                                    </div>
                                </div>
                            @endif

                        @endif



                        @error('selected_shortlist.price')
                            <strong class="error">{{ $message }}</strong>
                        @enderror
                        <div class="contactformproductdetailsSubmit">
                            <div class="button">
                                <div class="flex-box">
                                    <div class="product-price modal-pricebox" style="margin-top:20px; clear:both">
                                        <span class="prieBox">
                                            @if($selected_shortlist['price'] != '0.00' && $selected_shortlist['price'] != '0' && $selected_shortlist['price'] != '')
                                                {{ convert_currency($selected_shortlist['price']) }}
                                            @else
                                                {{ convert_currency(0.00) }}
                                            @endif    
                                        </span>
                                    </div>
                                    <button type="button" wire:loading.remove wire:click="addProduct" class="cta-button-black-bg">Add</button>
                                    <button type="button" wire:loading wire:target="addProduct" class="cta-button-black-bg">Adding ...</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        @endif
        <div class="col-md-6">
            <div class="projectAction">
                <a class="createProject">Project Boards</a>
            </div>
            <div class="projectBg">
                <div class="tooltip-info">
                    <span class="icon-tool"><i class="bx bxs-info-circle"></i></span>
                    <span class="tooltiptext">Select a room from the drop down before adding a product from your
                        shortlist.</span>
                </div>
                <ul class="projectLists">
                    @foreach ($projects as $project)
                        <li>
                            <a onclick="return confirm('Do you want to delete this Project Permanently?');"
                                href="{{ route('designer.project.destroy', $project) }}" class="delete">&#10005;</a>
                            <h3 class="toggleHandler {{ $selected_project == $project->id ? 'active' : '' }}"
                                wire:click="setProject({{ $selected_project ?? '0' }},{{ $project->id }})">
                                <span>{{ $project->name }} <span class="arrow">&#10095;</span></span>

                            </h3>
                            <div class="projectDetails toggleContent"
                                style="display: {{ $selected_project == $project->id ? 'block' : 'none' }}">

                                <ul>
                                    @foreach ($project->rooms as $room)
                                        <li>

                                            <div class="title toggleHandler {{ $selected_room == $room->id ? 'active' : '' }}"
                                                wire:click="setRoom({{ $selected_room ?? '0' }},{{ $room->id }})">
                                                <span class="lable">{{ $room->name }} <span
                                                        class="arrow">&#10095;</span>
                                                    <span class="showonHover">
                                                        <ul>
                                                            <li wire:click="removeRoom({{ $room->id }})">Remove
                                                                Room</li>
                                                            <li wire:click="createOption({{ $room->id }})">
                                                                Duplicate Room</li>
                                                        </ul>
                                                    </span>
                                                </span> <span class="price">

                                                    {{ convert_currency($room->budget) }}


                                                </span>
                                            </div>
                                            <div class="selectedProjects toggleContent"
                                                style="display: {{ $selected_room == $room->id ? 'block' : 'none' }}">
                                                <ul class="center-images">
                                                    @forelse ($room->products as $product)
                                                        <li>
                                                            <div class="desktop-image image-container">
                                                                <div class="flex-box row">
                                                                    <div class="col_6">
                                                                        <img loading="lazy"
                                                                            src="{{ $product->product->setColor($product->color_id)->closeup_image }}"
                                                                            alt="" class="" />
                                                                    </div>
                                                                    <div class="col_6">
                                                                        <div class="productDetails">
                                                                            <div class="action">
                                                                                <a href="javascript:void(0)"
                                                                                    class="edit"
                                                                                    wire:click="editProduct({{ $product->id }})">
                                                                                    <svg width="121" height="119"
                                                                                        viewBox="0 0 121 119"
                                                                                        fill="none"
                                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                                        <path
                                                                                            d="M117.973 15.9043L104.187 2.13678C102.763 0.713313 100.892 0 99.0233 0C97.1548 0 95.2863 0.710155 93.8628 2.13362L82.8349 13.13L106.945 37.1996L117.973 26.2063C120.824 23.3594 120.824 18.7418 117.973 15.9043Z"
                                                                                            fill="black" />
                                                                                        <path
                                                                                            d="M11.248 84.5843L35.3618 108.657L101.785 42.3569L77.6713 18.2842L11.248 84.5843Z"
                                                                                            fill="black" />
                                                                                        <path
                                                                                            d="M6.04335 89.7353L0.895508 118.937L30.1571 113.805L6.04335 89.7353Z"
                                                                                            fill="black" />
                                                                                    </svg>
                                                                                </a>
                                                                                <a href="javascript:void(0)"
                                                                                    wire:click="removeRoomProduct({{ $product->id }})"
                                                                                    class="delete">&#10005;</a>
                                                                            </div>
                                                                            <div class="flex-box">
                                                                                <h2><a class="proj-product-title"
                                                                                        href="http://tulio.design/product/{{ $product->product->p_cd }}">{{ $product->name }}</a>
                                                                                </h2>
                                                                                <div class="productOption">
                                                                                    <span style="float:left;">

                                                                                        @foreach ($colours as $colour)
                                                                                            @if ($colour->c_id == $product->color_id)
                                                                                                <div class="toolbox">
                                                                                                    <span
                                                                                                        class="colorcircle"
                                                                                                        style="background-color:#{{ $product->color }};margin-right:10px"></span>
                                                                                                    <span
                                                                                                        class="tooltiptext">{{ $colour->c_nm }}</span>

                                                                                                </div>
                                                                                            @endif
                                                                                        @endforeach
                                                                                    </span>
                                                                                </div>
                                                                            </div>
                                                                            <div class="priceBox">
                                                                                <span>
                                                                                    {{ convert_currency($product->price) }}
                                                                                </span>

                                                                            </div>

                                                                            <div class="productInfo">
                                                                                <p>Quantity - <span
                                                                                        class="value">{{ $product->quantity }}</span>
                                                                                </p>
                                                                                <p>Unit Dimensions <span
                                                                                        class="value">{{ $product->width }}
                                                                                        X {{ $product->length }}
                                                                                        {{ $product->unit }}</span></p>
                                                                                <p>Lining Type - <span
                                                                                        class="value">{{ $product->lining_type }}</span>
                                                                                </p>
                                                                                <p>Hardware Type - <span
                                                                                        class="value">{{ $product->hardware_type }}</span>
                                                                                </p>
                                                                                @if ($product->hardware_type == 'Motorized')
                                                                                    <p>Power Type - <span
                                                                                            class="value">{{ $product->power_type }}</span>
                                                                                    </p>
                                                                                    <p>Control Type - <span
                                                                                            class="value">{{ $product->control_type }}</span>
                                                                                    </p>
                                                                                @endif
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    @empty
                                                        <li>
                                                            <h5>Add Products</h5>
                                                        </li>
                                                    @endforelse
                                                </ul>
                                            </div>
                                        </li>
                                    @endforeach
                                    <li class="flex-box add">
                                        <div class="toggleHandler {{ $selected_room === null ? 'active' : '' }}"
                                            wire:click="$set('selected_room',null)">
                                            <span class="lable">Add Room</span> <span class="angle">
                                                <svg id="Layer_1" style="enable-background:new 0 0 50 50;"
                                                    version="1.1" viewBox="0 0 50 50" xml:space="preserve"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink">
                                                    <g id="Layer_1_1_">
                                                        <polygon
                                                            points="48.707,13.853 47.293,12.44 25,34.732 2.707,12.44 1.293,13.853 25,37.56  " />
                                                    </g>
                                                </svg>
                                            </span>
                                        </div>
                                        <div class="toggleContent"
                                            style="display: {{ $selected_room === null ? 'block' : 'none' }}">
                                            <input type="text" wire:model="room_name">
                                            <button class="button button-outline"
                                                wire:click="createRoom({{ $project->id }})">Add</button>
                                        </div>

                                    </li>
                                </ul>
                                {{-- <a class="generete" href="{{\URL::signedRoute('designer.project-board',['project'=>encrypt($project->id)])}}">Generate Board </a> --}}
                                <button class="generete" wire:click="generateBoard({{ $project }})">Generate
                                    Board </button>
                            </div>

                        </li>
                    @endforeach
                </ul>
                <div class="flex-box">
                    <h3 style="color: #333">ADD PROJECT</h3>
                    <input type="text" wire:model="project_name">
                    <button class="button button-outline" wire:click="addProject">Add</button>
                </div>
            </div>
        </div>
    </div>
</div>
@section('script')
    <script>
        var clearButton = document.getElementById('clear-button');
        clearButton.addEventListener('click', resetForm);

        function resetForm(event) {
            event.preventDefault()
            window.location.search = "";
        }
    </script>
@endsection
