<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class CategoriesController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'is.admin']);
    }

    public function create()
    {

        return view('categories.create');
    }

    public function  store(Request $request)
    {
        $data = $request->validate([
            'name' => "required|string|max:100|unique:categories,title",
            'description' => ['required', 'string', 'max:1000']
        ]);


        $slug = Str::slug($data['name']);

        Category::create([
            'title' => $request->input('name'),
            'description' => $request->input('description'),
            'slug' => $slug
        ]);

        Alert::success('Successfull', 'Category has been created');
        // return redirect('/');
        // return redirect()->route('categories.create');
        return back();
    }

    public function index()
    {
        $title = "All Categories - Spotlight";
        // $categories = Category::all()->sortByDesc('title');
        $heading = 'Delete Category!';
        $body = "Are you sure you want to delete?";
        confirmDelete($heading, $body);
        $categories = Category::all()->sortBy('title');

        return view('categories.index', compact('title', 'categories'));
    }

    public function edit($id)
    {
        // $category = Category::find($id);
        $category = Category::findOrFail($id);

        return view('categories.edit', compact('category'));
    }


    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $data = $request->validate([
            'name' => "required|string|max:100|unique:categories,title,{$id}",
            'description' => ['required', 'string', 'max:1000']
        ]);

        Category::where('id', '=', $id)->update([
            'title' => $data['name'],
            'description' => $data['description']
        ]);

        Alert::success('Updated Successfully', 'Your category has been updated');
        return back();
    }

    public function destroy($id)
    {
        Category::whereId($id)->delete();
        
        Alert::toast('Deleted Successfully', 'success');
        return back();
    }
}
