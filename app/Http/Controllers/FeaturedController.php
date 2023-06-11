<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Featured;
use App\Models\Category;

class FeaturedController extends Controller
{
    public function index(Request $request)
    {
        $searchQuery = $request->query('q');
            $selectedCategory = $request->query('category');

            $featured = Featured::query();

            // Filter by category if a category is selected
            if ($selectedCategory) {
                $category = Category::where('name', $selectedCategory)->first();
                if ($category) {
                    $featured = $featured->where('category_id', $category->id);
                }
            }

             // Apply search filter if a search query is present
             $searchQuery = $request->query('q');
             if ($searchQuery) {
                 $featured = $featured->where(function ($query) use ($searchQuery) {
                     $query->where('title', 'like', '%' . $searchQuery . '%')
                         ->orWhere('description', 'like', '%' . $searchQuery . '%');
                 });
             }

            $featured = $featured->orderBy('id', 'DESC')->paginate(6);

            $categories = Category::all();

            return view('featured.index', [
                'featured' => $featured,
                'searchQuery' => $searchQuery,
                'selectedCategory' => $selectedCategory,
                'categories' => $categories,
            ]);
    }

        public function show(Featured $featured){

            //dd($featured);
            $featured->increment('view_count');


            return view('featured.show', [
                'featured' => $featured
            ]);
        }
}
