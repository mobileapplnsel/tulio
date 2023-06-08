<?php

namespace App\Http\Controllers\Admin;

use App\Models\Technique;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TechniqueController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
       
       $techniques = Technique::all();
       return view('admin.technique.index', compact('techniques'));
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
 // create function
public function create()
{
   return  view ('admin.technique.create');
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
     $technique = new Technique;
     $technique->name = $request->input('name');
     $technique->save();
     return redirect()->route('admin.technique.index');
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
 $technique = Technique::findOrFail($id);
 return view('admin.technique.edit', compact('technique'));
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
     $technique = Technique::find($id);
      


     $this->validate($request, array(
       'name'=>'required|max:225',
    
    ));

    /* get only first row where the id is  = mentioned */
     $technique = Technique::where('id',$id)->first();

     /*insert the name*/
     $technique->name = $request->input('name');
  
    

    $technique->save();


    


     // return redirect()->route('admin.slides.index')->with('success','slides updated successfully');
     return redirect()->route('admin.technique.index',
         $technique->id)->with('success',
         'Technique, '. $technique->name.' updated');
   }
   /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function destroy($id)
{
 $technique = Technique::findOrFail($id);
 $technique->delete();

 return redirect()->route('admin.technique.index')
         ->with('success',
          'technique successfully deleted');
}
}
