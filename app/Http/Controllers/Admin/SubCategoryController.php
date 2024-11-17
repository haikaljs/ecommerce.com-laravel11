<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class SubCategoryController extends Controller
{
    public function index(){

        $data['getRecord'] = SubCategory::getRecord();
        $data['header_title'] = 'Sub category';
        return view('admin.subcategory.index', $data);
    }

    public function create(){
        $data['getCategory'] = Category::getRecord();
        $data['header_title'] = 'Create new subcategory';
        return view('admin.subcategory.create', $data);
    }

    public function store(Request $request){

        $request->validate([
            'slug' => 'required|unique:categories'
        ]);

        $category = new SubCategory();
        $category->category_id = $request->category_id;
        $category->name = trim($request->name);
        $category->status = trim($request->status);
        $category->slug = trim($request->slug);
        $category->meta_title = trim($request->meta_title);
        $category->meta_descriptions = trim($request->meta_descriptions);
        $category->meta_keywords = trim($request->meta_keywords);
        $category->created_by = Auth::user()->id;

        $category->save();

        return redirect()->route('admin.subcategory.index')->with('success', 'Sub category successfully created');


    }

    public function edit($id){
        $data['getCategory'] = Category::getRecord();
        $data['header_title'] = 'Edit sub category';
        $data['getRecord'] = SubCategory::getSingle($id);
        return view('admin.subcategory.edit', $data);
    }
    

    public function update(Request $request, $id){
        

        $request->validate([
            'slug' => 'required|unique:subcategories,slug,'.$id
        ]);


        $subcategory = SubCategory::getSingle($id);
        $subcategory->category_id = intval($request->category_id);
        $subcategory->name = trim($request->name);
        $subcategory->status = trim($request->status);
        $subcategory->slug = trim($request->slug);
        $subcategory->meta_title = trim($request->meta_title);
        $subcategory->meta_descriptions = trim($request->meta_descriptions);
        $subcategory->meta_keywords = trim($request->meta_keywords);
        $subcategory->save();

        return redirect()->route('admin.subcategory.index')->with('success', 'Sub category successfully updated');
    }

    
    public function delete($id){
        $subcategory = SubCategory::getSingle($id);
        $subcategory->is_delete = 1;
        $subcategory->save();

        return redirect()->route('admin.subcategory.index')->with('success', 'Sub category successfully deleted');

    }
}
