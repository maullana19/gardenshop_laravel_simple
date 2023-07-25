@extends('/layouts/frontend/layoutwrap')

@section('title', 'Detail Order')



@section('content')
    <main class="container">
        <h5>Form Pembayaran</h5>
        <hr>
        <table class="table">
            @if (!empty(Session::get('cart')))
                <thead>
                    <th>Name</th>
                    <th>Price</th>
                    <th>QTY</th>
                    <th>Action</th>
                </thead>
                @php
                    $total_amount = 0; // Inisialisasi total harga
                @endphp
                @foreach (Session::get('cart') as $item)
                    <tr>
                        <td>{{ $item['name'] }}</td>
                        <td>{{ $item['price'] }}</td>
                        <td>{{ $item['quantity'] }}</td>
                        @php
                            $total_amount += $item['price'] * $item['quantity']; // Tambahkan harga produk * kuantitasnya ke total harga
                        @endphp
                    </tr>
                @endforeach
                <thead>
                    <th>TOTAL</th>
                    <td>{{ $total_amount }}</td> <!-- Tampilkan total harga di luar perulangan -->
                </thead>
            @else
                <div>
                    <h4>Produk Mu Siap Dikirim</h4>
                    <p>Terima Kasih Selamat Belanja Kembali</p>
                </div>
                <a href="/" class="btn btn-warning">Kembali Belanja</a>
            @endif
        </table>
        <hr />
        <div>


            <h4>Pilih Bank Tujuan:</h4>
            <form action="{{ route('checkoutTransfer') }}" method="POST">
                @csrf
                <select name="bank">
                    <option value="BCA">BCA - 7654545xxx</option>
                    <option value="BRI">BRI - 3456345xxx</option>
                    <!-- Tambahkan pilihan bank lain sesuai kebutuhan -->
                </select>
                <hr>
                <button type="submit" class="btn btn-primary btn-sm">Lanjutkan Pembayaran</button>
            </form>
        </div>
    </main>

@endsection
