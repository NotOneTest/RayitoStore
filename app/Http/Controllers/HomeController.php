<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $featuredProducts = Product::active()
            ->featured()
            ->with('category', 'tags')
            ->take(8)
            ->get();

        $saleProducts = Product::active()
            ->onSale()
            ->with('category', 'tags')
            ->take(4)
            ->get();

        $newProducts = Product::active()
            ->new()
            ->with('category', 'tags')
            ->take(4)
            ->get();

        $categories = Category::active()
            ->withCount('products')
            ->get();

        $search = $request->get('search');
        $products = null;

        if ($search) {
            $products = Product::active()
                ->where('name', 'like', "%{$search}%")
                ->orWhere('description', 'like', "%{$search}%")
                ->with('category', 'tags')
                ->paginate(12);
        }

        return view('home.index', compact(
            'featuredProducts',
            'saleProducts',
            'newProducts',
            'categories',
            'search',
            'products'
        ));
    }
}
