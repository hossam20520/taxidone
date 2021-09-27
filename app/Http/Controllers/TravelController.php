<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Driver;
use App\Models\Travel;
use Tymon\JWTAuth\Exceptions\JWTException;
use TymonJWTAuthExceptionsJWTException;
use App\Http\Resources\Admin\UserResource;
use JWTAuth;

class TravelController extends Controller
{
    //


    public function store(Request $request){
        
        $token = JWTAuth::getToken();
        $user = JWTAuth::toUser($token);
        $driver = Driver::where("user_id" , $request->driver_id)->first();
        $client = Client::where("user_id" , $user->id)->first();
        
   $ar = [
    "travel" => $request->travel,
    "travel_cost"=>$request->travel_cost,
    "travel_destination_from"=>$request->travel_destination_from,
    "travel_destnitation_to"=>$request->travel_destnitation_to,
    "travel_destance"=>$request->travel_destance,
    "arrival_time"=>$request->arrival_time,
    "arrival_date"=>$request->arrival_date,
    "driver_id"=>$driver->id,
    "client_id"=> $client->id,
    "travel_status"=>$request->travel_status
   ];
        
        $travel = Travel::create($ar);

        return response()->json([
            'payload' => $travel,
            'status'=> true,
            'code'=> 200
             ], 200);
        
    }


    public function update(Request $request){
   
       
       $trav =  Travel::where("travel" , $request->ID )->update([
            "travel_status" => $request->travel_status
        ]);

        return response()->json([
            'payload' => $trav,
            'status'=> true,
            'code'=> 200
             ], 200);
    }
}
