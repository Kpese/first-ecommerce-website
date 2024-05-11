<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
// use Illuminate\Notifications\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Notifications\SendEmailNotification;
use Illuminate\Support\Facades\Notification;

class AdminController extends Controller
{
    public function index(){
        $product = Product::get()->count();
        $customer = User::all()->count();
        $order_deliver = Order::where('delivery_status', 'delivered')->get()->count();
        $order_processing = Order::where('delivery_status', 'processing')->get()->count();
        $total_order = Order::all()->count();
        $order = Order::where('delivery_status', 'processing')->get();

        $revenue = 0;

        $revenue_order = Order::all();
        foreach ($revenue_order as $orders){
            $revenue += $orders->price;
        }

        return view('admin.index', compact('product', 'customer', 'total_order', 'order', 'revenue', 'order_deliver', 'order_processing'));
    }


    // PRODUCTS

    public function store_product(){
        $category = Category::get();
        return view('admin.product.add', compact('category'));
    }

    public function show_product(){
        $product = Product::orderByDesc('created_at')->get();
        return view('admin.product.show', compact('product'));
    }

    public function add_product(){
        $validate = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|image',
            'price' => 'required',
            'quantity' => 'required',
            'category' => 'required',
            'discount_price' => '',
        ]);

        // if(request('image')){
        //     $validate['image'] = request()->file('image')->store('products', 'public');
        // }

        // Product::create($validate);
       $product = new Product;

       $product->title = $validate['title'];
       $product->description = $validate['description'];
       $product->price = $validate['price'];
       $product->quantity = $validate['quantity'];
       $product->category = $validate['category'];
       $product->discount_price = $validate['discount_price'];

       if(request('image')){
        $file = request()->file('image');
        $filename = time(). '.' . $file->getClientOriginalName();
        $file->move('images/products/', $filename);

        $product->image = $filename;
       }

       $product->save();

       return redirect()->back()->with('success','product is added successfully');
    }

    public function edit_product(Product $product){
        $category = Category::get();
        $products = $product;
        return view('admin.product.edit', compact('products', 'category'));
    }

    public function update_product(Product $product){
        $validate = request()->validate([
            'title' => 'string',
            'description' => 'string',
            'image' => 'image',
            'price' => 'numeric',
            'quantity' => 'numeric',
            'category' => '',
            'discount_price' => '',
        ]);

        // if(request('image')){
        //     $validate['image'] = request()->file('image')->store('products', 'public');

        //     Storage::disk('public')->delete($product->image);
        // }
        $products = $product;
           $products->title = $validate['title'];
           $products->description = $validate['description'];
           $products->price  = $validate['price'];
           $products->quantity = $validate['quantity'];
           $products->category = $validate['category'];
           $products->discount_price = $validate['discount_price'];

        if (!empty(request('image'))) {

            if (!empty($products->image)) {
                unlink('images/products/' . $products->image);
            }
            $file = request()->file('image');
            $filename = time() . '.' . $file->getClientOriginalName();
            $file->move('images/products/', $filename);

            $products->image = $filename;
        };

        $products->save();

        return redirect()->route('show_product')->with('success','product is updated successfully');
    }

    public function delete_product(Product $product){
        $product->delete();
          return redirect()->back()->with('success','product is deleted successfully');
      }


    //   CATEGORIES
    public function category(){
        $category = Category::orderByDesc('created_at')->get();
        return view('admin.category.index', compact('category')) ;
    }

    public function add_category(){
        $validate = request()->validate([
            'name' => 'required|string|min:3|max:50',
        ]);
      $cat = new Category;
      $cat->category_name = $validate['name'];
      $cat->save();
        return redirect()->back()->with('success','category is added successfully');
    }

    public function delete_category(Category $category){
      $category->delete();
        return redirect()->back()->with('success','category is deleted successfully');
    }

    // ORDER
    public function order(){
        $order = Order::orderByDesc('created_at')->get();
        return view('admin.order.order', compact('order')) ;
    }

    public function delivered(Order $order){
        $order->delivery_status  = "Delivered";
        $order->payment_status  = "Paid";
        $order->save();
        return redirect()->back();
    }

    public function pdf(Order $order){
        $orders = $order;
        // $pdf = PDF::loadView('Admin.pdf', compact('orders'));

        // return  $pdf->download('order_details');
    }

    public function send_email(Order $order){
        $email = $order;

        return view('admin.email.email', compact('email'));
    }
    public function send_user_email(Order $order){
        $email = $order;

        $details = [
            'greeting' => request('greeting'),
            'firstline' => request('firstline'),
            'body' => request('body'),
            'button' => request('button'),
            'url' => request('url'),
            'lastline' => request('lastline'),
        ];

        Notification::send($email, new SendEmailNotification($details));

        return view('admin.email.email', compact('email'));
    }
}
