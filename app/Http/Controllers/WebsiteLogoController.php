<?php

namespace App\Http\Controllers;

use App\Models\WebsiteLogo;
use Illuminate\Http\Request;

class WebsiteLogoController extends Controller
{
    public function WebsiteLogo()
    {
        $data['title'] = 'Website Logo';
        $data['website_logo'] = WebsiteLogo::first() ?? new WebsiteLogo();
        return view('Admin/Site-setting/WebsiteLogo', $data);
    }

    public function UpdateWebsiteLogo(Request $request)
    {
        try {
            $validated = $request->validate([
                'id' => 'nullable|exists:website_logo,id',
                'logo' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
                'name' => 'nullable|string|max:255', 
            ]);

            $websiteLogo = WebsiteLogo::first();
            if (!$websiteLogo) {
                $websiteLogo = new WebsiteLogo();
                $websiteLogo->save(); 
            }

            if ($request->hasFile('logo')) {
                $oldImagePath = public_path('WebsiteLogo/' . $websiteLogo->logo);
                if ($websiteLogo->logo && file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
                $imageName = time() . '.' . $request->logo->extension();
                $request->logo->move(public_path('WebsiteLogo'), $imageName);
                $websiteLogo->logo = $imageName;
            }

            $websiteLogo->name = $request->name; 
            $websiteLogo->save();

            return redirect()->back()->with('success', 'Website Logo updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage())->withInput();
        }
    }
}
