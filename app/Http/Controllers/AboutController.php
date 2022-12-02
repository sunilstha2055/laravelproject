<?php

namespace App\Http\Controllers;

use App\Models\HomeAbout;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;


class AboutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function HomeAbout()
    {

        $homeabouts = HomeAbout::latest()->get();
        return view('admin.about_home.index', compact('homeabouts'));
    }

    public function AddAbout()
    {
        return view('admin.about_home.create');
    }

    public function StoreAbout(Request $request)
    {
        $validatedData = $request->validate(
            [
                'title' => 'required|min:4',
                'description' => 'required|min:20',
                'short_description' => 'required|min:20',
            ],

            [
                'title.required' => 'Please Input Title ',
            ]
        );

        // $slider_image = $request->file('image');

        // $name_gen = hexdec(uniqid()) . '.' . $slider_image->getClientOriginalExtension();
        // Image::make($slider_image)->resize(1920, 1080)->save('image/slider/' . $name_gen);

        // $last_img = 'image/slider/' . $name_gen;


        HomeAbout::insert([
            'title' => $request->title,
            'description' => $request->description,
            'short_description' => $request->short_description,
            'created_at' => Carbon::now(),
        ]);
        return redirect()->route('home.about')->with('success', 'About Inserted Sucessully');
    }

    public function EditAbout($id)
    {
        $homeabout = HomeAbout::find($id);

        return view('admin.about_home.edit', compact('homeabout'));
    }

    public function UpdateAbout(Request $request, $id)
    {
        $update = HomeAbout::find($id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'short_description' => $request->short_description,
            'created_at' => Carbon::now(),
        ]);
        return redirect()->route('home.about')->with('success', 'About Updated  Sucessully');
    }

    public function DeleteAbout(Request $request, $id)
    {

        $delete = HomeAbout::find($id)->delete();

        return redirect()->back()->with('success', 'About Deleted  Sucessully');
    }
    
}
