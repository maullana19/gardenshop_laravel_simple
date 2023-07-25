{{-- ========= NAVBAR ONE ============ --}}
<nav class="py-1 bg-success border-bottom">
    <div class="container d-flex flex-wrap">
        <ul class="nav me-auto">
            <li class="nav-item"><a href="/" class="nav-link link-light  px-2" aria-current="page">Home</a>
            </li>
            <li class="nav-item"><a href="#" class="nav-link link-light px-2">Fitur</a></li>
            <li class="nav-item"><a href="/about" class="nav-link link-light px-2 ">Tentang</a>
            </li>
        </ul>
        <ul class="nav">
            @if (Auth::check())
                <div class="dropdown">
                    <button class="btn dropdown-toggle text-light" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        {{ Auth::user()->name }}
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item"
                                href="{{ route('profile_user', ['id' => Auth::user()->id]) }}">Profile</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li class="dropdown-item">
                            <form action="{{ route('logout') }}" method="POST" class="dropdown-item">
                                @csrf
                                <button type="submit" class="btn btn-sm">Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
            @else
                <li class="nav-item"><a href="/login" class="nav-link link-light px-2 bg-warning rounded">Login</a>
                </li>
                <li class="nav-item"><a href="/register" class="nav-link link-light px-2">Daftar</a></li>
            @endif

        </ul>
    </div>
</nav>

{{-- ========== NAVBAR TWO =========== --}}
<div class="py-3 shadow-sm mb-4 border-bottom">
    <div class="container ">
        <div class="navbar navbar-expand-sm justify-content-center">
            <a href="/" class="d-flex align-items-center mb-3 mb-lg-0 me-lg-auto text-dark text-decoration-none">
                <img width="32" height="30" src="https://img.icons8.com/ios-filled/50/40C057/beet.png"
                    alt="beet-logos" class="me-1" />
                <span class="fs-4  fw-bold">GardenShop</span>
            </a>

            <ul class="nav me-2">
                <li class="nav-item">
                    <a class="nav-link text-success" href="/">All</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-success" href="#">Sayuran Hijau</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-success" href="#">Buah</a>
                </li>
            </ul>
            {{-- =============== SEARCH PRODUCT ================ --}}
            <form action="{{ route('searchingProduct') }}" method="POST" class="col-12 col-lg-auto mb-lg-0 me-2"
                role="search">
                @csrf
                <input type="text" name="keyword" class="form-control bg-secondary bg-opacity-25 shadow-md"
                    placeholder="Cari..." aria-label="Search">
            </form>
            {{-- ================ CART PRODUCT ================== --}}
            <div class="btn-group dropstart">
                <button class="btn" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img width="30" height="28"
                        src="https://img.icons8.com/ios-filled/50/40C057/shopping-cart.png" alt="shopping-cart" />
                    <span class="badge rounded-pill text-bg-danger">{{ count((array) session('cart')) }}</span>
                </button>
                <ul class="dropdown-menu  shadow ">
                    @php
                        $total = 0;
                    @endphp
                    @if (session('cart'))
                        @foreach (session('cart') as $id => $details)
                            @php
                                $total += $details['price'] * $details['quantity'];
                            @endphp
                            <li class="dropdown-item mb-2 p-2">
                                @if (isset($details['image']))
                                    <img width="40" height="30"
                                        src="{{ asset('/img/products/' . $details['image']) }}" alt="gambar">
                                @endif
                                <p>Name :{{ $details['name'] }}</p>
                                <p>Qty : {{ $details['quantity'] }}</p>
                                <p>Price :{{ $details['price'] }}</p>
                                <p>Total {{ $total }}</p>



                            </li>
                            <li class="dropdown-item">
                                <form class="float-end" method="POST" action="{{ route('deleteFromCart', $id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm btn-closer">Remove</button>
                                </form>
                            </li>
                        @endforeach
                        <li class="dropdown-item mt-2"><a href="/orders" class="btn btn-warning">checkout</a></li>
                    @else
                        <div class="text-center">
                            <img width="26" height="24"
                                src="https://img.icons8.com/pulsar-color/48/image-not-avialable.png"
                                alt="image-not-avialable" />
                            <p class="">Your cart is empty !</p>
                        </div>

                    @endif
                </ul>
            </div>
        </div>

    </div>
</div>
