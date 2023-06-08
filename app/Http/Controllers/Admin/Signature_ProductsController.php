<?php

namespace App\Http\Controllers\Admin;

use App\Models\Signature_Products;
use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Signature_ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $signature_products = Signature_Products::where('id',1)->first();
        $products = Product::all();
       
        return view('admin.signature_products.index', compact('signature_products','products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $signature_products = Signature_Products::where('id',1)->first();
        $requestItems = $request->except('_token');
        $products = [];
        foreach ($requestItems as $item) {
            
            array_push($products, $item); 
        }
        $signature_products->products = $products;
        $signature_products->save();

        return redirect()->route('admin.signature_products.index')->with('success','products updated successfully');
    }

    public function test(Request $request)
    {
      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
