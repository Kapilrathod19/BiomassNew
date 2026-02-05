<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\BlogDetail;
use App\Models\ContactUs;
use App\Models\Inquiry;
use App\Models\PartnerLogo;
use App\Models\Plan;
use App\Models\PrivacyPolicy;
use App\Models\Product;
use App\Models\TermsCondition;
use App\Models\Service;
use App\Models\Slider;
use App\Models\Testimonial;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class FrontController extends Controller
{
    public function login()
    {
        return view('front.login');
    }

    public function login_submit(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->with('error', 'Invalid credentials.');
        }

        if (!Hash::check($request->password, $user->password)) {
            return back()->with('error', 'Invalid credentials.');
        }

        if ($user->status != 1) {
            return back()->with('error', 'Your account is not active yet.');
        }

        Auth::login($user);

        return redirect()->route('user.dashboard'); // Change to your actual dashboard route
    }

    public function register()
    {
        return view('front.register');
    }

    public function save_register(Request $request)
    {
        try {

            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'phone' => 'required|digits_between:10,15',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:6',
                'state' => 'required|string|max:100',
                'city' => 'required|string|max:100',
                'zip' => 'required|string|max:10',
                'address' => 'nullable|string|max:255',
                'organization_name' => 'required|string|max:255', // New field
                'website' => 'nullable|url|max:255', // New field
                'service' => 'nullable|string|max:100', // New field
                'partner' => 'required|string|max:100', // New field
            ]);

            $user = new User();
            $user->name = $request->name;
            $user->phone = $request->phone;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->ipass = $request->password;
            $user->state = $request->state;
            $user->city = $request->city;
            $user->zip = $request->zip;
            $user->address = $request->address;
            $user->role = 'user';
            $user->status = 0; // Assuming 0 means inactive
            $user->organization_name = $request->organization_name; // New field
            $user->website = $request->website;
            $user->service = $request->service;
            $user->partner = $request->partner;
            $user->save();

            return redirect()->route('login')->with('success', 'Registration successful!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home')->with('success', 'Logged out successfully!');
    }

    public function dashboard()
    {
        return view('front.dashboard');
    }

    public function index()
    {
        $sliders = Slider::latest()->get();
        $about = About::first();
        $products = Product::where('status', 1)->latest()->limit(6)->get();
        $partnerLogos = PartnerLogo::latest()->get();
        $ContactUs = ContactUs::first();
        return view('front.index', compact('sliders', 'about', 'products', 'partnerLogos', 'ContactUs'));
    }

    public function about_us()
    {
        $about = About::first();
        $partnerLogos = PartnerLogo::latest()->get();
        return view('front.about_us', compact('about', 'partnerLogos'));
    }

    public function service_details($id)
    {
        $service = Service::findOrFail($id);
        $otherservice = Service::where('id', '!=', $id)->latest()->get();
        $partnerLogos = PartnerLogo::latest()->get();
        return view('front.service_details', compact('service', 'otherservice', 'partnerLogos'));
    }

    public function products()
    {
        $products = Product::where('status', 1)->latest()->paginate(12);
        return view('front.products', compact('products'));
    }

    public function product_details($slug)
    {
        $product = Product::where('slug', $slug)->first();
        return view('front.product_details', compact('product'));
    }

    public function price_list()
    {
        $plans = Plan::all();
        return view('front.price_list', compact('plans'));
    }

    public function contact_us()
    {
        $ContactUs = ContactUs::first();
        return view('front.ContactUs', compact('ContactUs'));
    }

    public function save_contact(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|regex:/^[0-9]+$/|min:10|max:15',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        Inquiry::create([
            'name'       => $request->input('name'),
            'email'      => $request->input('email'),
            'phone'      => $request->input('phone'),
            'subject'    => $request->input('subject'),
            'message'    => $request->input('message'),
            'role'    => $request->input('role'),
            'interest'    => $request->input('interest'),
        ]);

        return redirect()->back()->with('success', 'Your inquiry has been submitted successfully!');
    }


    public function privacy_policy()
    {
        $privacy_policy = PrivacyPolicy::first();
        return view('front.privacy_policy', compact('privacy_policy'));
    }

    public function terms_conditions()
    {
        $terms_conditions = TermsCondition::first();
        return view('front.terms_conditions', compact('terms_conditions'));
    }
}
