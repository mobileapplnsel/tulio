<?php

namespace App\Traits;

use App\Imports\ImportExcel;
use App\Models\AdditionalComponent;
use App\Models\BlindsHardware;
use Maatwebsite\Excel\Facades\Excel;

trait CalculatePrice
{
    public function calculation($product,$config)
    {
       

        $calctype = select_calc($product->category->cat_id);
        $calcfiletype = select_calc_file($product->category->cat_id);

        switch ($calctype) {


            /* Simple CALCULATOR*/
            case "simple":

                try {
                    
                        $sheets = (new ImportExcel(0,0,0,0))->toCollection(storage_path('app/'.\Str::title('simple').'.xlsx'));
                } catch (\Exception $th) {
                    
                    info($th->getMessage());
                    return 'NA';
                }
                /* get first sheet in file */ 
                $sheet = $sheets->first();

                /* find the row number of the required product in sheet */
                $row_number = $sheet->search(function ($item) use($product) {return $item['code'] == $product->p_cd;});
                
                /* if the row for the product is not found return string NA */
                if($row_number===false)return 'NA';
                


                /* create an import object used to access data */
                $import = new ImportExcel(0,0,0);
                $import->import(storage_path('app/'.\Str::title('simple').'.xlsx'));

                /* get all data  */
                $data = $import->getData();
                
                /* filter data to get the product's row of details */
                $row = $data->where('code',$product->p_cd)->first();
               
                /* fecth price from row and return it */
                return ceil($config['size']*$config['quantity']);
                
              break;



              


              /* sandwichpanels CALCULATOR*/
              case "sandwichpanels":
        [$length,$width,$quantity] = [$config['length'],$config['width'],$config['quantity']];

                try {
                    
                    $sheets = (new ImportExcel(0,0,0,0))->toCollection(storage_path('app/'.\Str::title('sandwichpanels').'.xlsx'));
            } catch (\Exception $th) {
                
                info($th->getMessage());
                return 'NA';
            }
            /* get first sheet in file */ 
            $sheet = $sheets->first();

            /* find the row number of the required product in sheet */
            $row_number = $sheet->search(function ($item) use($product) {return $item['code'] == $product->p_cd;});
            
            /* if the row for the product is not found return string NA */
            if($row_number===false)return 'NA';
            


            /* create an import object used to access data */
            $import = new ImportExcel(0,0,0);
            $import->import(storage_path('app/'.\Str::title('sandwichpanels').'.xlsx'));

            /* get all data  */
            $data = $import->getData();
            
            /* filter data to get the product's row of details */
            $row = $data->where('code',$product->p_cd)->first();
           
            /* caclulate volume */
            $volume = $length*$width;
            
            $pricesqft= $row['price_sqft'];
            
            $totalcost = ($volume*$pricesqft) + $row['installation'];

            return $totalcost * $config['quantity'];
           
                break;


                          /* sandwichpanels CALCULATOR*/
              case "blinds":
        [$height,$width,$quantity] = [$config['length'],$config['width'],$config['quantity']];



                try {
                    
                    $sheets = (new ImportExcel(0,0,0,0))->toCollection(storage_path('app/'.\Str::title('blinds').'.xlsx'));
            } catch (\Exception $th) {
                
                info($th->getMessage());
                return 'NA';
            }
            /* get first sheet in file */ 
            $sheet = $sheets->first();

            /* find the row number of the required product in sheet */
            $row_number = $sheet->search(function ($item) use($product) {return $item['code'] == $product->p_cd;});
            
            /* if the row for the product is not found return string NA */
            if($row_number===false)return 'NA';
            


            /* create an import object used to access data */
            $import = new ImportExcel(0,0,0);
            $import->import(storage_path('app/'.\Str::title('blinds').'.xlsx'));

            /* get all data  */
            $data = $import->getData();
            
            /* filter data to get the product's row of details */
            $row = $data->where('code',$product->p_cd)->first();
            
           
            /* caclulate volume */
            $volume = $height*$width;
            

            

            if($config['hardware_type']=='Motorized'){
                if($config['control_type']=='Remote'){
                    return  (($volume * $row["motorised_sqft_".$config["size"]]) * $quantity) + 24891;
                    
                }else{
                    return  (($volume * $row["motorised_sqft_".$config["size"]]) * $quantity) + 12738;
                }


            }else{
            return  ($volume * $row["manual_sqft_".$config["size"]]) * $quantity;
            }
           
                break;














        /* curtainpanel CALCULATOR*/
              case "curtainpanels":


        /* Declare user input variables */
        [$width,$height,$quantity] = [$config['width'],$config['length'],$config['quantity']];

        /* convert user input values to inch if entered in cm */
        if($config['unit']=='cm'){
            $width = ceil($width/2.54);
            $height = ceil($height/2.54);
        }

        /* check if the user has selected single or pair option in calc*/
        $pair=$config['quantity_type']=='Pair'?2:1;


        if (cache('price-'.md5($product->p_cd.$width.$height.$pair))) {
            
            /* encrypt the the user inputs */
            $row = cache('price-'.md5($product->p_cd.$width.$height.$pair));
        } else {

            if(cache('row-number-'.md5($product->p_cd.$product->category->cat_id))){

                $row_number = cache('row-number-'.md5($product->p_cd.$product->category->cat_id));
            }else{
                try {
                    /*open sheet and read the data*/
                    $sheets = (new ImportExcel($width,$height,0,0))->toCollection(storage_path('app/'.\Str::title($calcfiletype).'.xlsx'));
                } catch (\Exception $th) {
                    info($th->getMessage());
                    return 'NA';
                }
                $row_number = $sheets->first()->search(function ($item) use($product) {return $item['code'] == $product->p_cd;});

                if($row_number===false)return 'NA';
                else $row_number = $row_number+2;

                cache(['row-number-'.md5($product->p_cd.$product->category->cat_id)=>$row_number],now()->addDay(30));
            }

            $import = new ImportExcel($width,$height,$pair,$row_number);
            $import->import(storage_path('app/'.\Str::title($calcfiletype).'.xlsx'));
            $sheets = $import->getData();
            $row = $sheets->where('code',$product->p_cd)->first();
            cache(['price-'.md5($product->p_cd.$width.$height.$pair)=>$row],now()->addDay(30));
        }


        if($config['hardware_type']=='Motorized'){
            if($config['control_type']=='Remote'){
                if($config['lining_type']=='Dimout')
                    return ceil($row['total_product_cost_premium_motorised_hardware_with_dimout_lining_with_remote']*$quantity);
                else
                    return ceil($row['total_product_cost_premium_motorised_hardware_with_blackout_lining_with_remote']*$quantity);
            }else{
                if($config['lining_type']=='Dimout')
                    return ceil($row['total_product_cost_premium_motorised_hardware_with_dimout_lining_without_remote']*$quantity);
                else
                    return ceil($row['total_product_cost_premium_motorised_hardware_with_blackout_lining_without_remote']*$quantity);
            }
        }else{
            if($config['lining_type']=='Dimout')
                return ceil($row['total_product_cost_manual_hardware_with_dimout_lining']*$quantity);
            else
                return ceil($row['total_product_cost_manual_hardware_with_blackout_lining']*$quantity);
        }
                
           
                break;        

   













                /* complex CALCULATOR*/
                case "curtain":

                
          
        /* Declare user input variables */
        [$width,$length,$quantity] = [$config['width'],$config['length'],$config['quantity']];

        /* convert user input values to inch if entered in cm */
        if($config['unit']=='cm'){
            $width = ceil($width/2.54);
            $length = ceil($length/2.54);
        }

        /* check if the user has selected single or pair option in calc*/
        $pair=$config['quantity_type']=='Pair'?2:1;


        //get predicted country if available
        $sheetnumber=0;
            
        if(isset($_COOKIE["Country"])) {
            if($_COOKIE["Country"] == "United Arab Emirates"){
                $sheetnumber=1;
            }else if ($_COOKIE["Country"] == "Malta"){
                $sheetnumber=2;
            }else{$sheetnumber=0;}
        }        


        if (cache('price-'.md5($sheetnumber.$product->p_cd.$width.$length.$pair))) {
            /* encrypt the the user inputs */
            $row = cache('price-'.md5($sheetnumber.$product->p_cd.$width.$length.$pair));
        } else {

            if(cache('row-number-'.md5($sheetnumber.$product->p_cd.$product->category->cat_id))){

                $row_number = cache('row-number-'.md5($sheetnumber.$product->p_cd.$product->category->cat_id));
            }else{
                try {
                    /*open sheet and read the data*/
                    $sheets = (new ImportExcel($width,$length,0,0,$sheetnumber))->toCollection(storage_path('app/'.\Str::title($calcfiletype).'.xlsx'));
                } catch (\Exception $th) {
                    info($th->getMessage());
                    return 'NA';
                }
                

                $row_number = $sheets[$sheetnumber]->search(function ($item) use($product) {return $item['code'] == $product->p_cd;});
               

                if($row_number===false)return 'NA';
                else $row_number = $row_number+2;

              cache(['row-number-'.md5($sheetnumber.$product->p_cd.$product->category->cat_id)=>$row_number],now()->addDay(30));
            }
            

            $import = new ImportExcel($width,$length,$pair,$row_number,$sheetnumber);
            $import->import(storage_path('app/'.\Str::title($calcfiletype).'.xlsx'));
            $sheets = $import->getData();
           
            $row = $sheets->where('code',$product->p_cd)->first();
            cache(['price-'.md5($sheetnumber.$product->p_cd.$width.$length.$pair)=>$row],now()->addDay(30));

           

        }

        
        if($config['hardware_type']=='Motorized'){
            if($config['control_type']=='Remote'){
                if($config['lining_type']=='Dimout')
                    return ceil($row['total_product_cost_motorised_hardware_with_dimout_lining_with_remote']*$quantity);
                else
                    return ceil($row['total_product_cost_motorised_hardware_with_blackout_lining_with_remote']*$quantity);
            }else{
                if($config['lining_type']=='Dimout')
                    return ceil($row['total_product_cost_motorised_hardware_with_dimout_lining_without_remote']*$quantity);
                else
                    return ceil($row['total_product_cost_motorised_hardware_with_blackout_lining_without_remote']*$quantity);
            }
        }else if($config['hardware_type']=='No Hardware'){
            if($config['lining_type']=='Dimout'){
            return ceil($row['total_curtain_cost_with_dimout_lining']*$quantity);
            }
            else{
            return ceil($row['total_curtain_cost_with_blackout_lining']*$quantity);
        }

    }
        else{
            if($config['lining_type']=='Dimout')
                return ceil($row['total_product_cost_manual_hardware_with_dimout_lining']*$quantity);
            else{
                
                return ceil($row['total_product_cost_manual_hardware_with_blackout_lining']*$quantity);
                }
        }



                break;


                default:
                return "NA";
        // /* Declare user input variables */
        // [$width,$length,$quantity] = [$config['width'],$config['length'],$config['quantity']];

        // /* convert user input values to inch if entered in cm */
        // if($config['unit']=='cm'){
        //     $width = ceil($width/2.54);
        //     $length = ceil($length/2.54);
        // }

        // /* check if the user has selected single or pair option in calc*/
        // $pair=$config['quantity_type']=='Pair'?2:1;


        // if (cache('price-'.md5($product->p_cd.$width.$length.$pair))) {
            
        //     /* encrypt the the user inputs */
        //     $row = cache('price-'.md5($product->p_cd.$width.$length.$pair));
        // } else {

        //     if(cache('row-number-'.md5($product->p_cd.$product->category->cat_id))){

        //         $row_number = cache('row-number-'.md5($product->p_cd.$product->category->cat_id));
        //     }else{
        //         try {
        //             /*open sheet and read the data*/
        //             $sheets = (new ImportExcel($width,$length,0,0))->toCollection(storage_path('app/'.\Str::title($product->category->cat_nm).'.xlsx'));
        //         } catch (\Exception $th) {
        //             info($th->getMessage());
        //             return 'NA';
        //         }
        //         $row_number = $sheets->first()->search(function ($item) use($product) {return $item['code'] == $product->p_cd;});

        //         if($row_number===false)return 'NA';
        //         else $row_number = $row_number+2;

        //         cache(['row-number-'.md5($product->p_cd.$product->category->cat_id)=>$row_number],now()->addDay(30));
        //     }

        //     try {
        //         /*open sheet and read the data*/
        //         $sheets = (new ImportExcel($width,$length,0,0))->toCollection(storage_path('app/'.\Str::title($product->category->cat_nm).'.xlsx'));
        //     } catch (\Exception $th) {
        //         info($th->getMessage());
        //         return 'NA';
        //     } 
        //     $row = $sheets->where('code',$product->p_cd)->first();
        //    // cache(['price-'.md5($product->p_cd.$width.$length.$pair)=>$row],now()->addDay(30));
        // }


        // if($config['hardware_type']=='Motorized'){
        //     if($config['control_type']=='Remote'){
        //         if($config['lining_type']=='Dimout')
        //             return ceil($row['total_product_cost_premium_motorised_hardware_with_dimout_lining_with_remote']*$quantity);
        //         else
        //             return ceil($row['total_product_cost_premium_motorised_hardware_with_blackout_lining_with_remote']*$quantity);
        //     }else{
        //         if($config['lining_type']=='Dimout')
        //             return ceil($row['total_product_cost_premium_motorised_hardware_with_dimout_lining_without_remote']*$quantity);
        //         else
        //             return ceil($row['total_product_cost_premium_motorised_hardware_with_blackout_lining_without_remote']*$quantity);
        //     }
        // }else{
        //     if($config['lining_type']=='Dimout')
        //         return ceil($row['total_product_cost_manual_hardware_with_dimout_lining']*$quantity);
        //     else
        //         return ceil($row['total_product_cost_manual_hardware_with_blackout_lining']*$quantity);
        // }


          }


    }


    public function GetProductAttributes($product){
        try {
            $calcfile = select_calc_file($product->category->cat_id);
            
            /*open file and read the data*/
            $sheets = (new ImportExcel(0,0,0))->toCollection(storage_path('app/'.\Str::title($calcfile).'.xlsx'));
        } catch (\Exception $th) {
            
            info($th->getMessage());
            return 'NA';
        }
        /* get first sheet in file */ 
        $sheet = $sheets->first();

        /* find the row number of the required product in sheet */
        $row_number = $sheet->search(function ($item) use($product) {return $item['code'] == $product->p_cd;});
        
        /* if the row for the product is not found return string NA */
        if($row_number===false)return 'NA';
        


        /* create an import object used to access data */
        $import = new ImportExcel(0,0,0);
        $import->import(storage_path('app/'.\Str::title($calcfile).'.xlsx'));

        /* get all data  */
        $data = $import->getData();
        
        /* filter data to get the product's row of details */
        return $row = $data->where('code',$product->p_cd)->first();
    }
}
