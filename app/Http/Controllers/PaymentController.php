<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JWTAuth;
use Stripe;
use Session;
use App\Models\Driver;
use App\Models\Client;
use App\Models\Subscription;
use App\Models\Setting;

class PaymentController extends Controller
{
   public function payment(Request $request){

        $token = JWTAuth::getToken();
        $user = JWTAuth::toUser($token);


        $driver = Driver::find($request->driver_id);


        if($driver == null){
  
                return response()->json([
                        'message' => "Driver not found",
                        'status'=> false,
                        'code'=> 404
                         ], 404);
        }else{

            $sett = Setting::where("id" , ">" , 0)->get();
            if($sett[0]->type  == "percentage"){
               
               $perc =  $sett[0]->draw_on_every_travel_p / 100;

               $amountPrc = $request->amount * $perc;
       


            }else{

                
                $amountPrc = $sett[0]->draw_on_every_travel_a;


            }


               $driv =  Driver::where("id" , $request->driver_id)->first();

                Driver::where("id" , $request->driver_id)->update([
                        "wallet"=> ($request->amount - $amountPrc + $driv->wallet )
                ]);


        }
        
        return response()->json([
                'message' => "Success payment",
                'status'=> true,
                'code'=> 200
                 ], 200);


//     Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
//     Stripe\Charge::create ([
//             "amount" => $pack->money * 100,
//             "currency" => "usd",
//             "source" => $request->stripeToken,
//             "description" => "Make payment and chill." 
//     ]);



   }
}
