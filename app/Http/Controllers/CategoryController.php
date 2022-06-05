<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view ('categories.index', [
            'categories' => $categories
        ]);
    }

    
    public function store(Request $request){

        $request->validate([
            'title' => 'required|min:3',
        ]);

        // 1 
        // $category = new Category();
        // $category->title = $request->title;
        // $category->save();


        // 2
        Category::create([
            'title' => $request->title,
        ]);

        // 3
        // Category::create($request->all());
        
        // 4
        // $category->insert([
        //     $category->title: $request->title
        // ]);

        // query builder
        // $categories = DB::table('categories')->get();
        // Category::where('book_id', $id);


        // eloquent
        // Category::findOrFail();

        return redirect('/categories')->with('success_msg', 'Category Successfully Added.');

    }

    public function edit($id){
        $category = Category::findOrFail($id);
        return view('categories.edit', [
            'category' => $category
        ]);
    }

    public function update(Request $request, $id){
        $category = Category::findOrFail($id);
        $request->validate([
            'title' => 'required|min:3',
        ]);

        $category->update([
            'title' => $request->title,
        ]);

        return redirect('/categories')->with('success_msg', 'Category Successfully Edited.');

    }

    public function delete($id){
        $category = Category::findOrFail($id);

        // $category = Category::find($id);
        // if($category == null){
        //     return redirect('/categories')->with('success_msg', 'Category is not found.');
        // }

        $category->delete();

        return redirect('/categories')->with('success_msg', 'Category Successfully Deleted.');

    }
    

}
