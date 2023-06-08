<?php

namespace App\Http\Controllers\Admin;

use App\Exports\Export;
use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductDetail;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::latest()
                    ->when(request('name'), function ($query) {
                        return $query->where('name', 'like', '%' . request('name') . '%');
                    })->when(request('assign_user_id'), function ($query) {
                        return $query->where('assign_user_id', request('assign_user_id'));
                    })->when(request('status'), function ($query) {
                        return $query->where('status', request('status'));
                    })->paginate(10);
        $users = User::admin()->pluck('name', 'id');
        return view('admin.project.index',compact('projects','users'));
    }

    public function show(Project $project)
    {
        $users = User::designer()->pluck('name','id');
        return view('admin.project.show',compact('project','users'));
    }

    public function update(Request $request, Project $project)
    {
        $project->assign_user_id = $request->assign_user_id;
        $project->save();
        return redirect()->route('admin.project.index')->with('success','Project assigned successfully');
    }

    public function destroy(Project $project)
    {
     $project->delete();
    
     return redirect()->route('admin.project.index')
             ->with('success',
              'Project deleted successfully');
    }

    public function export(Project $project)
    {
       
        $a_id_user = User::where('id',$project["user_id"])->first();
        $i=1;
        $description = [[
            'Project Name'=> $project->name,
            'A + ID -'=> $a_id_user->name??'Not Found',
            'Assigned to -'=> $project->assign_user->name??'Not Assign',
            ]];
        $data = $project->rooms->flatMap(function($room) use (&$i){
                return $room->products->map(function($product) use (&$i,$room){
                    
                    $product_data =  Product::where('p_id', $product->id)->first();
                    $product_cat_data =  Category::where('cat_id', $product_data->cat_id)->first();
                
                    
                    return [
                        'S.No.' => $i++,
                        'Room Name' => $room->name,
                        'Category' => $product_cat_data->cat_nm,
                        'Code' => $product_data->p_cd,
                        'Name' => $product->name.' ,Colour- '.optional($product->colour)->c_nm,
                        'Size'=> $product->width.'x'.$product->length.' '.$product->unit,
                        'Quantity'=> $product->quantity,
                        // 'lining_type' => $product->lining_type,
                        'Price' => $product->price,
                        'Hardware Type'=> $product->hardware_type,
                        'Total' => $product->price,
                    ];
                });
            });
        $headings = [[
            'S.No.',
            'Room Name',
            'Category',
            'Code',
            'Name',
            'Size',
            'Quantity',
            'Price',
            'Hardware Type',
            'Total',
        ]];
    


        return Excel::download(new Export($description,$data,$headings),$project->name.'.xlsx');
    }
}
