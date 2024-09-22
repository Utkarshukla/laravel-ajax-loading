<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $products = Product::paginate(12); // Paginate products
        return view('welcome', compact('categories', 'products'));
    }

    public function getCategories()
    {
        $categories = Category::all();  // Fetch all categories from the database
        return response()->json($categories);  // Return JSON response
    }
    public function getProducts(Request $request)
    {
        $perPage = $request->input('per_page', 10);
        $products = Product::paginate($perPage);
        return response()->json($products);
    }

    public function getProductsByCategory($slug, Request $request)
    {
        $perPage = $request->input('per_page', 10);
        $category = Category::where('slug', $slug)->firstOrFail(); // Fetch category by slug

        $products = Product::where('category_id', $category->id)->paginate($perPage);
        return response()->json($products);
    }


    // public function searchProducts(Request $request)
    // {
    //     $query = $request->input('query');
    //     $perPage = $request->input('per_page', 10);
    //     $products = Product::where('name', 'LIKE', "%{$query}%") 
    //         ->paginate($perPage);

    //     return response()->json($products);
    // }


    public function searchProducts(Request $request)
{
    $query = $request->input('query');
    $perPage = $request->input('per_page', 10);

    // Start with a query builder instead of fetching all products
    $productQuery = Product::query(); // Use query() instead of all()

    if (!empty($query)) {
        $searchWords = preg_split('/\s+/', $query);
        $regexPattern = implode('.*', array_map(function ($word) {
            return "(?=.*" . preg_quote($word) . ")";
        }, $searchWords));

        $productQuery->where(function ($q) use ($regexPattern) {
            $q->where('name', 'REGEXP', $regexPattern)
              ->orWhere('slug', 'REGEXP', $regexPattern);
        });
    }

    // Paginate results
    $products = $productQuery->paginate($perPage);

    return response()->json($products);
}

}
