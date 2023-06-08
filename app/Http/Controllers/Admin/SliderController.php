<?php

namespace App\Http\Controllers\Admin;

use App\Models\Slider;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $sliders = Slider::all();
        return view('admin.sliders.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
  // create function
public function create()
{
    return  view ('admin.sliders.create');
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
        'title'=>'required|max:225',
        'photo'=>'required|mimes:mp4,avi,asf,mov,qt,avchd,flv,swf,mpg,mpeg,mpeg-4,wmv,divx,3gp',
        'description' => 'required|string',
        'product_link' => 'required|string',
        
      ));
      $slider = new Slider;
      $slider->title = $request->input('title');
      $slider->description = $request->input('description');
      $slider->product_link = $request->input('product_link');
      if ($request->hasFile('photo')) {
        $photo = $request->file('photo');
        $filename = 'slide' . '-' . time() . '.' . $photo->getClientOriginalExtension();
        $location = public_path('images/');
        $request->file('photo')->move($location, $filename);

        $slider->photo = $filename;
      }
      $slider->save();
      return redirect()->route('admin.slides.index');
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
  $slider = Slider::findOrFail($id);
  return view('admin.sliders.edit', compact('slider'));
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
      $slider = Slider::find($id);
       


      $this->validate($request, array(
        'title'=>'required|max:225',
        'photo'=> 'nullable|mimes:mp4,avi,asf,mov,qt,avchd,flv,swf,mpg,mpeg,mpeg-4,wmv,divx,3gp',
        'description' => 'required|string',
        'product_link' => 'required|string',
     ));

     /* get only first row where the id is  = mentioned */
      $slider = Slider::where('id',$id)->first();

      /*insert the name*/
      $slider->title = $request->input('title');
      /*insert the desc*/
      $slider->description = $request->input('description');
      $slider->product_link = $request->input('product_link');
      /*check if photo exist*/
      if ($request->hasFile('photo')) {
       $photo = $request->file('photo');
       $filename = 'slide' . '-' . time() . '.' . $photo->getClientOriginalExtension();
       $location = public_path('images/');
       $request->file('photo')->move($location, $filename);

       $oldFilename = $slider->photo;
       $slider->photo= $filename;
       if(!empty($slider->photo)){
         Storage::delete($oldFilename);
       }
     }

     $slider->save();


     


      // return redirect()->route('admin.slides.index')->with('success','slides updated successfully');
      return redirect()->route('admin.slides.index',
          $slider->id)->with('success',
          'Slider, '. $slider->title.' updated');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
{
  $slider = Slider::findOrFail($id);
  Storage::delete($slider->photo);
  $slider->delete();

  return redirect()->route('admin.slides.index')
          ->with('success',
           'Slide successfully deleted');
}
}
