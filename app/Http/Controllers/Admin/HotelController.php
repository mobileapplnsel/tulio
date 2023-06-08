<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hotel;


class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$hotels = Hotel::paginate(10);
        $hotels =  Hotel::orderBy('sequence', 'ASC')->paginate(10);
        return view('admin.hotelier.index',compact('hotels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$categories = Category::pluck('cat_nm','cat_id');

      return view('admin.hotelier.add_hotel');
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
            'hotel_name' => 'required|string',
            'hotel_address' => 'required|string|max:50',
            'hotel_desc' => 'required|string',
            'img' => 'required|array',
            'img.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'hotel_sequence' => 'required|string',
        ]);

        //dd($request->input());
        $data = new Hotel;
        $data->name = $request->input('hotel_name');
        $data->address = $request->input('hotel_address');
        $data->description = $request->input('hotel_desc');
        $data->sequence = $request->input('hotel_sequence');

        $img = [];
        if($request->hasfile('img')){
            $file = $request->file('img');
            $i=1;
            foreach($file as $image){
                $extension = $image->getClientOriginalExtension();
                $name = time().($i++).'.'.$extension;
                $image->move('hotels', $name);
                $img[] = $name;
            }
        }

        if($request->hasFile('feature_image')){
            $file = $request->file('feature_image');
            $extension = $file->getClientOriginalExtension();
            $name = time().$i.'.'.$extension;
            $file->move('hotels', $name);
            $data->feature_image = $name;
        }

        $data->images = $img;
        $data->save();

        return redirect()->route('admin.hotelier.index')->with('success','hotel added successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    public function changeSequence(Request $request)
    {
        Hotel::where('id', $request->id)->update(array('sequence' => $request->sequence));
        return response()->json(['success'=>'Sequence changed successfully.']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Hotel $hotelier)
    {
        return view('admin.hotelier.edit',compact('hotelier'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hotel $hotelier)
    {
        $request->validate([
            'name' => 'required|string',
            'address' => 'required|string|max:50',
            'description' => 'required|string',
            'img' => 'nullable|array',
            'img.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'sequence' => 'required|string',

        ]);
        $hotelier->name = $request->name;
        $hotelier->address = $request->address;
        $hotelier->description = $request->description;
        $hotelier->sequence = $request->sequence;

        $img = [];
        $i=1;
        if($request->hasFile('img')){
            $file = $request->file('img');
            foreach($file as $image){
                $extension = $image->getClientOriginalExtension();
                $name = time().($i++).'.'.$extension;
                $image->move('hotels', $name);
                $img[] = $name;
            }
        }

        if($request->hasFile('feature_image')){
            $file = $request->file('feature_image');
            $extension = $file->getClientOriginalExtension();
            $name = time().$i.'.'.$extension;
            $file->move('hotels', $name);
            $hotelier->feature_image = $name;
        }
        if(!empty($img))
            $hotelier->images = $img;
        $hotelier->save();

        return redirect()->route('admin.hotelier.index')->with('success','hotel updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hotel $hotelier)
    {  //dd("hi");
     //  dd($hotelier);
       $hotelier->delete();
       return redirect()->route('admin.hotelier.index')->with('success','hotel deleted successfully.');
    }

}
