<?php

namespace App\Http\Controllers\Admin;

use App\Models\Design;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DesignController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
       
       $designs = Design::all();
       return view('admin.design.index', compact('designs'));
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
 // create function
public function create()
{
   return  view ('admin.design.create');
}


   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
  // store function
public function store(Request $request)
{
   $this->validate($request, array(
       'name'=>'required|max:225',

       
     ));
     $design = new Design;
     $design->name = $request->input('name');
     $design->save();
     return redirect()->route('admin.design.index');
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
 $design = Design::findOrFail($id);
 return view('admin.design.edit', compact('design'));
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
     $design = Design::find($id);
      


     $this->validate($request, array(
       'name'=>'required|max:225',
    
    ));

    /* get only first row where the id is  = mentioned */
     $design = Design::where('id',$id)->first();

     /*insert the name*/
     $design->name = $request->input('name');
  
    

    $design->save();


    


     // return redirect()->route('admin.slides.index')->with('success','slides updated successfully');
     return redirect()->route('admin.design.index',
         $design->id)->with('success',
         'Design, '. $design->name.' updated');
   }
   /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function destroy($id)
{
 $design = Design::findOrFail($id);
 $design->delete();

 return redirect()->route('admin.design.index')
         ->with('success',
          'design successfully deleted');
}
}
