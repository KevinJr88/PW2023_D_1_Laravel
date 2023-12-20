<?php

namespace App\Http\Controllers;

use App\Models\DetailCart;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartsController extends Controller
{
    public function index()
    {
        $detailCarts = DetailCart::whereHas('cart', function ($query) {
            $query->where('id_user', auth()->user()->id_user)
                ->where('status', 0);
        })->get();
        return view('UserView.cart', compact('detailCarts'));
    }
    public function updateQuantity(Request $request)
    {
        // Validate the request data as needed

        // Update the quantity in the database
        $detailCart = DetailCart::find($request->input('detailCartId'));
        $detailCart->quantity = $request->input('quantity');
        $detailCart->save();

        // Return a response if needed
        return response()->json(['message' => 'Quantity updated successfully',
                                'data' => $detailCart]);
    }
    public function destroy($id)
    {
        $detailCart = DetailCart::find($id);
        $detailCart->delete();
        return redirect()->route('cart.index')->with([
            'success' => 'Data Berhasil Dihapus!'
        ]);
    }

}