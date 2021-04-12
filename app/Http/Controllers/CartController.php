<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use App\Mail\Sendmail;

class CartController extends Controller
{
    public function addToCart(Product $product){
        if(session()->has('cart')){
            $cart = new Cart(session()->get('cart'));
        }
        else{
            $cart = new Cart();
        }
        
        $cart->add($product);
        
        

        session()->put('cart', $cart);
        drakify('success');
        return redirect()->back();
    }

    public function showCart(){
    	if(session()->has('cart')){
    		$cart = new Cart(session()->get('cart'));
    	}else{
    		$cart = null;
    	}
    	
        
        return view('cart',compact('cart'));
    }

    public function updateCart(Request $request, Product $product){
        $request->validate([
            'qty'=>'required|numeric|min:1'
        ]);
        
        $cart = new Cart(session()->get('cart'));
        $cart->updateQty($product->id, $request->qty);
        session()->put('cart', $cart);
        drakify('success');
        return redirect()->back();
    }

    public function removeCart(Product $product){
    	$cart = new Cart(session()->get('cart'));
    	$cart->remove($product->id);
    	if($cart->totalQty<=0){
    		session()->forget('cart');
    	}else{
    		session()->put('cart',$cart);
    	}
    	drakify('success');
        return redirect()->back();
    }

    public function checkout($amount){
        if(session()->has('cart')){
    		$cart = new Cart(session()->get('cart'));
    	}else{
    		$cart = null;
    	}
        return view('checkout', compact('amount', 'cart'));
    }

    public function charge(Request $request){
        $charge = Stripe::charges()->create([
            'currency'=>"USD",
            'source'=>$request->stripeToken,
            'amount'=>$request->amount,
            'description'=>'Test'
        ]);
        $chargeId = $charge['id'];
        if(session()->has('cart')){
    		$cart = new Cart(session()->get('cart'));
    	}else{
    		$cart = null;
    	}
        \Mail::to(auth()->user()->email)->send(new Sendmail($cart));
        
        if($charge){
            auth()->user()->orders()->create([
                'cart'=>serialize(session()->get('cart'))
            ]);
            session()->forget('cart');
            drakify('success');
            return redirect()->to('/');
        }else{
            return redirect()->back();
        }
    }

    public function orders(){
        $orders = auth()->user()->orders;
        $carts = $orders->transform(function($cart,$key){
            return unserialize($cart->cart);

        });
        return view('order',compact('carts'));

    }

    //for admin

    public function userOrder(){
        $orders = Order::latest()->get();
        return view('admin.order.index', compact('orders'));
    }

    public function viewUserOrder($user_id, $order_id){
        $user = User::find($user_id);
        $orders = $user->orders->where('id', $order_id);
        $carts = $orders->transform(function($cart,$key){
            return unserialize($cart->cart);

        });
        return view('admin.order.show',compact('carts'));
    }

}
