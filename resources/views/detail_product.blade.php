@extends('layouts/frontend/layoutwrap')

@section('title', 'detail product')


@section('content')
    {{-- =========== DETAIL PRODUCT DISPLAY =============== --}}
    <div class="container">
        <div class="row">
            <div class="col">

                <img src="{{ $products->image_url }}" alt="gambar-product" width="540" height="430">
                <h1>{{ $products->name }}</h1>
                <p>{{ $products->description }}</p>
                <h4>Rp.{{ $products->price }}</h4>
                <hr />
                <a href="/" class="btn btn-success">Kembali</a>
            </div>
        </div>
    </div>
@endsection
