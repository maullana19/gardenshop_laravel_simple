@extends('layouts/frontend/layoutwrap')

@section('title', 'Profile')

@section('content')

    <div class="container">
        <form action="#">
            <div>
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="{{ Auth::user()->name }}"
                    readonly>
            </div>
            <div>
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control"
                    placeholder="{{ Auth::user()->email }}" readonly>
            </div>
            <div>

                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" placeholder="{{ Auth::user()->password }}"
                    readonly>
            </div>
        </form>
    </div>

@endsection
