{{-- harga total dan berat total satuan produk --}}
@php
$totalWeight = 0;
$totalPrice = 0;
if (count($products) != 0) {
    foreach ($products as $product) {
        $totalPrice += $product->price;
        $totalWeight += $product->weight;
    }
}
@endphp

@extends('layouts/main')

{{-- header --}}
@section('header')
    @include('partitions/navbar')
@endsection

{{-- content --}}
@section('content')

    <form action="/cart/checkout" method="post" class="cart-show row justify-content-center  mt-5">
        @csrf
        <div class="products col-9">

            {{-- intro --}}
            @if (count($products) == 0)
                <div class="empty-cart">
                    <img src="{{ asset('img/egrownomy.png') }}" alt="egrownomy">
                    <h3>Keranjangmu kosong</h3>
                    <span>Tengkulak no E-Grownomy yes!</span>
                    <a class="btn btn-success" href="/" role="button">Belanja sekarang</a>
                </div>
            @else
                <h3 class="mb-5 fw-bold">Cart</h3>
            @endif

            {{-- suppliers --}}
            @for ($i = 0; $i < count($suppliers); $i++)
                @php $supplier = $suppliers[$i] @endphp
                <span class="cart-supplier__header">
                    <img src="https://avatars.dicebear.com/api/gridy/{{ $supplier->username }}.svg"
                        alt="{{ $supplier->username }}">
                    {{ $supplier->username }}
                </span>
                <input type="hidden" name="suppliers[{{ $i }}][id]" value="{{ $supplier->id }}">
                <input type="hidden" name="suppliers[{{ $i }}][username]" value="{{ $supplier->username }}">
                <input type="hidden" name="suppliers[{{ $i }}][fullname]" value="{{ $supplier->fullname }}">
                <input type="hidden" name="suppliers[{{ $i }}][profile_picture]"
                    value="{{ $supplier->profile_picture }}">

                {{-- products --}}
                @for ($j = 0; $j < count($products); $j++)
                    @php $product = $products[$j] @endphp
                    @if ($product->supplier == $supplier->username)
                        <div class="row mt-4 cart-item-card">
                            <div class="col-3 cart-img-wrapper">
                                <img src="{{ asset('img/tumbnail.png') }}" alt="{{ $product->name }}">
                            </div>
                            <div class="col-8">
                                <div class="row">
                                    <div class="col cart-item-content">
                                        <p>{{ $product->name }} (<span class="product-weight">{{ $product->weight }}
                                                gram</span>)</p>
                                        <p class="remaining-stock">Remaining {{ $product->stock }}</p>
                                        <p class="fw-bold">Rp. <span
                                                class="product-price">{{ $product->price }}</span></p>
                                        <div class="quantity-wrapper">
                                            <label
                                                for="quantity-{{ $i }}-{{ $j }}">Quantity:</label>
                                            <input type="number"
                                                name="suppliers[{{ $i }}][products][{{ $j }}][quantity]"
                                                id="quantity-{{ $i }}-{{ $j }}"
                                                class="product-quantity" value="1" min="1" max="{{ $product->stock }}">
                                        </div>
                                        <div class="product-note">
                                            <label class="form-label"
                                                for="note-{{ $i }}-{{ $j }}">Add Note</label>
                                            <textarea class="form-control d-none"
                                                id="note-{{ $i }}-{{ $j }}"
                                                name="suppliers[{{ $i }}][products][{{ $j }}][note]"
                                                placeholder="leave a note">
                                                                </textarea>
                                        </div>
                                        <input type="hidden"
                                            name="suppliers[{{ $i }}][products][{{ $j }}][id]"
                                            value="{{ $product->id }}">
                                        <input type="hidden"
                                            name="suppliers[{{ $i }}][products][{{ $j }}][name]"
                                            value="{{ $product->name }}">
                                        <input type="hidden"
                                            name="suppliers[{{ $i }}][products][{{ $j }}][price]"
                                            value="{{ $product->price }}">
                                        <input type="hidden"
                                            name="suppliers[{{ $i }}][products][{{ $j }}][stock]"
                                            value="{{ $product->stock }}">
                                        <input type="hidden"
                                            name="suppliers[{{ $i }}][products][{{ $j }}][weight]"
                                            value="{{ $product->weight }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-1 d-flex justify-content-center align-items-center">
                                <a href="/cart/destroy/{{ $product->cart_id }}" class="delete-cart-item__btn">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </div>
                        </div>
                    @endif
                @endfor
                <hr class="supplier-splitter">
            @endfor
        </div>

        {{-- summary --}}
        @if (count($products) != 0)
            <div class="col-3">
                <div class="order">
                    <h5 class="mb-4">Total belanja</h5>
                    <div class="cart-label__wrapper">
                        <p>Total item</p>
                        <p class="summary-item">{{ count($products) }}</p>
                    </div>
                    <div class="cart-label__wrapper">
                        <p>Total weight</p>
                        <p class="summary-weight">{{ $totalWeight }} gram</p>
                    </div>
                    <div class="cart-label__wrapper">
                        <p>Total price</p>
                        <p class="summary-price">Rp {{ $totalPrice }}</p>
                    </div>
                    <button type="submit" class="btn btn-success" role="button">Pesan sekarang</button>
                </div>
            </div>
        @endif

    </form>


@endsection

{{-- footer --}}
@section('footer')
    @include('partitions/footer')
@endsection
