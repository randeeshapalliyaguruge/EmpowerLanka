<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreFeaturedRequest;
use App\Http\Requests\UpdateFeaturedRequest;
use App\Models\Featured;
use App\Models\User;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class FeaturedController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $featured = (new Featured())->newQuery();

         if (auth()->user()->hasRole('user')) {
            $featured = $featured->where('user_id', auth()->user()->id);
         }

        return view('admin.featured.index', [
            'featured' => $featured->orderBy('id', 'DESC')->paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();

        return view('admin.featured.form', [
            'categories' => $categories,
            'featured' => new Featured()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFeaturedRequest $request)
    {
        $validated = $request->validated();

        // check if image is present and save it
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->storePublicly('featured', 'public');
        }

        $featured = (new Featured())->create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'category_id' => $validated['category_id'],
            'number' => $validated['number'],
            'price' => $validated['price'],
            'image' => $validated['image'] ?? null,
            'status' => $validated['status'] ?? false,
            'user_id' => auth()->user()->id ?? null
        ]);

        // check if the user has the role "admin" or user and redirect the users to the relevant pages
        if (auth()->user()->hasRole('admin')) {
            return redirect()->route('admin.featured.index');
        }else{
            return redirect()->route('user.featured.index');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Featured $featured)
    {
        // R - CRUD
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Featured $featured)
    {
        $categories = Category::all();

        if(auth()->user()->id == $featured->user_id){
            return view('admin.featured.form', [
                        'featured' => $featured,
                        'categories' => $categories,
                    ]);
        }

        //throw new \Exception("You don't have permission to edit this featured");
        abort(403, "You don't have permission to edit this featured .");

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFeaturedRequest $request, Featured $featured)
    {
        $validated = $request->validated();

        // check if image is present and save it
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->storePublicly('featured', 'public');
        }

        $featured->update([
            'title' => $validated['title'],
            'category_id' => $validated['category_id'],
            'description' => $validated['description'],
            'number' => $validated['number'],
            'price' => $validated['price'],
            'image' => $validated['image'] ?? $featured->image,
            'status' => $validated['status'] ?? false
        ]);

        // return redirect()->route('admin.featured.index');
        if (auth()->user()->hasRole('admin')) {
            return redirect()->route('admin.featured.index');
        }else{
            return redirect()->route('user.featured.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Featured $featured)
    {
        // D - CRUD
        $featured->delete();

        if (auth()->user()->hasRole('admin')) {
            return redirect()->route('admin.featured.index');
        }else{
            return redirect()->route('user.featured.index');
        }
    }

}
