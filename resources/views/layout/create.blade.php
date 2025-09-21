@extends('layouts.app')

@section('content')
<h1>Tambah Produk Baru</h1>

@if ($errors->any())
    <div style="color: red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('products.store') }}" method="POST">
    @csrf
    <label>Nama Produk:</label><br>
    <input type="text" name="name" value="{{ old('name') }}" required><br><br>

    <label>Deskripsi:</label><br>
    <textarea name="description">{{ old('description') }}</textarea><br><br>

    <label>Harga:</label><br>
    <input type="number" name="price" value="{{ old('price') }}" required><br><br>

    <label>Stok:</label><br>
    <input type="number" name="stock" value="{{ old('stock') }}" required><br><br>

    <button type="submit">Simpan</button>
    <a href="{{ route('products.index') }}">Batal</a>
</form>
@endsection