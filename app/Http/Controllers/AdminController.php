<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use App\Models\Inquiry;
use App\Models\PrivacyPolicy;
use App\Models\TermsCondition;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function Login()
    {
        return view('Admin.login');
    }
    public function CheckLogin(Request $request)
    {
        $admin = User::where('email', $request->email)->first();
        $credentials = $request->only('email', 'password');
        if ($admin && $admin->role == 'admin') {
            if (Auth::attempt($credentials)) {
                return redirect()->route('admin.dashboard')->with('success', 'Login successful');
            } else {
                return back()->withErrors(['failed' => 'The provided credentials do not match our records.',]);
            }
        } else {
            return back()->withErrors(['failed' => 'You do not have access to this section.']);
        }
    }
    public function Dashboard(Request $request)
    {
        $ContactUs = ContactUs::first();
        return view('Admin.dashboard', compact('ContactUs'));
    }
    public function Logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login')->with('success', 'Logout successful');
    }
    public function Profile(Request $request)
    {
        $user = Auth::user();
        return view('Admin.profile', compact('user'));
    }
    public function UpdateProfile(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email',
            'name' => 'required',
        ]);
        $user = User::findOrFail($request->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        Session::flash('success', 'Admin Profile updated successfully');
        return redirect()->route('admin.profile');
    }
    public function UpdatePassword(Request $request)
    {
        $validatedData = $request->validate([
            'current_password' => ['required', 'string'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
        if (!Hash::check($validatedData['current_password'], Auth::user()->password)) {
            return redirect()->back()->withErrors(['current_password' => 'The current password is incorrect.']);
        }

        // Update the user's password
        Auth::user()->password = Hash::make($validatedData['password']);
        Auth::user()->save();

        // Redirect back with success message
        return redirect()->back()->with('successpassword', 'Password updated successfully.');
    }

    public function inquiry()
    {
        $inquiries = Inquiry::latest()->get();
        return view('Admin.inquiry', compact('inquiries'));
    }

    public function Delete_inquiry($id)
    {
        $inquiry = Inquiry::findOrFail($id);
        $inquiry->delete();
        return redirect()->back()->with('success', 'Inquiry deleted successfully');
    }

    public function PrivacyPolicy()
    {
        $data['title'] = 'Privacy Policy';
        $data['privacy'] = PrivacyPolicy::first();
        return view('Admin/PrivacyPolicy', $data);
    }

    public function Update_PrivacyPolicy(Request $request)
    {
        $validated = $request->validate([
            'details' => 'required',
        ]);

        if ($request->id) {
            $PrivacyPolicy = PrivacyPolicy::find($request->id);
            if (!$PrivacyPolicy) {
                return redirect()->back()->with('error', 'Privacy Policy not found.');
            }
        } else {
            $PrivacyPolicy = new PrivacyPolicy();
        }

        $PrivacyPolicy->details = $request->details;
        $PrivacyPolicy->save();

        return redirect()->back()->with('success', 'Privacy Policy saved successfully!');
    }

    public function terms_conditions()
    {
        $data['title'] = 'Terms & Condition';
        $data['terms'] = TermsCondition::first();
        return view('Admin/TermsCondition', $data);
    }

    public function Update_terms_conditions(Request $request)
    {
        $validated = $request->validate([
            'details' => 'required',
        ]);

        // If an ID is passed, try to update. Otherwise, insert new.
        if ($request->id) {
            $TermsCondition = TermsCondition::find($request->id);
            if (!$TermsCondition) {
                return redirect()->back()->with('error', 'Terms & Condition not found.');
            }
        } else {
            $TermsCondition = new TermsCondition();
        }

        $TermsCondition->details = $request->details;
        $TermsCondition->save();

        return redirect()->back()->with('success', 'Terms & Condition saved successfully!');
    }

    public function user_list()
    {
        $users = User::where('role', '!=', 'admin')->latest()->get();
        return view('Admin.user_list', compact('users'));
    }
    
    public function updateStatus(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'status' => 'required|in:0,1',
        ]);

        $user = User::findOrFail($request->user_id);
        $user->status = $request->status;
        $user->save();

        return response()->json(['success' => true, 'message' => 'Status updated successfully.']);
    }

    public function delete_User(Request $request)
    {
        $user = User::find($request->id);
        if ($user) {
           
            $user->delete();
            return redirect()->route('admin.users')->with('success', 'User deleted successfully!');
        } else {
            return redirect()->route('admin.users')->with('error', 'user not found!');
        }
    }
}
