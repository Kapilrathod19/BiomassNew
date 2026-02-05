<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class UserProductController extends Controller
{
    public function index()
    {
        $products = Product::where('user_id',Auth::id())->orderBy('id', 'desc')->get();
        return view('front.products.index', compact('products'));
    }

    public function create()
    {
        return view('front.products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'details' => 'required|string',
            'size' => 'required',
            'gcv' => 'required',
            'moisture' => 'required',
            'image' => 'nullable|image',
        ]);

        $fileName = null;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '.' . $file->extension();
            $file->move(public_path('products'), $fileName);
        }

        $slug = Str::slug($request->title);
        $originalSlug = $slug;
        $counter = 1;
        while (Product::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter++;
        }

        Product::create([
            'user_id' => Auth::id(),
            'category' => $request->category,
            'title' => $request->title,
            'slug' => $slug,
            'details' => $request->details,
            'size' => $request->size,
            'gcv' => $request->gcv,
            'moisture' => $request->moisture,
            'image' => $fileName,
            'status' => 0,
        ]);

        return redirect()->route('user.products')->with('success', 'Product added successfully!');
    }
}
