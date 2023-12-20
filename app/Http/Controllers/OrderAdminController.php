<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
class OrderAdminController extends Controller
{
    public function index()
    {
        $order = Order::all();
        return view('admin/orderManagement', [
            'order' => $order
        ]);
    }
    public function edit(Request $request, $id)
    {
        try {
            
            $order = Order::find($id);
            $order->status = $request->status;
            $order->save();
            return redirect()->route('order.index')->with([
                'success' => 'Data Berhasil Diubah!',
                'data' => $order
            ]);
        } catch (\Throwable $th) {
            return redirect()->route('order.index')->with([
                'error' => 'Data Gagal Diubah!',
                'data' => $order
            ]);
        }

    }
}
