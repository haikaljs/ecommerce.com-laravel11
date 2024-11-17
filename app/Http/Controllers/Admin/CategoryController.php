<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Auth;

class CategoryController extends Controller
{
    public function index(){

        $data['getRecord'] = Category::getRecord();
        $data['header_title'] = 'Category';
        return view('admin.category.index', $data);
    }
    
    public function create(){
        $data['header_title'] = 'Create new category';
        return view('admin.category.create', $data);
    }

    public function store(Request $request){

        $request->validate([
            'slug' => 'required|unique:categories'
        ]);

        $category = new Category();
        $category->name = trim($request->name);
        $category->status = trim($request->status);
        $category->slug = trim($request->slug);
        $category->meta_title = trim($request->meta_title);
        $category->meta_descriptions = trim($request->meta_descriptions);
        $category->meta_keywords = trim($request->meta_keywords);
        $category->created_by = Auth::user()->id;

        $category->save();

        return redirect()->route('admin.category.index')->with('success', 'Category successfully created');


    }

    public function edit($id){
        $data['header_title'] = 'Edit category';
        $data['getRecord'] = Category::getSingle($id);
        return view('admin.category.edit', $data);
    }

    public function update(Request $request, $id){
        

        $request->validate([
            'slug' => 'required|unique:categories,slug,'.$id
        ]);

        $category = Category::getSingle($id);
        $category->name = trim($request->name);
        $category->status = trim($request->status);
        $category->slug = trim($request->slug);
        $category->meta_title = trim($request->meta_title);
        $category->meta_descriptions = trim($request->meta_descriptions);
        $category->meta_keywords = trim($request->meta_keywords);
        $category->created_by = Auth::user()->id;

        $category->save();

        return redirect()->route('admin.index')->with('success', 'Admin successfully updated');
    }

    public function delete($id){
        $category = Category::getSingle($id);
        $category->is_delete = 1;
        $category->save();

        return redirect()->route('admin.category.index')->with('success', 'Category successfully deleted');

    }
}
