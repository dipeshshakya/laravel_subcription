<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    //
    public function subscribe(){
        return view('subscribe');

    }
    public function store(Request $request){

//        dd($request);
        // Set your secret key: remember to change this to your live secret key in production
// See your keys here: https://dashboard.stripe.com/account/apikeys
        \Stripe\Stripe::setApiKey('sk_test_i6il0GWhzNQ5zObe9WK3d9wl');

// Token is created using Checkout or Elements!
        $token = $_POST['stripeToken'];

//        create customer
        $customer = \Stripe\Customer::create([
            'email'=>$request->email,
            'source' => $token,
//            'currency' => 'usd',
//            'receipt_email' => 'jenny.rosen@example.com',
        ]);


// Get the payment token ID submitted by the form:

        $charge = \Stripe\Charge::create([
            'amount' => 999,
            'currency' => 'usd',
            'description' => 'Example charge',
//            'source' => $token,
            'customer'=>$customer->id
        ]);

        auth()->user()->update(['stripe_id'=>$customer->id]);
        auth()->user()->assignRole('subscriber');

        return redirect('/blog');


    }
}
