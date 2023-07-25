@extends('layouts/frontend/layoutwrap')

@section('title', 'Home')

@section('content')
    <div class="container">
        <div class=" p-4 rounded">
            <h1>Sayuran Hijau</h1>
            <p>Siap kirim jabodetabek <i><img width="30" height="28"
                        src="https://img.icons8.com/ios-filled/50/FAB005/delivery--v1.png" alt="delivery--v1" /></i></p>

        </div>
        <div class="row gap-2">

            @include('layouts/frontend/components/home/section_one')
        </div>
        <div>
            @include('layouts/frontend/components/home/section_two')
        </div>
    </div>
@endsection
