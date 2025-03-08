<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Cart;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    public function index(){
        $user_id = auth()->user()->id ?? null;
        $session_id = session()->get('session_id');
        $totalAmount = 0;
        $carts = Cart::where('session_id', $session_id)->get();
        foreach ($carts as $cart) {
            // Calculate the price of each item in the cart
            $price = $cart->course->discount_fee ?? $cart->course->course_fee;

            // Accumulate the total amount
            $totalAmount += $price;
        }
        return view('frontend.pages.cart',compact('carts','totalAmount'));
    }

    public function addToCart(Request $request){
       //dd($request->course_id);
       $user_id = auth()->user()->id ?? null;
       $session_id = session()->get('session_id');
       if ($session_id == null) {
        session()->put('session_id', uniqid());
        $session_id = session()->get('session_id');
      }
       //dd($session_id);
       if($request->course_id){
         $cart=Cart::where('session_id',$session_id)->where('course_id',$request->course_id)->first();
          if($cart){
             return response()->json(['error'=>"course already added"]);
          }else{
            $cart =Cart::create([
                'user_id'=>$user_id,
                'session_id'=>$session_id,
                'course_id'=>$request->course_id,

            ]);
            //dd($cart);
          }
          return response()->json(['success' => 'Added to Cart']);
        }
    }
    public function cartCount(){
        $user_id = auth()->user()->id ?? null;
        $session_id = session()->get('session_id');
        $cartCount=Cart::where('session_id',$session_id)->count();
        return response()->json(['cartCount'=>$cartCount]);
    }
    public function itemremove($slug){
        $user_id = auth()->user()->id ?? null;
        $session_id = session()->get('session_id');
        $course=Course::where('slug',$slug)->first();
        $cart=Cart::where('session_id',$session_id)->where('course_id',$course->id)->first();
        $cart->delete();
        return back()->with('success','File Deleted Successfully');
    }
}
