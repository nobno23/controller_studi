@extends('layouts.app')

@section('content')
<h1>Daftar Produk</h1>

<a href="{{ route('products.create') }}">Tambah Produk</a>

@if(session('success'))
    <div style="color: green;">{{ session('success') }}</div>
@endif

<form method="GET" action="{{ route('products.index') }}">
    <input type="text" name="search" placeholder="Cari produk..." value="{{ request('search') }}">
    <button type="submit">Cari</button>
</form>

<table border="1" cellpadding="10" cellspacing="0" style="margin-top: 10px;">
    <thead>
        <tr>
            <th>Nama</th>
            <th>Deskripsi</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
    @forelse($products as $product)
        <tr>
            <td>{{ $product->name }}</td>
            <td>{{ $product->description ?? '-' }}</td>
            <td>Rp {{ number_format($product->price, 2) }}</td>
            <td>{{ $product->stock }}</td>
            <td>
                <a href="{{ route('products.edit', $product->id) }}">Edit</a> |
                <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('Yakin ingin hapus produk ini?')">Hapus</button>
                </form>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="5">Data produk tidak ditemukan.</td>
        </tr>
    @endforelse
    </tbody>
</table>
@endsection