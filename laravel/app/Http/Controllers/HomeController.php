<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();

        $query = Product::with('category');

        if ($search = $request->search) {
            $query->where('name', 'like', "%$search%");
        }

        if ($category = $request->category) {
            $query->where('category_id', $category);
        }

        match ($request->sort) {
            'price' => $query->orderBy('price'),
            'name'  => $query->orderBy('name'),
            'id'    => $query->orderBy('id'),
            default => $query->orderByDesc('id'),
        };

        return view('home', [
            'products' => $query->get(),
            'categories' => $categories,
        ]);
    }

    public function show(string $slug)
    {
        $product = Product::with('category')
            ->where('slug', $slug)
            ->firstOrFail();

        return view('admin.products.show', compact('product'));
    }
}
