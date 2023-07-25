<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    // SHOW PRODUCT
    public function showProduct()
    {
        $products = Product::paginate(6);

        return view('home', ['products' => $products]);
    }

    // SEARCHING PRODUCT
    public function searchingProduct(Request $request)
    {
        $keyword = $request->input('keyword');
        $productz = Product::where('name', 'like', '%' . $keyword . '%')->get();
        return view('home', compact('productz'));
    }

    // DETAIL PRODUCT
    public function detailProduct($id)
    {
        try {
            $products = Product::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            abort(404);
        }

        return view('detail_product', compact('products'));
    }

    // ADD TO CART
    public function addToCart($id)
    {
        $product = Product::findOrFail($id);

        // Middleware 
        if (!Auth::check()) {
            return redirect('login')->with('error', 'Silakan login terlebih dahulu');
        }


        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            $cart[$id]['quantity'] += 1;
        } else {
            $cart[$id] = [
                "name" => $product->name,
                "image" => $product->image,
                "quantity" => 1,
                "price" => $product->price,
                "description" => $product->description,
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'add to cart !');
    }

    // DELETE OR REMOVE
    public function deleteFromCart($id)
    {
        $cart = Session::get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            Session::put('cart', $cart);
            return redirect('/')->with('success', 'Produk Removed.');
        }

        return redirect('/')->with('error', 'Product Not Found');
    }
}
