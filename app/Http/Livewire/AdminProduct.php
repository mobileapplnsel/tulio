<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Colour;
use App\Models\Product;
use App\Traits\CalculatePrice;
use Illuminate\Support\Facades\Artisan;
use Livewire\Component;
use Livewire\WithFileUploads;

use App\Imports\ImportExcel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;
use App\Models\Technique;
use App\Models\Ambience;
use App\Models\Design;



class AdminProduct extends Component
{
    use WithFileUploads,CalculatePrice;

    public $product,$variants,$categories,$colors,$selected_colors=[],$form=[],$sub_categories,$categoryid,$variantCounter=1,$techniques,$ambiences,$designs;

    public function mount($product=null,$variants=null)
    {
        if($product){
            $this->product = $product->load('detail.fabric');
            $this->form = $product->toArray();
            $this->selected_colors = $product->colours->pluck('c_id')->toArray();
        }else{
            $this->form = ['detail'=>['fabric'=>[]]];
            $this->selected_colors = [];
        }

        $this->categories = Category::pluck('cat_nm','cat_id')->toArray();
        $this->sub_categories = Category::where('parent_id','cat_nm')->value('cat_id');

        
        $this->colors = Colour::all();
        $this->techniques = Technique::all();
        $this->ambiences = Ambience::all();
        $this->designs = Design::all();

        if($variants){
            $counter=0;
            $calctype = select_calc($this->form["cat_id"]);
            
            if($calctype=="simple"){
                foreach($variants as $key => $variant){
                    $counter++;
                    $this->form["variant_name_".$counter]=$key;
                    $this->form["variant_value_".$counter] = $variant;
                }
                $this->variantCounter = $counter;
        }
            elseif($calctype=="blinds"){

                $this->variantCounter = sizeof($variants)/3;
                $counter=1;
                $i=0;
                $j=0;
                foreach($variants as $key => $variant){
                    $counter = $i%3;
                    if($counter==0){
                        $j++;
                        $this->form["type_name_".$j]= $variant;
                    }elseif($counter==1){
                     
                        $this->form["type_manual_price_".$j] = $variant;       
                    }elseif($counter==2){
                        $this->form["type_motorised_price_".$j] = $variant;
                    }
                        $i++;
                       
                    
                }
            }

            elseif( $calctype == "sandwichpanels"){   
                
                $this->form["base_sqft"] = $variants["base_sqft"];
                $this->form["installation"] = $variants["installation"];
    
            } 
           

            
            
            
            
        }


        
    }

    public function submit()
    {
       
        $this->validate([
            'form.cat_id' => 'required|string',
            'form.detail.pd_sc' => 'required|string',
            'form.detail.pd_nm' => 'required|string',
            'form.detail.pd_ds' => 'required|string',
            'form.detail.pd_ts' => 'required|string',
            'form.detail.pd_tq' => 'required|array',
            'form.detail.pd_am' => 'required|array',
            'form.detail.pd_de' => 'required|array',
            'selected_colors' => 'required|array',
            'form.images' => ($this->product?'nullable':'required').'|array',
            'form.images.*.front' => '|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'form.images.*.angle' => '|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'form.images.*.closeup' => ($this->product?'nullable':'required').'|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ],[],[
            'form.cat_id' => 'Category',
            'form.detail.pd_sc' => 'Short Code',
            'form.detail.pd_nm' => 'Name',
            'form.detail.pd_ds' => 'Description',
            'form.detail.pd_ts' => 'Short Description',
            'form.detail.pd_tq' => 'Technique',
            'form.detail.pd_am' => 'Ambience',
            'form.detail.pd_de' => 'Design',
            'form.images'=>'Images',
            'form.images.*.front' => 'Front Image',
            'form.images.*.angle' => 'Angle Image',
            'form.images.*.closeup' => 'Closeup Image',
        ]);

        if($this->product){
            $this->product->update($this->form);
            $this->product->detail->update($this->form['detail']);
        }
        
        else{
            $this->validate([
                'form.p_cd' => 'required|unique:product,p_cd|string|max:50',
                  ],[],[
                'form.p_cd' => 'Product Code',
                ]);
            $this->product = Product::create($this->form);
            $this->product->detail()->create($this->form['detail']);
        }

        foreach($this->form['images']??[] as $color=>$image){
            if(isset($image['closeup'])&&$image['closeup']){
                $this->product->images()->updateOrCreate(
                ['color'=>$color,'type'=>'closeup'],
                [
                    'color'=>$color,
                    'type'=>'closeup',
                    'image'=>$image['closeup']->store('products','live-wire'),
                ]);
            }
            if(isset($image['angle'])&&$image['angle']){
                $this->product->images()->updateOrCreate(
                ['color'=>$color,'type'=>'angle'],
                [
                    'color'=>$color,
                    'type'=>'angle',
                    'image'=>$image['angle']->store('products','live-wire'),
                ]);
            }
            if(isset($image['front'])&&$image['front']){
                $this->product->images()->updateOrCreate(
                ['color'=>$color,'type'=>'front'],
                [
                    'color'=>$color,
                    'type'=>'front',
                    'image'=>$image['front']->store('products','live-wire'),
                ]);
            }
        }

        $this->product->detail->colours()->delete();
        $colors = array_map(function($c){return ['c_id'=>$c,'pdc_nm'=>''];},$this->selected_colors);
        $this->product->detail->colours()->createMany($colors);
        Artisan::call('product:price_cache '.$this->product->p_id);
        
        $calcfile = select_calc_file($this->form["cat_id"]);
        $calctype = select_calc($this->form["cat_id"]);

        $this->storeInFile($this->form["cat_id"]);



        //set value in product table 

        if($calctype =="simple"){

         $this->form['detail']['pd_pr'] = $this->form["variant_value_1"];
         $this->product->detail->update($this->form['detail']);
        
        }else if($calcfile == "sandwichpanels"){

        $this->form['detail']['pd_pr'] = (100 * $this->form["base_sqft"]) + $this->form["installation"];
        $this->product->detail->update($this->form['detail']);
        }
        else if($calcfile == "blinds"){
        
        $this->form['detail']['pd_pr'] = (100 * $this->form["type_manual_price_1"]);
        $this->product->detail->update($this->form['detail']);
        }
        

        return redirect()->route('admin.product.index')->with('success','Product Updated Successfully');
    }

    public function storeInFile($catid) {


        $calcfile = select_calc_file($catid);
        $calctype = select_calc($catid);


                /* Store product details in price calculator file */
                if($calcfile == "simple"){
                    // Read the spreadsheet file.
                    $spreadsheet = IOFactory::load(storage_path('app/'.\Str::title($calcfile).'.xlsx'));
            
                    $sheet = $spreadsheet->getActiveSheet();
            
                    //Check if we need to add a new row or edit existing row
                    $should_edit = null;
                    if (isset($this->form["p_cd"])){
                    for ($x = 0; $x <= $sheet->getHighestDataRow(); $x++){
                        if($sheet->getCell('B'.$x)->getValue() == $this->form["p_cd"]){
                            $should_edit= $x;
                            }
                        }
                    }
                    if($should_edit){
                        $row = $should_edit;
                    }else{
                        $row = $sheet->getHighestDataRow() + 1;
                    }
            
                    /* set S. no */
                    $sheet->getCell('A'.$row)->setValue($row - 1 );
            
                    /* set Product code */
                    $sheet->getCell('B'.$row)->setValue($this->form["p_cd"]);
                    
                    /* clean all variants */
                    for ($i = 3; $i <= 30; $i++){
                        $sheet->setCellValueByColumnAndRow($i,$row,'');
            
                    }

                    $collnumber = 3;
                    for ($i = 1; $i <= $this->variantCounter; $i++){
            
                    
                        $sheet->setCellValueByColumnAndRow($collnumber,$row,$this->form["variant_name_".$i]);
                        $sheet->setCellValueByColumnAndRow($collnumber + 1,$row,$this->form["variant_value_".$i]);
                        $collnumber = $collnumber + 2;
                    }
            
                    $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
                    $writer->save(storage_path('app/'.\Str::title($calcfile).'.xlsx'));
                    }



                    /* Sandwich Calculator */
                if($calcfile == "sandwichpanels"){
                    // Read the spreadsheet file.
                    $spreadsheet = IOFactory::load(storage_path('app/'.\Str::title($calcfile).'.xlsx'));
                    $sheet = $spreadsheet->getActiveSheet();
                    //Check if we need to add a new row or edit existing row
                    $should_edit = null;
                    if (isset($this->form["p_cd"])){
                    for ($x = 0; $x <= $sheet->getHighestDataRow(); $x++){
                        if($sheet->getCell('B'.$x)->getValue() == $this->form["p_cd"]){
                            $should_edit= $x;
                            }
                        }
                    }
                    if($should_edit){
                        $row = $should_edit;
                    }else{
                        $row = $sheet->getHighestDataRow() + 1;
                    }
            
                    /* set S. no */
                    $sheet->getCell('A'.$row)->setValue($row - 1 );
            
                    /* set Product code */
                    $sheet->getCell('B'.$row)->setValue($this->form["p_cd"]);
                    
                    $sheet->setCellValueByColumnAndRow(3,$row,'');
                    $sheet->setCellValueByColumnAndRow(4,$row,'');

                    /* set base sqft price */
                    $sheet->getCell('C'.$row)->setValue($this->form["base_sqft"]);

                    /* set installation price */
                    $sheet->getCell('D'.$row)->setValue($this->form["installation"]);

            
                    $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
                    $writer->save(storage_path('app/'.\Str::title($calcfile).'.xlsx'));
                    }


                    /* Blinds Calculator */
                if($calcfile == "blinds"){
                    // Read the spreadsheet file.
                    $spreadsheet = IOFactory::load(storage_path('app/'.\Str::title($calcfile).'.xlsx'));
                    $sheet = $spreadsheet->getActiveSheet();
                    //Check if we need to add a new row or edit existing row
                    $should_edit = null;
                    if (isset($this->form["p_cd"])){
                    for ($x = 0; $x <= $sheet->getHighestDataRow(); $x++){
                        if($sheet->getCell('B'.$x)->getValue() == $this->form["p_cd"]){
                            $should_edit= $x;
                            }
                        }
                    }
                    if($should_edit){
                        $row = $should_edit;
                    }else{
                        $row = $sheet->getHighestDataRow() + 1;
                    }
            
                    /* set S. no */
                    $sheet->getCell('A'.$row)->setValue($row - 1 );
            
                    /* set Product code */
                    $sheet->getCell('B'.$row)->setValue($this->form["p_cd"]);
                    
                    /* clean all variants */
                    for ($i = 3; $i <= 45; $i++){
                        $sheet->setCellValueByColumnAndRow($i,$row,'');
            
                    }
                    /* add types in sheet */
                    $collnumber = 3;
                    for ($i = 1; $i <= $this->variantCounter; $i++){
            
                        
                        $sheet->setCellValueByColumnAndRow($collnumber,$row,$this->form["type_name_".$i]);
                        $sheet->setCellValueByColumnAndRow($collnumber + 1,$row,$this->form["type_manual_price_".$i]);
                        $sheet->setCellValueByColumnAndRow($collnumber + 2,$row,$this->form["type_motorised_price_".$i]);
                        $collnumber = $collnumber + 3;
                    }
            
                    $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
                    $writer->save(storage_path('app/'.\Str::title($calcfile).'.xlsx'));

                }

    }


    public function categoryChanged(){
        /* update the below variable to load right calculator input values*/
        $this->categoryid = $this->form["cat_id"];
    }

    public function addVariant(){
        
        $this->variantCounter++; 

    }

    public function deleteVariant($id){
      


        

        $calctype = select_calc($this->form["cat_id"]);
        
        if( $calctype == "simple"){

        $this->form["variant_name_".$id] = "";
        $this->form["variant_value_".$id] = "";

        for($i=$id;$i<$this->variantCounter;$i++){
            $nextindex =$i+1;
            if(isset($this->form["variant_value_".$nextindex])){
            $this->form["variant_value_".$i] = $this->form["variant_value_".$nextindex];
            }
            if(isset($this->form["variant_name_".$nextindex])){
            $this->form["variant_name_".$i] = $this->form["variant_name_".$nextindex];
            }  
        }
        
        $this->form["variant_value_".$this->variantCounter] = "";
        $this->form["variant_name_".$this->variantCounter] = "";
        $this->variantCounter--; 
       
        }


        if( $calctype == "blinds"){

            $this->form["type_name_".$id] = "";
            $this->form["type_manual_price_".$id] = "";
            $this->form["type_motorised_price_".$id] = "";

            for($i=$id;$i<$this->variantCounter;$i++){
                $nextindex =$id+1;
                // dd($i);
                if(isset($this->form["type_name_".$nextindex])){
                $this->form["type_name_".$i] = $this->form["type_name_".$nextindex];
                }
                if(isset($this->form["type_manual_price_".$nextindex])){
                $this->form["type_manual_price_".$i] = $this->form["type_manual_price_".$nextindex];
                }
                if(isset($this->form["type_motorised_price_".$nextindex])){
                    $this->form["type_motorised_price_".$i] = $this->form["type_motorised_price_".$nextindex];
                    }
    
                $nextindex =$id++;
            }

            $this->form["type_name_".$this->variantCounter] = "";
            $this->form["type_manual_price_".$this->variantCounter] = "";
            $this->form["type_motorised_price_".$this->variantCounter] = "";
            $this->variantCounter--; 
            }

    }


    public function render()
    {
        if(isset($this->form["cat_id"])){
            $this->categoryid = $this->form["cat_id"];  
        }
        
        return view('livewire.admin-product');
    }
}
