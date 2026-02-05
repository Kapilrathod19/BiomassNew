<?php

namespace App\Http\Controllers;

use App\Models\BlogDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function BlogList()
    {
        $data['title'] = 'Blog List';
        $data['blogdetail'] = BlogDetail::latest()->get();
        return view('Admin/Blog-Details/blog_details_list', $data);
    }

    public function Add_Blog()
    {
        $data['title'] = 'Add Blog';
        return view('Admin/Blog-Details/add_blog_details', $data);
    }

    public function Store_Blog(Request $request)
    {
        // try {
            $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'created_by' => 'nullable|string|max:255',
                'image' => 'nullable|image',
            ]);

            // Generate slug
            $slug = Str::slug($request->title);
            $existingSlug = BlogDetail::where('slug', $slug)->exists();

            if ($existingSlug) {
                $slug .= '-' . uniqid();
            }

            // Handle image upload if exists
            $fileName = null;
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $fileName = time() . '.' . $file->extension();
                $file->move(public_path('blog'), $fileName);
            }

            // Save blog data
            BlogDetail::create([
                'title' => $request->title, 
                'slug' => $slug,
                'designation' => $request->designation,
                'description' => $request->description,
                'created_by' => $request->created_by,
                'image' => $fileName,
            ]);

            return redirect()->route('admin.blog')->with('success', 'Blog created successfully!');
        // } catch (\Exception $e) {
        //     return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage())->withInput();
        // }
    }


    public function Edit_Blog(Request $request)
    {
        try {
            $data['title'] = 'Edit Blog';
            $data['blogdetail'] = BlogDetail::findOrFail($request->id);
            return view('Admin/Blog-Details/edit_blog_details', $data);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function Update_Blog(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'created_by' => 'nullable|string|max:255',
                'image' => 'nullable|image|max:2048',
            ]);

            $blogDetail = BlogDetail::findOrFail($request->id);
            if ($validatedData['title'] !== $blogDetail->title) {
                $slug = Str::slug($validatedData['title']);
                $existingSlug = BlogDetail::where('slug', $slug)->where('id', '!=', $blogDetail->id)->first();

                if ($existingSlug) {
                    $slug = $slug . '-' . uniqid();
                }

                $blogDetail->slug = $slug;
            }

            if ($request->hasFile('image')) {
                if ($blogDetail->image && file_exists(public_path('blog/' . $blogDetail->image))) {
                    unlink(public_path('blog/' . $blogDetail->image));
                }
                $file = $request->file('image');
                $fileName = time() . '.' . $file->extension();
                $file->move(public_path('blog'), $fileName);
                $blogDetail->image = $fileName;
            }

            $blogDetail->title = $request->title;
            $blogDetail->designation = $request->designation;
            $blogDetail->description = $request->description;
            $blogDetail->created_by = $request->created_by;
            $blogDetail->save();

            return redirect()->route('admin.blog')->with('success', 'Blog Detail successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage())->withInput();
        }
    }

    public function Delete_Blog(Request $request)
    {
        try {
            $blogDetail = BlogDetail::findOrFail($request->id);
            if ($blogDetail) {
                if ($blogDetail->image && file_exists(public_path('blog/' . $blogDetail->image))) {
                    unlink(public_path('blog/' . $blogDetail->image));
                }
                $blogDetail->delete();
                return redirect()->route('admin.blog')->with('success', 'Blog deleted successfully!');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
}
