<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session as FacadesSession;
use Session;
use Stripe;

use function Pest\Laravel\get;

class HomeController extends Controller
{
    public function index(){
        $user = User::where('usertype','user')->get()->count();
        $product = Product::all()->count();
        $totalOrder = Order::all()->count();
        $delivered = Order::where('status','Delivered')->count();
        return view('admin.index',compact('user','product','totalOrder','delivered'));
    }

    public function home(){
        $product = Product::all();

        if(Auth::id()){
            $user = Auth::user();
            $userid = $user->id;
            $countCart = Cart::where('user_id',$userid)->count();
        }
        else{
            $countCart='';
        }
        return view('home.index',compact('product','countCart'));
    }
    public function shop(){
        $product = Product::all();

        if(Auth::id()){
            $user = Auth::user();
            $userid = $user->id;
            $countCart = Cart::where('user_id',$userid)->count();
        }
        else{
            $countCart='';
        }
        return view('home.shopView',compact('product','countCart'));
    }

    public function whyUs(){


        if(Auth::id()){
            $user = Auth::user();
            $userid = $user->id;
            $countCart = Cart::where('user_id',$userid)->count();
        }
        else{
            $countCart='';
        }
        return view('home.whyUs',compact('countCart'));
    }

    public function testimonial(){


        if(Auth::id()){
            $user = Auth::user();
            $userid = $user->id;
            $countCart = Cart::where('user_id',$userid)->count();
        }
        else{
            $countCart='';
        }
        return view('home.testimonial',compact('countCart'));
    }

    public function contact(){


        if(Auth::id()){
            $user = Auth::user();
            $userid = $user->id;
            $countCart = Cart::where('user_id',$userid)->count();
        }
        else{
            $countCart='';
        }
        return view('home.contact',compact('countCart'));
    }
    public function loginHome(){
             $product = Product::all();
             if(Auth::id()){
                $user = Auth::user();
                $userid = $user->id;
                $countCart = Cart::where('user_id',$userid)->count();
            }
            else{
                $countCart='';
            }
            return view('home.index',compact('product','countCart'));
    }

    public function productDetail($id){
        $product = Product::find($id);
        if(Auth::id()){
            $user = Auth::user();
            $userid = $user->id;
            $countCart = Cart::where('user_id',$userid)->count();
        }
        else{
            $countCart='';
        }
        return view('home.product-detail',compact('product','countCart'));
    }

    public function addCart($id){
        $product_id = $id;

        $user = Auth::user();
        $user_id = $user->id;
        $data = new Cart;
        $data->user_id = $user_id;
        $data->product_id = $product_id;

        $data->save();

        toastr()->timeOut(5000)->closeButton()->addSuccess('Product added to the successfully');

        return redirect()->back();
    }

    public function myCart(){
        if(Auth::id()){
            $user = Auth::user();

            $userid = $user->id;

            $countCart = Cart::where('user_id',$userid)->count();

            $cart = Cart::where('user_id',$userid)->get();
        }
        return view('home.myCart',compact('countCart','cart'));
    }

    public function deleteCart($id){

        $cart = Cart::find($id);
        $cart->delete();

        toastr()->timeOut(5000)->closeButton()->addDeleted('Product removed successfully');

        return redirect()->back();
    }

    public function confirmOrder(Request $request){
       $name = $request->name;
       $address = $request->address;
       $phone = $request->phone;

       $userid = Auth::user()->id;

       $cart = Cart::where('user_id',$userid)->get();

       foreach($cart as $carts){
        $order = new Order;

        $order->name = $name;
        $order->rec_address = $address;
        $order->phone = $phone;
        $order->user_id = $userid;

        $order->product_id = $carts->product_id;
        $order->save();

       }

       $cart_remove =Cart::where('user_id',$userid)->get();

       foreach($cart_remove as $remove){
        $cartData = Cart::find($remove->id);

        $cartData->delete();
       }

       toastr()->timeOut(5000)->closeButton()->addSuccess('Product ordered successfully');

       return redirect()->back();


    }

    public function myOrders(){
        $user = Auth::user()->id;
        $countCart = Cart::where('user_id',$user)->get()->count();
        $orderData = Order::where('user_id',$user)->get();
        return view('home.order',compact('countCart','orderData'));
    }

    public function stripe($value)
    {

        return view('home.stripe',compact('value'));

    }

    public function stripePost(Request $request,$value)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        Stripe\Charge::create ([
                "amount" => $value * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Test payment Complete"
        ]);

        $name =Auth::user()->name;
        $address = Auth::user()->address;
        $phone = Auth::user()->phone;

       $userid = Auth::user()->id;

       $cart = Cart::where('user_id',$userid)->get();

       foreach($cart as $carts){
        $order = new Order;

        $order->name = $name;
        $order->rec_address = $address;
        $order->phone = $phone;
        $order->user_id = $userid;

        $order->product_id = $carts->product_id;

        $order->payment_status = 'paid';
        $order->save();

       }

       $cart_remove =Cart::where('user_id',$userid)->get();

       foreach($cart_remove as $remove){
        $cartData = Cart::find($remove->id);

        $cartData->delete();
       }

       toastr()->timeOut(5000)->closeButton()->addSuccess('Product ordered successfully');

       return redirect('myCart');

    }


}
