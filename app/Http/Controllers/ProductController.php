<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function index(Request $request)
{
    $product = Product::active()->get();

    $categories = Category::all();

    // new product query
    $products = (new Product())->newQuery();
    $searchQuery = $request->query('q');

    // Filter by category if a category is selected
    $selectedCategory = $request->query('category');
    if ($selectedCategory) {
        $products = $products->whereHas('categories', function ($query) use ($selectedCategory) {
            $query->where('name', $selectedCategory);
        });
    }

    // Apply search filter if a search query is present
    if ($searchQuery) {
        $products = $products->where(function ($query) use ($searchQuery) {
            $query->where('title', 'like', '%' . $searchQuery . '%')
                ->orWhere('description', 'like', '%' . $searchQuery . '%');
        });
    }

    $products = $products->orderBy('id', 'DESC')->paginate(12);

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
