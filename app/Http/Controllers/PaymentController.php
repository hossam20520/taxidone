<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JWTAuth;

class PaymentController extends Controller
{
   public function Pay(Request $request){

    
    Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    Stripe\Charge::create ([
            "amount" => $pack->money * 100,
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "Make payment and chill." 
    ]);



   }
}
