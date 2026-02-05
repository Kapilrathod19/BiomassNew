<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function sliderlist()
    {
        $sliders = Slider::latest()->get();
        return view('Admin/Slider/Slider', compact('sliders'));
    }
    public function Add_slider()
    {
        return view('Admin/Slider/add_slider');
    }
    public function Store_slider(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '.' . $file->extension();
            $file->move(public_path('slider'), $fileName);
        }   
        Slider::create([
            'title' => $request->input('title'),
            'sub_title' => $request->input('sub_title'),
            'description' => $request->input('description'),
            'subject' => $request->input('subject'),
            'image' => $fileName ?? null,
        ]);        
        return redirect()->route('admin.slider')->with('success', 'Slider created successfully!');
    }

    public function Edit_slider(Request $request)
    {
        $slider = Slider::find($request->id);
        return view('Admin/Slider/edit_slider ', compact('slider'));
    }
    public function Update_slider(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);       
        $slider = Slider::findOrFail($request->id);
        if ($request->hasFile('image')) {
            if ($slider->image && file_exists(public_path('slider/' . $slider->image))) {
                unlink(public_path('slider/' . $slider->image));
            }
            $file = $request->file('image');
            $fileName = time() . '.' . $file->extension();
            $file->move(public_path('slider'), $fileName);
            $slider->image = $fileName;
        }
        $slider->title = $request->title;
        $slider->sub_title = $request->sub_title;
        $slider->description = $request->description;
        $slider->subject = $request->subject;
        $slider->save();
        return redirect()->route('admin.slider')->with('success', 'Slider updated successfully!');
    }
    public function Delete_slider(Request $request)
    {
        $Slider = Slider::find($request->id);
        if ($Slider) {
            $imagePath = public_path('slider/' . $Slider->image);
            if (file_exists($imagePath) && is_file($imagePath)) {
                unlink($imagePath);
            }
            $Slider->delete();
            return redirect()->route('admin.slider')->with('success', 'Slider deleted successfully!');
        } else {
            return redirect()->route('admin.slider')->with('error', 'Slider not found!');
        }
    }
}
