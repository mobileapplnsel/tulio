<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Colour;


class ColourController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $colours = Colour::orderBy('c_nm')->paginate(10);
       return view('admin.colour.index',compact('colours'));
    
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      //$categories = Category::pluck('cat_nm','cat_id');
      return view('admin.colour.add_colour');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'colour_name' => 'required|string',
            'colour_num' => 'required|string|max:50',
            
        ]);

         $input['c_nm'] = $request->colour_name;
         $input['c_no'] = $request->colour_num;
          //dd($input);
       $colour =  Colour::create($input);
        return redirect()->route('admin.colour.index')->with('success','colour added successfully.');
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
    public function edit(Colour $colour)
    {
      // $colours = Colour::pluck('c_nm','c_no');
        return view('admin.colour.edit',compact('colour'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Colour $colour)
    {
      $request->validate([
            'colour_name' => 'required|string',
            'colour_num' => 'required|string|max:50',
            
        ]);

        $colour->c_nm = $request->colour_name;
        $colour->c_no = $request->colour_num;
          //dd($input);
       $colour->save();
        return redirect()->route('admin.colour.index')->with('success','colour updated successfully.');   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Colour $colour)
    {
      // do not delete colors as it creates many issues
      // $colour->delete();
      return redirect()->route('admin.colour.index')->with('success','colour delete feature disabled.');
    }
}
