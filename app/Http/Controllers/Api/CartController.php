<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\DetailCart;
use App\Models\Cart;
use App\Models\Menu;
use App\Models\User;
use Session;
class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cart = DetailCart::join('carts', 'carts.id', '=', 'detail_carts.id_cart')
        ->join('menus', 'menus.id', '=', 'detail_carts.id_menu')
        ->where('carts.id_user', auth()->user()->id_user)
        ->where('carts.status', 0)
        ->select('menus.name', 'menus.image', 'menus.price', 'detail_carts.quantity', 'detail_carts.id')
        ->get();
        
        //dd($cart);
        return view("UserView.cart", compact("cart"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(string $id)
    {
        $cart = Cart::where('id_user', auth()->user()->id_user)
        ->where('status', 0)
        ->first();

        if($cart){
            $findMenu = DetailCart::where('id_cart', $cart->id)->where('id_menu',$id)->first();
            if($findMenu){

                $findMenu->update([
                    'quantity' => $findMenu->quantity + 1,
                ]);
            }else{
                DetailCart::create([
                    'id_menu' => $id,
                    'quantity' => 1,
                    'id_cart' => $cart->id,
                ]);
            }
            
        }else{
            Cart::create([
                'id_user' => auth()->user()->id_user,
                'status' => 0,
            ]);

            $idCart = Cart::where('id_user', auth()->user()->id_user)
            ->where('status', 0)
            ->first();

            DetailCart::create([
                'id_menu' => $id,
                'quantity' => 1,
                'id_cart' => $idCart->id,
            ]);            
        }

        return redirect('cart');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cart =DetailCart::find($id); 
        $cart->delete(); 
        return redirect('cart')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}