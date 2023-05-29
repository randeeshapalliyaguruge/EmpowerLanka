<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(){

        // new product query
        $products = (new Product())->newQuery();

            return view('product.index', [
                'products' => $products->orderBy('id', 'DESC')->paginate(10)
            ]);
    }

    public function show(Product $product){

        dd($product);
        return view('product.show', [
            'product' => $product
        ]);
    }
}
