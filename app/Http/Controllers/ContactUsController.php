<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
     public function contactUS()
    {
        $data['title'] = 'Contact Us Details';
        $data['contact'] = ContactUs::first() ?? new ContactUs(); 
        return view('Admin/Site-setting/Contact_US', $data);
    }

    public function Update_contactUS(Request $request)
    {
        try {
            // Validate the request
            $validated = $request->validate([
                'name' => 'nullable|string|max:255',
                'email' => 'nullable|email|max:255',
                'mobile' => 'nullable|string|max:15',
                'address' => 'nullable|string|max:255',
                'map_link' => 'nullable',
                'pinterest_link' => 'nullable|string|max:255',
                'youtube_link' => 'nullable|string|max:255',
                'instagram_link' => 'nullable|string|max:255',
                'facebook_link' => 'nullable|string|max:255',
                'twitter_link' => 'nullable|string|max:255',
                'linkedin_link' => 'nullable|string|max:255',
            ]);

            $contact = ContactUs::first();
            if (!$contact) {
                $contact = new ContactUs();
                $contact->save();
            }

            $contact->update($request->all());

            return redirect()->route('admin.contactUS')->with('success', 'Contact updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage())->withInput();
        }
    }
}
