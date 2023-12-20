<?php

namespace App\Http\Controllers;

use App\Models\DetailCart;
use App\Models\Order;
use App\Models\Cart;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $order = Order::where('id_user', auth()->user()->id_user)->latest()->first();
        return view('UserView.order', compact('order'));
    }
    public function store()
    {
        $detailCarts = DetailCart::whereHas('cart', function ($query) {
            $query->where('id_user', auth()->user()->id_user)
                ->where('status', 0);
        })->get();
        $carts = Cart::where('id_user', auth()->user()->id_user)
            ->where('status', 0)
            ->first();
        $carts->status = 1;
        $carts->save();
        
        $total = 0;
        foreach ($detailCarts as $detailCart) {
            $total += $detailCart->quantity * $detailCart->menu->price;
        }
        $total = $total * 1.1;
        Order::create([
            'id_user' => auth()->user()->id_user,
            'id_cart' => $carts->id,
            'total' => $total,
            'status' => 'Process'
        ]);
        return redirect()->route('orderDetail')->with([
            'success' => 'Pesanan Berhasil Dibuat!'
        ]);
    }
}