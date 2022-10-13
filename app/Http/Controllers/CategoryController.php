<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function AllCat()
    {
        $categories= Category::latest()->paginate(5);
        $trashCat= Category::onlyTrashed()->latest()->paginate(3);
        return view('admin.category.index',compact('categories', 'trashCat'));
    }

    public function AddCat(Request $request)
    {
        $validateData = $request->validate(
            [
                'category_name' => 'required|unique:categories|max:255'
            ],
            [
                'category_name.required' => 'Please Input Category Name'
            ]
        );
        Category::insert([
            'category_name' => $request->category_name,
            'user_id' => Auth::user()->id,
            'created_at'=>Carbon::now(),
        ]);

        // $category = new Category();
        // $category->category_name = $request->category_name;
        // $category->user_id = Auth::user()->id;
        // $category->save();

        // $data =array();
        // $data['category_name']=$request->category_name;
        // $data['user_id']=Auth::user()->id;
        // DB::table('categories')->insert($data);
        return redirect()->back()->with('success', 'Category added sucessfully');
    }

    public function Edit($id)
    {
       $categories= Category::find($id);
       return view('admin.category.edit', compact('categories'));
    }

    public function Update(Request $request, $id)
    {
        $update = Category::find($id)->update([
            'category_name'=>$request->category_name,
            'user_id'=>Auth::user()->id,

        ]);
        return redirect()->route('all.category')->with('Success', 'Category Updated Suceffully');

    }

    public function SoftDelete($id)
    {
        $delete = Category::find($id)->delete();

        return redirect()->back()->with('success', ' Category Deleted Sucesfully');
    }

    public function Restore($id)
    {
       $delete= Category::withTrashed()->find($id)->restore();

       return redirect()->back()->with('sucess', 'Restore Succefully');
    }

    public function Pdelete($id)
    {
       $delete= Category::onlyTrashed()->find($id)->forceDelete();

       return redirect()->back()->with('success', 'permanently Deleted');
    }
}
 