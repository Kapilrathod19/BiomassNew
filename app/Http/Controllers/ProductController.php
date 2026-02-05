<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function productList()
    {
        $data['title'] = 'Product List';
        $data['products'] = Product::with('user')->latest()->get();
        return view('Admin/Product/product_list', $data);
    }

    public function Add_product()
    {
        $data['title'] = 'Add Product';
        return view('Admin/Product/add_product', $data);
    }

    public function Store_product(Request $request)
    {
        try {
            $request->validate([
                'category' => 'required|string|max:255',
                'title' => 'required|string|max:255',
                'details' => 'required|string',
                'size' => 'required',
                'gcv' => 'required',
                'moisture' => 'required',
                'image' => 'nullable|image',
                'status' => 'required|in:0,1',
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
                'category' => $request->category,
                'title' => $request->title,
                'slug' => $slug,
                'details' => $request->details,
                'size' => $request->size,
                'gcv' => $request->gcv,
                'moisture' => $request->moisture,
                'image' => $fileName,
                'status' => $request->status,
            ]);

            return redirect()->route('admin.product')->with('success', 'Product created successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage())->withInput();
        }
    }

    public function Edit_product(Request $request)
    {
        try {
            $data['title'] = 'Edit Product';
            $data['product'] = Product::findOrFail($request->id);
            return view('Admin/Product/edit_product', $data);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function Update_product(Request $request)
    {
        try {
            $request->validate([
                'category' => 'required|string|max:255',
                'title' => 'required|string|max:255',
                'details' => 'required|string',
                'size' => 'required',
                'gcv' => 'required',
                'moisture' => 'required',
                'image' => 'nullable|image',
                'status' => 'required|in:0,1',
            ]);

            $product = Product::findOrFail($request->id);
            if ($request->hasFile('image')) {
                if ($product->image && file_exists(public_path('products/' . $product->image))) {
                    unlink(public_path('products/' . $product->image));
                }
                $file = $request->file('image');
                $fileName = time() . '.' . $file->extension();
                $file->move(public_path('products'), $fileName);
                $product->image = $fileName;
            }

            $slug = Str::slug($request->title);
            $originalSlug = $slug;
            $counter = 1;
            while (Product::where('slug', $slug)->where('id', '!=', $product->id)->exists()) {
                $slug = $originalSlug . '-' . $counter++;
            }

            $product->category = $request->category;
            $product->title = $request->title;
            $product->slug = $slug;
            $product->details = $request->details;
            $product->size = $request->size;
            $product->gcv = $request->gcv;
            $product->moisture = $request->moisture;
            $product->status = $request->status;
            $product->save();

            return redirect()->route('admin.product')->with('success', 'Product updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage())->withInput();
        }
    }

    public function Delete_product(Request $request)
    {
        try {
            $product = Product::findOrFail($request->id);
            if ($product) {
                if ($product->image && file_exists(public_path('products/' . $product->image))) {
                    unlink(public_path('products/' . $product->image));
                }

                $product->delete();
                return redirect()->route('admin.product')->with('success', 'Product deleted successfully!');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
}
