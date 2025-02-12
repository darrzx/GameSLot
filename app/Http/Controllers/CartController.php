<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\TransactionDetail;
use App\Models\TransactionHeader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function addToCart(Request $request){
        if(Auth::user()){
            $cart  = Cart::where(['user_id' => Auth::user()->id, 'game_id' => $request->route('id')])->first();
            if ($cart == null) {
                // Cart::create([
                //     'user_id' => Auth::user()->id,
                //     'game_id' => $request->route('id'),
                //     'quantity' => '1'
                // ]);

                $cartModel = new Cart();
                $cartModel->user_id = Auth::user()->id;
                $cartModel->game_id = $request->route('id');
                $cartModel->quantity = 1;
                $cart = session()->get('cart');
                if (!$cart) {
                    Session::push('cart', $cartModel);
                    return redirect('/')->with('message', 'Game added to cart successfully!');
                }
                foreach ($cart as $game) {
                    if ($cartModel->game_id == $game->game_id) {
                        $game->quantity += 1;
                        return redirect('/')->with('message', 'Game added to cart successfully!');
                    }
                }
                Session::push('cart', $cartModel);
                return redirect('/')->with('message', 'Game added to cart successfully!');
            }
        }else{
            return redirect('/signIn');
        }
    }

    public function showCartPage(){
        return view('cart');
    }

    public function updateCart(Request $request){
        $this->validate($request, [
            'quantity' => 'numeric | min:0'
        ]);
        $cart = Session::get('cart');
        $cart[$request->route('id')]->quantity = $request->quantity;
        return redirect('/cart');
    }

    public function deleteCart(Request $request){
        $cart = Session::get('cart');
        unset($cart[$request->route('id')]);
        Session::forget('cart');
        foreach ($cart as $game) {
            Session::push('cart', $game);
        }
        return redirect('/cart');
    }

    public function checkout(Request $request){
        $cart = session()->get('cart');
        $totalitem = 0;
        for ($i = 0; $i < count(Session::get('cart')); $i++) {
            $totalitem += $cart[$i]->quantity;
        }

        TransactionHeader::create([
            'user_id' => Auth::user()->id,
            'transaction_date' => now(),
            'total_item' => $totalitem,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $transactionid =  DB::table('transaction_headers')->latest('created_at')->first();

        for ($i = 0; $i < count(Session::get('cart')); $i++) {
            TransactionDetail::create([
                'transaction_id' => $transactionid->transaction_id,
                'game_id' => $cart[$i]->game->id,
                'quantity' => $cart[$i]->quantity,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
        Session::forget('cart');
        return redirect('/');
    }
}
