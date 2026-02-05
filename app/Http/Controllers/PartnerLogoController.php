<?php

namespace App\Http\Controllers;

use App\Models\PartnerLogo;
use Illuminate\Http\Request;

class PartnerLogoController extends Controller
{
    public function PartnerLogo()
    {
        $data['title'] = 'Partner-Logo List';
        $data['PLogo'] = PartnerLogo::get();
        return view('Admin/Partner-Logo/PartnerLogo', $data);
    }

    public function Add_PartnerLogo()
    {
        $data['title'] = 'Add Partner-Logo';
        return view('Admin/Partner-Logo/Add_PartnerLogo', $data);
    }

    public function Store_PartnerLogo(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'logo' => 'required|image|mimes:png,jpg,jpeg|max:2048',
                'name' => 'nullable|string|max:255', 
            ]);

            if ($request->hasFile('logo')) {
                $file = $request->file('logo');
                $fileName = time() . '.' . $file->extension();
                $file->move(public_path('partner_logos'), $fileName);
                PartnerLogo::create([
                    'logo' => $fileName,
                    'name' => $request->name, 
                ]);
            }

            return redirect()->route('admin.partnerlogo')->with('success', 'Partner logo saved successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage())->withInput();
        }
    }

    public function Edit_PartnerLogo(Request $request)
    {
        $data['title'] = 'Edit Partner-Logo';
        $data['PLogo'] = PartnerLogo::findOrFail($request->id);
        return view('Admin/Partner-Logo/Edit_PartnerLogo', $data);
    }

    public function Update_PartnerLogo(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'logo' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
                'name' => 'nullable|string|max:255', 
            ]);

            $partnerLogo = PartnerLogo::findOrFail($request->id);
            if ($request->hasFile('logo')) {
                $oldImagePath = public_path('partner_logos/' . $partnerLogo->logo);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
                $file = $request->file('logo');
                $fileName = time() . '.' . $file->extension();
                $file->move(public_path('partner_logos'), $fileName);
                $partnerLogo->logo = $fileName;
            }
            $partnerLogo->name = $request->name; // Update name field
            $partnerLogo->save();

            return redirect()->route('admin.partnerlogo')->with('success', 'Partner logo updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage())->withInput();
        }
    }

    public function Delete_PartnerLogo(Request $request)
    {
        try {
            $partnerLogo = PartnerLogo::findOrFail($request->id);
            if ($partnerLogo) {
                $oldImagePath = public_path('partner_logos/' . $partnerLogo->logo);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
                $partnerLogo->delete();
                return redirect()->route('admin.partnerlogo')->with('success', 'Partner logo deleted successfully!');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
}
