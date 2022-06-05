<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function index()
    {

        $blogs = Auth::user()->role == 'user' ? Blog::where('user_id', Auth::user()->id)->get() : Blog::all();
        $categories = Category::all();

        return view('blogs.index', [
            'blogs' => $blogs,
            'categories' => $categories,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'photo' => 'required',
            'title' => 'required|min:5|max:80',
            'price' => 'required',
            'category' => 'required',
        ]);

        $files = $request->file('photo');
        $fullFileName = $files->getClientOriginalName();
        $fileName = pathinfo($fullFileName)['filename'];
        $extension = $files->getClientOriginalExtension();
        $photo = $fileName . '-' . date('YmdHis') . '-' . Str::random(10) . '.' . $extension;
        $files->storeAs('public/blogs/', $photo);

        Blog::create([
            'photo' => $photo,
            'title' => $request->title,
            'price' => $request->price,
            'category_id' => $request->category,
            'user_id' => Auth::user()->id
        ]);

        return redirect('/blog')->with('success_msg', 'Procduct Successfully Added.');
    }

    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        $categories = Category::all();
        return view('blogs.edit', [
            'blog' => $blog,
            'categories' => $categories,
        ]);
    }

    public function update(Request $request, $id)
    {
        if ($request->file('photo') == null) {
            $request->validate([
                'title' => 'required|min:5|max:80',
                'price' => 'required',
                'category' => 'required',
            ]);

            $blog = Blog::findOrFail($id);
            $blog->update([
                'title' => $request->title,
                'price' => $request->price,
                'category_id' => $request->category
            ]);

            return redirect('/blog')->with('success_msg', 'Procduct Successfully Edited.');
        } 
        else {
            $request->validate([
                'photo' => 'required',
                'title' => 'required|min:5|max:80',
                'price' => 'required',
                'category' => 'required',
            ]);

            $files = $request->file('photo');
            $fullFileName = $files->getClientOriginalName();
            $fileName = pathinfo($fullFileName)['filename'];
            $extension = $files->getClientOriginalExtension();
            $photo = $fileName . '-' . date('YmdHis') . '-' . Str::random(10) . '.' . $extension;
            $files->storeAs('public/blogs/', $photo);

            $blog = Blog::findOrFail($id);
            if (Storage::exists('public/blogs/' . $blog->photo)) {
                Storage::delete('public/blogs/' . $blog->photo);
            }

            $blog->update([
                'photo' => $photo,
                'title' => $request->title,
                'price' => $request->price,
                'category_id' => $request->category
            ]);

            return redirect('/blog')->with('success_msg', 'Procduct Successfully Edited.');
        }
    }

    public function delete($id)
    {
        $blog = Blog::findOrFail($id);
        if (Storage::exists('public/blogs/' . $blog->photo)) {
            Storage::delete('public/blogs/' . $blog->photo);
        }
        $blog->delete();

        return redirect('/blog')->with('success_msg', 'Procduct Successfully Deleted.');
    }
}
