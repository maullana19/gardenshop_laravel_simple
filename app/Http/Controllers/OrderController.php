<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
  public function showOrderPage()
  {
    $getCartItems = Session::get('cart');

    return view('orders', compact('getCartItems'));
  }

  public function checkoutTransfer(Request $request)
  {
    // Proses checkout dan metode pembayaran dengan transfer bank
    $bank = $request->input('bank');
    // Lakukan tindakan sesuai dengan metode pembayaran transfer bank yang dipilih

    // Setelah pembayaran berhasil, hapus data keranjang dari session
    Session::forget('cart');

    // Redirect atau lakukan tindakan lain setelah pembayaran berhasil
    return redirect('orders')->with('success', 'Pembayaran berhasil!');
  }
}
