<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->get();
        return view('products.index', compact('products'));
    }

    public function show($id)
    {
        $product = Product::with('category')->findOrFail($id);
        return view('products.show', compact('product'));
    }

     public function dashboard()
    {
        $user = auth()->user();

        if ($user->role === 'admin') {
            $products = Product::all();
            $users = User::all();
            return view('dashboard.admin', compact('user', 'products', 'users'));
        } else {
            $products = Product::all();
            return view('dashboard.user', compact('user', 'products'));
        }
    }
}