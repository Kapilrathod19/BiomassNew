<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function ServiceList()
    {
        $data['title'] = 'Service List';
        $data['services'] = Service::latest()->get();
        return view('Admin/Service/service_list', $data);
    }

    public function Add_Service()
    {
        $data['title'] = 'Add Service';
        return view('Admin/Service/add_service', $data);
    }

    public function Store_Service(Request $request)
    {
        try {
            $request->validate([
                'title' => 'required|string|max:255',
                'details' => 'required|string',
                'image' => 'nullable|image',
                'sub_image' => 'nullable|image',
            ]);

            $fileName = null;
            $subfileName = null;

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $fileName = time() . '.' . $file->extension();
                $file->move(public_path('services'), $fileName);
            }
            if ($request->hasFile('sub_image')) {
                $subfile = $request->file('sub_image');
                $subfileName = time() . '.' . $subfile->extension();
                $subfile->move(public_path('services'), $subfileName);
            }

            Service::create([
                'title' => $request->title,
                'details' => $request->details,
                'key_features' => $request->key_features ?? null,
                'image' => $fileName,
                'sub_image' => $subfileName,
            ]);

            return redirect()->route('admin.service')->with('success', 'Service created successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage())->withInput();
        }
    }

    public function Edit_Service(Request $request)
    {
        try {
            $data['title'] = 'Edit Service';
            $data['service'] = Service::findOrFail($request->id);
            return view('Admin/Service/edit_service', $data);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function Update_Service(Request $request)
    {
        try {
            $request->validate([
                'title' => 'required|string|max:255',
                'details' => 'required|string',
                'key_features' => 'nullable|string',
                'image' => 'nullable|image',
                'sub_image' => 'nullable|image',
            ]);

            $service = Service::findOrFail($request->id);
            if ($request->hasFile('image')) {
                if ($service->image && file_exists(public_path('services/' . $service->image))) {
                    unlink(public_path('services/' . $service->image));
                }
                $file = $request->file('image');
                $fileName = time() . '.' . $file->extension();
                $file->move(public_path('services'), $fileName);
                $service->image = $fileName;
            }
            if ($request->hasFile('sub_image')) {
                if ($service->sub_image && file_exists(public_path('services/' . $service->sub_image))) {
                    unlink(public_path('services/' . $service->sub_image));
                }
                $subfile = $request->file('sub_image');
                $subfileName = time() . '.' . $subfile->extension();
                $subfile->move(public_path('services'), $subfileName);
                $service->sub_image = $subfileName;
            }
            $service->title = $request->title;
            $service->details = $request->details;
            $service->key_features = $request->key_features;
            $service->save();

            return redirect()->route('admin.service')->with('success', 'Service updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage())->withInput();
        }
    }

    public function Delete_Service(Request $request)
    {
        try {
            $service = Service::findOrFail($request->id);
            if ($service) {
                if ($service->image && file_exists(public_path('services/' . $service->image))) {
                    unlink(public_path('services/' . $service->image));
                }
                if ($service->sub_image && file_exists(public_path('services/' . $service->sub_image))) {
                    unlink(public_path('services/' . $service->sub_image));
                }
                $service->delete();
                return redirect()->route('admin.service')->with('success', 'Service deleted successfully!');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
}
