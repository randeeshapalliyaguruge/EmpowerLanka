<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {

        $categories = Category::orderBy('created_at', 'desc')->paginate(10);

        return view('admin.category.index', [
            'categories' => $categories
        ]);
    }

    public function create()
    {
        return view('admin.category.form', [
            'category' => new Category()
        ]);
    }

    public function edit(Category $category)
    {
        return view('admin.category.form', [
            'category' => $category
        ]);
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('admin.category.index');
    }
}
