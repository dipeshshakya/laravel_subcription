<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\UserSubscribed;

class SubscriptionController extends Controller
{
    //
    public function subscribe(){
        return view('subscribe');

    }
    public function store(Request $request){

        $token= $request->stripeToken;
//

        auth()->user()->newSubscription('main', 'monthly')->withCoupon($request->coupon)->create($token);
        auth()->user()->assignRole('subscriber');


        auth()->user()->notify(new UserSubscribed);
        return redirect('/blog');


    }
}
