<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function index(Request $request)
{
    $searchQuery = $request->query('q');
        $selectedCategory = $request->query('category');

        $products = Product::query();

        // Filter by category if a category is selected
        if ($selectedCategory) {
            $category = Category::where('name', $selectedCategory)->first();
            if ($category) {
                $products = $products->where('category_id', $category->id);
            }
        }

         // Apply search filter if a search query is present
         $searchQuery = $request->query('q');
         if ($searchQuery) {
             $products = $products->where(function ($query) use ($searchQuery) {
                 $query->where('title', 'like', '%' . $searchQuery . '%')
                     ->orWhere('description', 'like', '%' . $searchQuery . '%');
             });
         }

        $products = $products->orderBy('id', 'DESC')->paginate(12);

        $categories = Category::all();

        return view('product.index', [
            'products' => $products,
            'searchQuery' => $searchQuery,
            'selectedCategory' => $selectedCategory,
            'categories' => $categories,
        ]);
}

    public function show(Product $product){

        //dd($product);
        $product->increment('view_count');


        return view('product.show', [
            'product' => $product
        ]);
    }
}
