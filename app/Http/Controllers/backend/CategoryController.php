<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::orderBy('created_at')->get();

        return view('backend.categories.index',['categories'=> $categories]);
    }

    public function create(){
        return view('backend.categories.create');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'icon' => 'required'
        ]);

        $category =  new Category();
        $category->name = $request->name;
        $category->icon = $request->icon;

        $category->save();

        return to_route('categories.index')->with('success','Category Created Successfully');

    }

    public function edit(Category $category){
        return view('backend.categories.edit',['category' => $category]);
    }

    public function update(Request $request,Category $category){
        $request->validate([
            'name' => 'required',
            'icon' => 'required'
        ]);

        $category->name = $request->name;
        $category->icon = $request->icon;

        $category->save();

        return to_route('categories.index')->with('success','Category Updated Successfully');
    }

    public function delete(Category $category){
        $category->delete();


        return to_route('categories.index')->with('success','Category Delete Successfully');
    }
}
