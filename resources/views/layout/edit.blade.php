@extends('layouts.app')

@section('content')
<h1>Edit Produk</h1>

@if ($errors->any())
    <div style="color: red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('products.update', $product->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Nama Produk:</label><br>
    <input type="text" name="name" value="{{ old('name', $product->name) }}" required><br><br>

    <label>Deskripsi:</label><br>
    <textarea name="description">{{ old('description', $product->description) }}</textarea><br><br>

    <label>Harga:</label><br>
    <input type="number" name="price" value="{{ old('price', $product->price) }}" required><br><br>

    <label>Stok:</label><br>
    <input type="number" name="stock" value="{{ old('stock', $product->stock) }}" required><br><br>

    <button type="submit">Update</button>
    <a href="{{ route('products.index') }}">Batal</a>
</form>
@endsection