@extends('layouts/main')

{{-- header --}}
@section('header')
    @include('partitions/navbar')
@endsection

{{-- content --}}
@section('content')
    <div class="content mt-4">
        <div class="row">
            <div class="col-4">
                <img src="/img/egrownomy.png" alt="" class="img-fluid">
            </div>
            <div class="col-6">
                <form action="/product/update/{{ $product->id }}" method="post" id="product-insertion-form">
                    @csrf
                    <h3>Input data produk</h3>
                    <div class="mb-2">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ $product->name }}" required>
                        @error('name')
                        <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <label for="description" class="form-label">Deskripsi</label>
                        <textarea class="form-control" name="description" id="description" cols="25" rows="4" form="product-insertion-form" required>{{ $product->description }}</textarea>
                        @error('description')
                        <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <label for="price" class="form-label">Harga</label>
                        <input type="text" class="form-control" name="price" id="price" value="{{ $product->price }}" required>
                        @error('price')
                        <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <label for="stock" class="form-label">Stok</label>
                        <input type="text" class="form-control" name="stock" id="stock" value="{{ $product->stock }}" required>
                        @error('stock')
                        <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <label for="category" class="form-label">Kategori</label>
                        <input list="categories" class="form-control" name="category" id="category" value="{{ $product->category }}">
                            <datalist id="categories">
                                <option value="buah-buahan">
                                <option value="sayur-sayuran">
                                <option value="biji-bijian">
                                <option value="umbi-umbian">
                                <option value="rempah-rempah">
                            </datalist>
                    </div>    
                    <div class="mb-2">
                        <label for="weight" class="form-label">Weight</label>
                        <input type="text" class="form-control" name="weight" id="weight" value="{{ $product->weight }}" required>
                        @error('weight')
                        <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>
                    <input type="hidden" name="supplier" value="{{ auth()->user()->username }}">
                    <div class="d-grid mb-5">
                        <button type="submit" class="submit-btn">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

{{-- footer --}}
@section('footer')
    <h3>Footer</h3>
    @include('partitions/footer')
@endsection