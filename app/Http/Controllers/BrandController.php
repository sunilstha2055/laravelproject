<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use Carbon\Carbon;

class BrandController extends Controller
{
    public function AllBrand()
    {
        $brands = Brand::latest()->paginate(5);
        return view('admin.brand.index', compact('brands'));
    }

    public function AddBrand(Request $request)
    {
        $validatedData = $request->validate(
            [
                'brand_name' => 'required|unique:brands|min:4',
                'brand_image' => 'required|mimes:jpg,jpeg,png,bmp,tiff',
            ],

            [
                'brand_name.required' => 'Please Input Brand Name',
                'brand_name.min' => 'Brand Name Should be Longer Than 4',
            ]
        );

        $brand_image= $request->file('brand_image');
        $name_gen = hexdec(uniqid());
        $img_ext = strtolower($brand_image->getClientOriginalExtension());
        $img_name = $name_gen.'.'.$img_ext;
        $up_location ='image/brand';
        $last_img= $up_location.$img_name;
        $brand_image->move($up_location,$img_name);


        Brand::insert([
            'brand_name'=> $request->brand_name,
            'brand_image'=> $request->brand_name,
            'created_at'=>Carbon::now(),
        ]);
        return redirect()->back()->with('success', 'Brand Inserted Sucessully');

    }
}
