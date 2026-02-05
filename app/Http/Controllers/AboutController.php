<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function About(Request $request)
    {
        $data['title'] = 'About Us Details';
        $data['about'] = About::first() ?? new About(); // Return new instance if no record exists
        return view('Admin/Site-setting/about_details', $data);
    }

    public function Update_About(Request $request)
    {
        try {
            // Validate the request
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'nullable|string',
                'our_vision' => 'nullable|string',
                'our_mission' => 'nullable|string',
                'projects' => 'nullable|string|max:255',
                'experts' => 'nullable|string|max:255',
                'clients' => 'nullable|string|max:255',
                'experience' => 'nullable|string|max:255',
                'main_image' => 'nullable|image|max:2048',
            ]);

            $about = About::first();
            if (!$about) {
                $about = new About();
            }

            if ($request->hasFile('main_image')) {
                $oldImagePath = public_path('About/' . $about->main_image);
                if ($about->main_image && file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
                $imageName = time() . '.' . strtolower($request->main_image->getClientOriginalExtension());
                $request->main_image->move(public_path('About'), $imageName);
                $about->main_image = $imageName;
            }


            // Update other fields
            $about->title = $request->title;
            $about->description = $request->description;
            $about->our_vision = $request->our_vision;
            $about->our_mission = $request->our_mission;
            $about->projects = $request->projects;
            $about->experts = $request->experts;
            $about->clients = $request->clients;
            $about->experience = $request->experience;
            $about->save();

            return redirect()->route('admin.about')->with('success', 'About section updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage())->withInput();
        }
    }
}
