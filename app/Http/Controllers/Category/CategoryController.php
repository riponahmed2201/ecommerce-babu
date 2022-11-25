<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{

    public function getCategoryInfoById($id)
    {
        try {
            return Category::findOrFail($id);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function getCategoryList()
    {
        try {
            return Category::all();
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function index()
    {
        try {
            $categories = $this->getCategoryList();

            return view('backend.category.index', compact('categories'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function create()
    {
        try {
            return view('backend.category.form');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function edit($id)
    {
        try {
            $category = $this->getCategoryInfoById($id);

            return view('backend.category.form', compact('category'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function store(Request $request)
    {
        try {
            // validate the request input
            $this->validate($request, [
                'name' => 'required|unique:categories',
                'active' => 'required',
            ]);

            $category = new Category();
            $category->name = $request->name;
            $category->slug = Str::slug($request->name);
            $category->created_by = 1;
            $category->created_at = Carbon::now();
            $category->active = $request->active;
            $category->save();

            return redirect()->route('category.list')->with('success', 'Category created successfully!');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
