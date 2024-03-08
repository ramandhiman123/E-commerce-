<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Sub_category;
use App\Models\ParentCategory;


class CategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware(['permission:category-view'], ['only' => 'index']);
        $this->middleware(['permission:category-create'], ['only' => ['category_form', 'create', 'create_sub_category']]);
        $this->middleware(['permission:category-delete'], ['only' => 'deletecategory']);
    }

    public function sub_categories($id)
    {
        // $sub_category = Product::with('Sub_category')->get();
        $sub_category = product::where('sub_category_id', $id)->with('sub_category')->get();
        // dd($sub_category->toArray());
        return view('category.fashion-wear.mens-cloth', compact('sub_category'));
    }
    public function index()
    {
        $categories = ParentCategory::with('sub_category')->get();
        return view('category', compact('categories'));
    }

    public function category_form()
    {
        $parentcategory = ParentCategory::get();
        return view('new-category', compact('parentcategory'));
    }
    public function create(Request $request)
    {
        $parent_categ = new ParentCategory;
        $parent_categ->category_name = $request['parent_category'];
        $parent_categ->save();
        return redirect()->back()->with('success', 'Category created successfully');
    }

    public function deletecategory($id)
    {
        ParentCategory::destroy($id);
        return redirect()->back()->with('Delete', 'User Deleted Successfully!');
    }

    public function create_sub_category(Request $Request)
    {
        $sub_category = new Sub_category;
        $sub_category->parent_category_id = $Request['new-parent-category'];
        $sub_category->sub_category_type = $Request['sub_category'];
        $sub_category->save();

        return redirect()->back()->with('success', 'Category added successfully');
    }
}
        