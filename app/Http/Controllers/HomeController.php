<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Image;


class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function HomeSlider()
    {
        $sliders=Slider::latest()->get();
        return view('admin.slider.index', compact('sliders'));
    }

    public function AddSlider()
    {
        return view('admin.slider.create');
    }

    public function StoreSlider(Request $request)
    {
        $validatedData = $request->validate(
            [
                'title' => 'required|min:4',
                'description' => 'required|min:20',
                'image' => 'required|mimes:jpg,jpeg,png,bmp,tiff',
            ],

            [
                'title.required' => 'Please Input Brand Name',
                'image.min' => 'Brand Name Should be Longer Than 4',
            ]
        );

        $slider_image = $request->file('image');

        $name_gen = hexdec(uniqid()) . '.' . $slider_image->getClientOriginalExtension();
        Image::make($slider_image)->resize(1920, 1080)->save('image/slider/' . $name_gen);

        $last_img = 'image/slider/' . $name_gen;


        Slider::insert([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $last_img,
            'created_at' => Carbon::now(),
        ]);
        return redirect()->route('home.slider')->with('success', 'Slider Inserted Sucessully');
    }
}
