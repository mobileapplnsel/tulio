{!! Form::model($product,['files'=>true,'wire:submit.prevent'=>'submit']) !!}
<div class="card">
    <div class="card-header">
        <h4>Product</h4>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="category">Category</label>
                     {!!Form::select('cat_id',$categories,null,
                     ["placeholder"=>"Select Category","class"=>"form-control", "id"=>"category",
                     'wire:model'=>'form.cat_id','wire:change'=>'categoryChanged']) !!}
                    @error('form.cat_id')
                    <strong class="text-danger">{{ $message }}</strong>
                    @enderror
            </div>
        </div>   
        <span style="font-size:12px"> (Choose Sub-Category if available)</span>
    </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="productCode">Product code</label>
                    {!! Form::text('product_code',null, 
                    ["placeholder"=>"Enter product code","class"=>"form-control", "id"=>"productCode",
                    'wire:model.defer'=>'form.p_cd']) !!}
                    @error('form.p_cd')
                    <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                </div>
                <span style="font-size:12px"> (Should be a unique code)</span>
            </div>
              
    </div>
</div>
<div class="card">
    <div class="card-header">
        <h4>Colors</h4>
    </div>
    <div class="card-body">
        <div class="row">
            @foreach ($colors as $color)
            <div class="col-sm-2" style="margin-bottom: 8px;">
                <input type="checkbox" wire:model="selected_colors" value="{{$color->c_id}}">
                <span style="padding: 3px 10px;background-color: #{{$color->c_no}};
                border-radius: 30px;"></span> {{$color->c_nm}}
            </div>
            @endforeach
            @error('selected_colors')
            <strong class="text-danger">{{ $message }}</strong>
            @enderror
        </div>
    </div>
</div>
<div class="card">
    <div class="card-header">
        <h4>Images</h4>
        <span style="font-size:12px"> (Should be a jpg file resolution: 2250 x 3000 px)</span>
    </div>
    <div class="card-body">        
        @forelse ($selected_colors as $value)
        <div class="row my-2 border">
            <div class="col-sm-4">
                <input type="file" id="closeup-{{$value}}" wire:model="form.images.{{$value}}.closeup">
                <label for="closeup-{{$value}}">{{$colors->where('c_id',$value)->first()->c_nm}} - Close Up</label>
                <div wire:loading wire:target="form.images.{{$value}}.closeup">Uploading...</div>                
                @isset($form['images'][$value]['closeup'])
                <img src="{{ $form['images'][$value]['closeup']->temporaryUrl() }}" width="150">                    
                @endisset
                @if ($product&&!isset($form['images'][$value]['closeup']))
                   <img src="{{$product->setColor($value)->closeup_image_thumb}}" alt="" width="150"> 
                @endif
                @error('form.images.'.$value.'.closeup')
                <br/>
                <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
            <div class="col-sm-4">
                <input type="file" id="angle-{{$value}}" wire:model="form.images.{{$value}}.angle">
                <label for="angle-{{$value}}">{{$colors->where('c_id',$value)->first()->c_nm}} - Angle</label>
                <div wire:loading wire:target="form.images.{{$value}}.angle">Uploading...</div>
                @isset($form['images'][$value]['angle'])
                <img src="{{ $form['images'][$value]['angle']->temporaryUrl() }}" width="150">                    
                @endisset
               @if ($product&&!isset($form['images'][$value]['angle']))
                   <img src="{{$product->setColor($value)->angle_image_thumb}}" alt="" width="150"> 
                @endif
                @error('form.images.'.$value.'.angle')
                <br/>
                <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
            <div class="col-sm-4">
                <input type="file" id="front-{{$value}}" wire:model="form.images.{{$value}}.front">
                <label for="front-{{$value}}">{{$colors->where('c_id',$value)->first()->c_nm}} - Front</label>
                <div wire:loading wire:target="form.images.{{$value}}.front">Uploading...</div>
                @isset($form['images'][$value]['front'])
                <img src="{{ $form['images'][$value]['front']->temporaryUrl() }}" width="150">                    
                @endisset
                @if ($product&&!isset($form['images'][$value]['front']))
                   <img src="{{$product->setColor($value)->front_image_thumb}}" alt="" width="150"> 
                @endif
                @error('form.images.'.$value.'.front')
                <br/>
                <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
        </div>
        @empty
        <div class="row">
            <h5>Select Any Color</h5>
        </div>
        @endforelse
        @error('form.images')
        <strong class="text-danger">{{ $message }}</strong>
        @enderror            
    </div>
</div>
<div class="card">
    <div class="card-header">
        <h4>Product Details</h4>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-sm-3">
                <div class="form-group">
                    <label for="productname">Product Name</label>
                     {!! Form::text('product_name',null, 
                     ["placeholder"=>"Enter product name","class"=>"form-control", "id"=>"productname",
                     'wire:model.defer'=>'form.detail.pd_nm']) !!}
                        @error('form.detail.pd_nm')
                        <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                  </div>
                  <span style="font-size:12px"> (Displayed to end user)</span>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label for="productsc">Product Type</label>
                     {!! Form::select('product_sc',['Solid' => 'Solid', 'Sheer' => 'Sheer'], null, 
                     ["placeholder"=>"Select  product type","class"=>"form-control", "id"=>"productsc",
                     'wire:model.defer'=>'form.detail.pd_sc']) !!}
                        @error('form.detail.pd_sc')
                        <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                  </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label for="productTq">Product Technique</label>
                    <span style="font-size:12px"> (press ctrl. button for multiple select)</span>
                    <select wire:model.defer="form.detail.pd_tq"  multiple class="form-control" name="technique[]" id="productTq">
                    @foreach($techniques as $technique)
                    <tr>
                        <option value="{{$technique->name}}">{{$technique->name}}</option>
                    </tr>
                    @endforeach
                    </select>
                    @error('technique')
                    <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label for="productAm">Product Ambience</label>
                    <span style="font-size:12px"> (press ctrl. button for multiple select)</span>
                    <select wire:model.defer="form.detail.pd_am"  multiple class="form-control" name="ambience[]" id="productAm">
                        @foreach($ambiences as $ambience)
                        <tr>
                            <option value="{{$ambience->name}}">{{$ambience->name}}</option>
                        </tr>
                        @endforeach
                        </select>
                        @error('form.detail.pd_am')
                        <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3">
                <div class="form-group">
                   <label for="productde">Product Design</label>
                   <span style="font-size:12px"> (press ctrl. button for multiple select)</span>
                   <select wire:model.defer="form.detail.pd_de"  multiple class="form-control" name="design[]" id="productde">
                    @foreach($designs as $design)
                    <tr>
                        <option value="{{$design->name}}">{{$design->name}}</option>
                    </tr>
                    @endforeach
                    </select>
                       @error('form.detail.pd_de')
                       <strong class="text-danger">{{ $message }}</strong>
                       @enderror
               </div>
           </div>           
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="productdes">Product Description</label>
                        {!! Form::textarea('product_desc',null, ["placeholder"=>"Enter product description","class"=>"form-control", 
                            "id"=>"productdes",'rows'=>'3','wire:model.defer'=>'form.detail.pd_ds']) !!}
                        @error('form.detail.pd_ds')
                        <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    <span style="font-size:12px"> (max 255 characters)</span>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="product_ts">Product short Description</label>
                     {!! Form::textarea('product_ts', null, ["placeholder"=>"Enter product short description","class"=>"form-control", 
                        "id"=>"productTs",'rows'=>'3','wire:model.defer'=>'form.detail.pd_ts']) !!}
                        @error('form.detail.pd_ts')
                        <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                  </div>
            </div>
            <span style="font-size:12px"> (max 255 characters)</span>
        </div>
        

        @if (isset($categoryid))
                @if (select_calc($categoryid) == 'simple')

                <div class="row">
                    <div class="card-header">
                        <h4>Price Calculator details</h4>
                    </div>
                    <div class="card-body"> 

                    <div class="card-header">
                        <h4>Variations</h4>
                        <button type="button" wire:click="addVariant" class="btn btn-primary">Add Variant</button>
                        <span style="font-size:12px"> (First Variant will be selected by default)</span>
                        
                    </div>

                    @for ($i = 1; $i <= $variantCounter; $i++)
                    
                    <div class="row">
                        
                        <div class="col-sm-6">
                            <h5>Variant {{$i}}</h5>
                            <div class="form-group">
                                
                                {!! Form::text("variant_name_"."$i",null, 
                                ["placeholder"=>"Name","class"=>"form-control","required", "id"=>"variant_name_"."$i",
                                'wire:model.defer'=>"form."."variant_name_"."$i"
                                ]) !!}
                                @error('text')
                                <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>
                        </div>

                        
                        <div class="col-sm-6">
                            <h5 for="productCode">Variant {{$i}} Value </h5>
                            <div class="form-group">
                                
                                {!! Form::number("variant_value_"."$i",null, 
                                ["placeholder"=>"Value","class"=>"form-control","required",'step' => 'any',  "id"=>"form."."variant_value_"."$i",
                                'wire:model.defer'=>"form."."variant_value_"."$i"
                                ]) !!}
                                @error('number')
                                <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>
                        </div>

                    </div>
                    @if($i!=1)
                    <button type="button" wire:click="deleteVariant({{$i}})" class="btn btn-danger">Delete</button>
                    @endif

                    @endfor
                   
                </div>
            </div>
            
        @endif


        @if (select_calc($categoryid) == 'curtain')

        @endif



        @if (select_calc($categoryid) == 'blinds')

        <div class="row">
            <div class="card-header">
                <h4>Price Calculator details</h4>
            </div>
        </div>

    <div class="row">
        <div class="card-header">
            <h4>Blind Types</h4>
            <button type="button" wire:click="addVariant" class="btn btn-primary">Add Type</button>
            <span style="font-size:12px"> (First Type will be selected as base type in calculator)</span>
            
        </div>

        @for ($i = 1; $i <= $variantCounter; $i++)
        
        <div class="row">
            
            <div class="col-sm-6">
                <h5>Type {{$i}} Name</h5>
                <div class="form-group">
                    
                    {!! Form::text("type_name_"."$i",null, 
                    ["placeholder"=>"Name","class"=>"form-control","required", "id"=>"type_name_"."$i",
                    'wire:model.defer'=>"form."."type_name_"."$i"
                    ]) !!}
                    @error('text')
                    <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                </div>
            </div>
    </div>
    <div class="row">
            
            <div class="col-sm-6">
                <h5 for="productCode">Type {{$i}} Manual price </h5>
                <div class="form-group">
                    
                    {!! Form::number("type_manual_price_"."$i",null, 
                    ["placeholder"=>"Value","class"=>"form-control","required",'step' => 'any',  "id"=>"form."."type_manual_price_"."$i",
                    'wire:model.defer'=>"form."."type_manual_price_"."$i"
                    ]) !!}
                    @error('number')
                    <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                </div>
            </div>

            <div class="col-sm-6">
                <h5 for="productCode">Type {{$i}} Motorised price </h5>
                <div class="form-group">
                    
                    {!! Form::number("type_motorised_price_"."$i",null, 
                    ["placeholder"=>"Value","class"=>"form-control","required",'step' => 'any',  "id"=>"form."."type_motorised_price_"."$i",
                    'wire:model.defer'=>"form."."type_motorised_price_"."$i"
                    ]) !!}
                    @error('number')
                    <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                </div>
            </div>
            @if($i!=1)
            <button type="button" wire:click="deleteVariant({{$i}})" class="btn btn-danger">Delete</button>
            @endif
        </div>
        @endfor

    </div>
    
    
        @endif     
   


       
        @if (select_calc($categoryid) == 'sandwichpanels')

        <div class="row">
            <div class="card-header">
                <h4>Price Calculator details</h4>
            </div>
        </div>
    
        <div class="row">

        <div class="col-sm-3">
            <div class="form-group">
                <label for="base_sqft">Material Price per Sq.ft</label>
                {!! Form::text('base_sqft',null, 
                ["placeholder"=>"Default is 860","class"=>"form-control","required", "id"=>"base_sqft",
                'wire:model.defer'=>'form.base_sqft']) !!}
                @error('number')
                <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
            <span style="font-size:12px"> (base price of marerial in Sq.ft)</span>
        </div>
    
    </div>

        <div class="col-sm-3">
            <div class="form-group">
                <label for="installation">Installation/Transportation Charges</label>
                {!! Form::text('installation',null, 
                ["placeholder"=>"Default is 8000","class"=>"form-control","required", "id"=>"installation",
                'wire:model.defer'=>'form.installation']) !!}
                @error('number')
                <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
            <span style="font-size:12px"> (add 0 if no fixed installation charges)</span>
        </div>
  
    
    
        @endif    












        @endif
        <div class="row">
            <div class="col-sm-11"></div>
            <div class="col-sm-1">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </div>
</div>

{!! Form::close() !!}


