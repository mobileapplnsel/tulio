<?php

namespace App\Http\Controllers\Admin;

use App\Models\Ambience;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AmbienceController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
       
       $ambiences = Ambience::all();
       return view('admin.ambience.index', compact('ambiences'));
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
 // create function
public function create()
{
   return  view ('admin.ambience.create');
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
     $ambience = new Ambience;
     $ambience->name = $request->input('name');
     $ambience->save();
     return redirect()->route('admin.ambience.index');
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
 $ambience = Ambience::findOrFail($id);
 return view('admin.ambience.edit', compact('ambience'));
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
     $ambience = Ambience::find($id);
      


     $this->validate($request, array(
       'name'=>'required|max:225',
    
    ));

    /* get only first row where the id is  = mentioned */
     $ambience = Ambience::where('id',$id)->first();

     /*insert the name*/
     $ambience->name = $request->input('name');
  
    

    $ambience->save();


    


     // return redirect()->route('admin.slides.index')->with('success','slides updated successfully');
     return redirect()->route('admin.ambience.index',
         $ambience->id)->with('success',
         'Ambience, '. $ambience->name.' updated');
   }
   /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function destroy($id)
{
 $ambience = Ambience::findOrFail($id);
 $ambience->delete();

 return redirect()->route('admin.ambience.index')
         ->with('success',
          'ambience successfully deleted');
}
}

