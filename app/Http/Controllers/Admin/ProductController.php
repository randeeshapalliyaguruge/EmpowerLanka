<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use App\Models\User;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $products = (new Product())->newQuery();

         if (auth()->user()->hasRole('user')) {
            $products = $products->where('user_id', auth()->user()->id);
         }

        return view('admin.product.index', [
            'products' => $products->orderBy('id', 'DESC')->paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();

        return view('admin.product.form', [
            'categories' => $categories,
            'product' => new Product()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $validated = $request->validated();

        // check if image is present and save it
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->storePublicly('products', 'public');
        }

        $product = (new Product())->create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'number' => $validated['number'],
            'price' => $validated['price'],
            'image' => $validated['image'] ?? null,
            'status' => $validated['status'] ?? false,
            'user_id' => auth()->user()->id ?? null
        ]);

        // check if the user has the role "admin" or user and redirect the users to the relevant pages
        if (auth()->user()->hasRole('admin')) {
            return redirect()->route('admin.product.index');
        }else{
            return redirect()->route('user.product.index');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        // R - CRUD
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::all();

        if(auth()->user()->id == $product->user_id){
            return view('admin.product.form', [
                        'product' => $product,
                        'categories' => $categories,
                    ]);
        }

        //throw new \Exception("You don't have permission to edit this product");
        abort(403, "You don't have permission to edit this product .");

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $validated = $request->validated();

        // check if image is present and save it
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->storePublicly('products', 'public');
        }

        $product->update([
            'title' => $validated['title'],
            'category_id' => $validated['category_id'],
            'description' => $validated['description'],
            'number' => $validated['number'],
            'price' => $validated['price'],
            'image' => $validated['image'] ?? $product->image,
            'status' => $validated['status'] ?? false
        ]);

        // return redirect()->route('admin.product.index');
        if (auth()->user()->hasRole('admin')) {
            return redirect()->route('admin.product.index');
        }else{
            return redirect()->route('user.product.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        // D - CRUD
        $product->delete();

        if (auth()->user()->hasRole('admin')) {
            return redirect()->route('admin.product.index');
        }else{
            return redirect()->route('user.product.index');
        }
    }
}
