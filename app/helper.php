<?php
use App\Models\Category;

if (!function_exists('check_auth')) {
    function check_auth()
    {
        if(auth()->guard('customer')->check() || auth()->guard('designer')->check()
        || auth()->guard('admin')->check() || auth()->guard('architect')->check()) {
            return true;
        }

        return false;
    }
}

if(!function_exists('loggedin_menu')){
    function loggedin_menu()
    {
    if(auth()->guard('designer')->check() || auth()->guard('architect')->check()){
        return true;
    }

    return false;
    }
}

if(!function_exists('guard_name')){
    function guard_name()
    {
        if(auth()->guard('customer')->check()){
            return 'customer';
        }
        if(auth()->guard('designer')->check()){
            return 'designer';
        }
        if(auth()->guard('admin')->check()){
            return 'admin';
        }
        if(auth()->guard('architect')->check()){
            return 'architect';
        }
    }
}


if(!function_exists('convert_currency')){
    function convert_currency($money)
    {   
        if(isset($money)){
            $path = base_path('storage/app/currency.json');
            $currency = json_decode(file_get_contents($path), true);


            if(isset($_COOKIE["Currency"]) && $money!="NA" && isset($currency[$_COOKIE["Currency"]])){

                return $_COOKIE["Currency"]." ".round($money * $currency[$_COOKIE["Currency"]]);

            }else{return "INR ".$money;}
         
        }else{
            return "NA";
        }
    }
}


if(!function_exists('select_calc')){
    function select_calc($category_id)
    {   
        
        if ($category_id=="1" || $category_id=="19" || $category_id=="20" || $category_id=="21" || $category_id=="22" ) {
            
            return "curtain";
        }
        
        else if ( $category_id=="10" || $category_id=="23"|| $category_id=="24" || $category_id=="25" || $category_id=="26" ||
        $category_id=="27" || $category_id=="28" || $category_id=="29" || $category_id=="30" || $category_id=="31") {
            
            return 'blinds';
       
        }
        
        else if ($category_id=="11" || $category_id=="32" || $category_id=="33") {
      
            return 'curtainpanels';
       
        }else if ($category_id=="12" || $category_id=="34" || $category_id=="35") {
       
         return 'sandwichpanels';
    
     }
 
        else{
            

            // check if the selected category has a parent id if so return parants calculator
           $parent_collection = Category::select('parent_id')->where('cat_id', $category_id)->get();
           
           if($parent_collection->first()){
           $parent_id = $parent_collection->first()->parent_id;
            }else{$parent_id=0;}
           
            if($parent_id !== 0 ){
                
                return select_calc($parent_id);
               

            }else{
                
                // new and unknown categories will show simple category
                return "simple";
            }
        }
        
    }
}

if(!function_exists('select_calc_file')){
    function select_calc_file($category_id)
    {
       
        // get the name of category
       $categoryname = Category::where("cat_id", $category_id)->get("cat_nm")->first()->cat_nm;
        
        if ($category_id=="1" || $category_id=="19" || $category_id=="20" ) {
           
            return 'curtains';
        }
        else  if ($category_id=="21" || $category_id=="22"  ) {
            
            return 'romanblinds';
       
        }
        else  if ($category_id=="10" || $category_id=="23"|| $category_id=="24" || $category_id=="25" || $category_id=="26" ||
         $category_id=="27" || $category_id=="28" || $category_id=="29" || $category_id=="30" || $category_id=="31") {
           
            return 'blinds';
       
        }else if ($category_id=="11" || $category_id=="32" || $category_id=="33") {
      
           return 'curtainpanels';
      
       }else if ($category_id=="12" || $category_id=="34" || $category_id=="35") {
      
        return 'sandwichpanels';
   
    }
        else{

            // check if the selected category has a parent id if so return parants calculator
           $parent_collection = Category::select('parent_id')->where('cat_id', $category_id)->get();
           $parent_id = $parent_collection->first()->parent_id;
            if($parent_id){
              return select_calc_file($parent_id);

            }else{
                // new and unknown categories will show simple category
                return "simple";
            }
        }
            
          }
    }
