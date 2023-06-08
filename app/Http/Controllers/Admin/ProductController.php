<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Colour;
use App\Models\ProductDetail;
use App\Models\ProductDetailFabric;
use App\Models\Shortlist;
use App\Models\ProjectRoomProduct;
use App\Imports\ImportExcel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
  //     $products = Product::latest()->join('product_detail', 'product_detail.p_id', '=', 'product.p_id')
  //     ->when(request('p_cd'), function ($query) {
  //     return $query->whereHas('category',function($q){
  //         $q->where('cat_id', request('category'));
  //     })->orWhere('p_cd','like','%'. request('p_cd') . '%')->orWhere('pd_nm','like','%'. request('p_cd') . '%');
  // })->paginate(10)->appends(request()->all());

      $products = Product::latest()->join('product_detail', 'product_detail.p_id', '=', 'product.p_id')->join('category', 'category.cat_id', '=', 'product.cat_id')
        ->when(request('p_cd'), function ($query) {
            return $query->where('p_cd','like','%'. request('p_cd') . '%')->orWhere('pd_nm','like','%'. request('p_cd') . '%');
        })->when(request('category'), function ($query) {
            return $query->where('category.cat_id', request('category'))->orWhere('parent_id', request('category'));
        })->paginate(10)->appends(request()->all());

      $shortlist_categories = Category::findMany([1, 10, 17])->pluck('cat_nm','cat_id');

      $categories = Category::pluck('cat_nm','cat_id')->toArray();
      //$categories = Category::select('cat_id', 'cat_nm')->get()->toArray();
      //dd($categories);

       return view('admin.product.index',compact('products','shortlist_categories','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $categories = Category::pluck('cat_nm','cat_id');
      $colors = Colour::all();
      return view('admin.product.add_product',compact('categories','colors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       /* handled by live wire controller */
       
        return redirect()->route('admin.product.index')->with('success','product added successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::pluck('cat_nm','cat_id');
        $colors = Colour::all();

      //load the values of the product form excel files
      $calcfile = select_calc_file($product->cat_id);
      if($calcfile == 'simple' || $calcfile=="blinds" || $calcfile=="sandwichpanels")
      {
          // Read the spreadsheet file.
          $spreadsheet = IOFactory::load(storage_path('app/'.\Str::title($calcfile).'.xlsx'));
          $sheet = $spreadsheet->getActiveSheet();
          
          //find the row number to be loded
          $product_exists = null;
          if (isset($product->p_cd)){
          for ($x = 0; $x <= $sheet->getHighestDataRow(); $x++){
              if($sheet->getCell('B'.$x)->getValue() == $product->p_cd){
                  $product_exists= $x;
                  }
              }
          }else{return view('admin.product.edit',compact('product','categories','colors'));}
          
          if($product_exists){
              $row = $product_exists;
          }else{
              return view('admin.product.edit',compact('product','categories','colors'));
          }
          $variants = array();

          if($calcfile == 'simple'){
          //fetch variants form simple sheet
          $cells = ['C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','AA','AB','AC','AD','AE','AF'];
          for($cell=0;$cell<=29;$cell+=2)
            {
            $cellName = $sheet->getCell($cells[$cell].$row)->getValue();
            $cellValue = $sheet->getCell($cells[$cell+1].$row)->getValue();
            if(! isset($cellName)){
              break;  
            }else{
              $variants[$cellName] = $cellValue;
            }
            }
          }elseif($calcfile=="blinds")
          {
          //fetch variants form blinds sheet
          $cells = ['C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','AA','AB','AC','AD','AE','AF','AG','AH','AI','AJ','AK','AL','AM','AN','AO','AP','AQ','AR','AS','AT','AU'];
          $variantCounter=1;
          for($cell=0;$cell<=sizeof($cells);$cell+=3)
          {

            $cellName = $sheet->getCell($cells[$cell].$row)->getValue();
            $cellValue = $sheet->getCell($cells[$cell+1].$row)->getValue();
            $cellValue2 = $sheet->getCell($cells[$cell+2].$row)->getValue();

            if(! isset($cellName)){
              break;  
            }else{
              $variants["blind_type_".$variantCounter] = $cellName;
              $variants["manual_sqft_".$variantCounter] = $cellValue;
              $variants["motorised_sqft_".$variantCounter] = $cellValue2;
              $variantCounter++;
            }
          }
        }elseif($calcfile=="sandwichpanels"){
          //fetch variants form sandwich sheet
          $cells = ['C','D'];
          $variants["base_sqft"] = $sheet->getCell('C'.$row)->getValue();
          $variants["installation"] = $sheet->getCell('D'.$row)->getValue();

        }


          if(! $variants){
          return view('admin.product.edit',compact('product','categories','colors'));
          }else{
            return view('admin.product.edit',compact('product','categories','colors','variants'));
          }
          
        }

        




      
        return view('admin.product.edit',compact('product','categories','colors'));
    }


    public function updateFeaturedStatus(Request $request)
    {
      $productId = $request->input('productId');
      $featuredStatus = $request->input('featuredStatus');
      Product::where('p_id', $productId)->update(array('featured' => $featuredStatus));
      return redirect()->route('admin.product.index')->with('success','Featured status changed successfully.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
      /* handled by live wire controller */
      return redirect()->route('admin.product.index')->with('success','product added successfully.');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {

      //delete from shortlist table
        $shortlist = Shortlist::where('product_id',$product->p_id)->get();
        foreach($shortlist as $item ){
          $item->delete();
        }

        //delete from project_room_products table
        $roomProducts = ProjectRoomProduct::where('product_id',$product->p_id)->get();
        foreach($roomProducts as $roomItem ){
          $roomItem->delete();
        }
       
        //delete from products table
        $product->detail->delete();
        $product->delete();
        return redirect()->route('admin.product.index')->with('success','product deleted successfully.');
    }
}
