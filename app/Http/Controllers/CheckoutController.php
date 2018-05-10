<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Order;
use Gloudemans\Shoppingcart\Facades\Cart;
class CheckoutController extends Controller
{
    //
   
   
   
     public function shipping()
    {
        return view('front.shipping-info');
    }
     public function payment()
    {
        return view('front.payment');
    }
    public function storePayment(Request $request)
    {   
       // $amnt=Cart::total();
       // dd($amnt);
        // Set your secret key: remember to change this to your live secret key in production
    // See your keys here: https://dashboard.stripe.com/account/apikeys
        \Stripe\Stripe::setApiKey("sk_test_M8hfDnQwXx36Lm8qJ2zWjVDP");

// Get the credit card details submitted by the form
        $token = $request->stripeToken;

// Create a charge: this will charge the user's card
        try {
            $charge = \Stripe\Charge::create(array(
                "amount" => Cart::total() , // Amount in cents
                "currency" => "usd",
                "source" => $token,
                "description" => "Example charge"
            ));
        } catch (\Stripe\Error\Card $e) {
            // The card has been declined
        }
       
        //Create the order
        if(dd(Order::createOrder()))
   

        //redirect user to some page
        return "Order completed";
        else
            return "Order Not completed";
       /*
        $user=Auth::user();
        $order=$user-> orders()->create([
        'total'=>Cart::total(),
            'delivered'=>0
        ]);

        $cartItems=Cart::content();
        foreach($cartItems as $cartItem )
        {
         $order->orderItems()->attach($cartItem->id,[
         'qty'=>$cartItem->qty,
             'total'=>$cartItem->qty*$cartItem->price
         
         ]);   
            
        }
      */
    }
}
