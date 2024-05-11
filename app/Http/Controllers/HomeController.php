<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        $product = Product::orderByDesc('created_at')->limit(3)->get();
        return view('front.index', compact('product'));
    }

    public function productpage(){
        $product = Product::orderByDesc('created_at')->get();
        return view('front.products.product_page', compact('product'));
    }

    public function product_detail(Product $product){
        $product = Product::find($product)->first();
        return view('front.product_detail', compact('product'));
    }

    public function show_cart(){
        $id = Auth::user()->id;
        $cart = Cart::where('user_id', $id)->get();
        return view('front.show_cart', compact('cart'));
    }

    public function cash_order(){
        $id = Auth::user()->id;
        $carts = Cart::where('user_id', $id)->get();

        foreach ($carts as $cart){
         $order = new Order;

        $order->user_id = $cart->user_id;
        $order->product_id = $cart->product_id;
        $order->customer_name = $cart->customer_name;
        $order->customer_email = $cart->customer_email;
        $order->customer_phone = $cart->customer_phone;
        $order->customer_address = $cart->customer_address;
        $order->product_title = $cart->product_title;
        $order->price = $cart->price;
        $order->quantity = $cart->quantity;
        $order->product_image = $cart->product_image;
        $order->payment_status = 'cash on delivery';
        $order->delivery_status ='processing';

        $order->save();

            $cart_id = $cart->id;
        Cart::find($cart_id)->delete();
        }


        return redirect()->back()->with('success', 'order successfully received we will contact you soon');
    }

    public function delete_cart(Cart $cart){
        $cart->delete();
          return redirect()->back();
      }

    public function add_cart(Product $product){
        $user = Auth::user();
        $products = $product;

        $product_exist = Cart::where('product_id', $products->id)->where('user_id', $user->id)->first();

       if($product_exist){
        $cart = Cart::find($product_exist)->first();
        $quantity = $cart->quantity;
        $cart->quantity = $quantity + request('quantity');

        if($products->discount_price){
            $cart->price = $products->discount_price * $cart->quantity ;
        } else{
            $cart->price = $products->price * $cart->quantity ;
        }

        $cart->save();
        return redirect()->back();

       }else{
        $cart = new Cart;

        $cart->user_id = $user->id;
        $cart->customer_name = $user->name;
        $cart->customer_email = $user->email;
        $cart->customer_phone = $user->phone;
        $cart->customer_address = $user->address;

        $cart->product_id = $products->id;
        $cart->product_title = $products->title;
        if($products->discount_price){
            $cart->price = $products->discount_price * request('quantity');
        } else{
            $cart->price = $products->price * request('quantity');
        }
        $cart->product_image = $products->image;

        $cart->quantity = request('quantity');

    $cart->save();

    return redirect()->back();
       }
    }
}
