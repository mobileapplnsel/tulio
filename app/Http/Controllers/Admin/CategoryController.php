<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $category = Category::paginate(10);
       return view('admin.category.index',compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('cat_nm','cat_id');

      return view('admin.category.add_category',compact('categories'));
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
            'category_name' => 'required|string',
            'category_desc' => 'required|string|max:250',
            'image' => 'required|image|max:1024',

        ]);

         $input['cat_nm'] = $request->category_name;
         $input['cat_ds'] = $request->category_desc;
         if($request->parent_id)
            $input['parent_id'] = $request->parent_id;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageDestinationPath = 'uploads/';
            $postImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($imageDestinationPath, $postImage);
            $input['cat_img1'] = "$postImage";
        }


        Category::create($input);
        return redirect()->route('admin.category.index')->with('success','category added successfully.');
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
    public function edit(Category $category)
    {
        $categories = Category::pluck('cat_nm','cat_id');
        return view('admin.category.edit',compact('category','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
         $request->validate([
             'category_name' => 'required|string',
             'category_desc' => 'required|string|max:250',
             'cat_img1' => 'nullable|image|max:1024',

         ]);

         $category->cat_nm = $request->category_name;
          $category->cat_ds= $request->category_desc;
          if($request->parent_id)
            $category->parent_id = $request->parent_id;
         if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageDestinationPath = 'uploads';
            $postImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($imageDestinationPath, $postImage);
            $category->cat_img1 = "$postImage";
         }


        $category->save();
         return redirect()->route('admin.category.index')->with('success','category update successfully.');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.category.index')->with('success','Category deleted successfully.');
    }
}
