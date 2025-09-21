<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    // Menampilkan daftar produk (Query Builder)
    public function index(Request $request)
    {
        $query = DB::table('products');

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('name', 'like', "%{$search}%");
        }

        $products = $query->orderBy('created_at', 'desc')->get();

        return view('products.index', compact('products'));
    }

    // Menampilkan form tambah produk
    public function create()
    {
        return view('products.create');
    }

    // Menyimpan produk baru (Eloquent ORM)
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]);

        Product::create($request->only('name', 'description', 'price', 'stock'));

        return redirect()->route('products.index')->with('success', 'Produk berhasil ditambahkan');
    }

    // Menampilkan form edit produk
    public function edit($id)
    {
        $product = Product::findOrFail($id);

        return view('products.edit', compact('product'));
    }

    // Mengupdate produk (Eloquent ORM)
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]);

        $product = Product::findOrFail($id);
        $product->update($request->only('name', 'description', 'price', 'stock'));

        return redirect()->route('products.index')->with('success', 'Produk berhasil diupdate');
    }

    // Menghapus produk
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Produk berhasil dihapus');
    }
}