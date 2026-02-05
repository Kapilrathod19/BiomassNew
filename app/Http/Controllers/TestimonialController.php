<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function TestimonialList()
    {
        try {
            $data['title'] = 'Testimonial List';
            $data['testimonials'] = Testimonial::get();
            return view('Admin/Testimonial/testimonial_list', $data);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function Add_Testimonial()
    {
        try {
            $data['title'] = 'Add Testimonial';
            return view('Admin/Testimonial/add_testimonial', $data);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function Store_Testimonial(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'designation' => 'required|string|max:255',
                'message' => 'required|string',
                'image' => 'required|image',
            ]);

            $fileName = null;
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $fileName = time() . '.' . $file->extension();
                $file->move(public_path('testimonials'), $fileName);
            }

            Testimonial::create([
                'name' => $request->input('name'),
                'designation' => $request->input('designation'),
                'message' => $request->input('message'),
                'image' => $fileName,
            ]);

            return redirect()->route('admin.testimonial')->with('success', 'Testimonial created successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage())->withInput();
        }
    }

    public function Edit_Testimonial($id)
    {
        try {
            $data['title'] = 'Edit Testimonial';
            $data['testimonials'] = Testimonial::findOrFail($id);
            return view('Admin/Testimonial/edit_testimonial', $data);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage())->withInput();
        }
    }

    public function Update_Testimonial(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'designation' => 'required|string|max:255',
                'message' => 'required|string',
                'image' => 'nullable|image',
            ]);

            $testimonial = Testimonial::findOrFail($request->id);
            if ($request->hasFile('image')) {
                if ($testimonial->image && file_exists(public_path('testimonials/' . $testimonial->image))) {
                    unlink(public_path('testimonials/' . $testimonial->image));
                }
                $file = $request->file('image');
                $fileName = time() . '.' . $file->extension();
                $file->move(public_path('testimonials'), $fileName);
                $testimonial->image = $fileName;
            }
            $testimonial->name = $request->name;
            $testimonial->designation = $request->designation;
            $testimonial->message = $request->message;
            $testimonial->save();

            return redirect()->route('admin.testimonial')->with('success', 'Testimonial updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage())->withInput();
        }
    }

    public function Delete_Testimonial($id)
    {
        try {
            $testimonial = Testimonial::find($id);
            if ($testimonial) {
                if ($testimonial->image && file_exists(public_path('testimonials/' . $testimonial->image))) {
                    unlink(public_path('testimonials/' . $testimonial->image));
                }
                $testimonial->delete();
                return redirect()->route('admin.testimonial')->with('success', 'Testimonial deleted successfully!');
            } else {
                return redirect()->route('admin.testimonial')->with('error', 'Testimonial not found!');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
}
