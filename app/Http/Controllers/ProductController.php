<?php

namespace App\Http\Controllers;

use App\Models\Product; // Jika Anda menggunakan model Product
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all(); // Mengambil semua produk
        return view('gtgallery.index', compact('products')); // Ganti dengan view yang sesuai
    }

    // Tambahkan metode lain sesuai kebutuhan (create, store, edit, update, destroy, dll.)
}