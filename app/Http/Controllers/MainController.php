<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class MainController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $categorySlug = $request->input('category');

        // Fetch categories
        $categories = Category::all();

        // Query products based on filters
        $productsQuery = Product::query()->with('category');

        if ($search) {
            $productsQuery->where(function($query) use ($search) {
                $query->where('name', 'LIKE', "%{$search}%")
                      ->orWhere('description', 'LIKE', "%{$search}%");
            });
        }

        if ($categorySlug) {
            $productsQuery->whereHas('category', function($query) use ($categorySlug) {
                $query->where('slug', $categorySlug);
            });
        }

        $products = $productsQuery->paginate(10);

        return response()->json( [
            'categories' => $categories,
            'products' => $products,
            'filters' => [
                'search' => $search,
                'category' => $categorySlug,
            ],
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
        ]);
    }
}
