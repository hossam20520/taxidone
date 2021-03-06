<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Driver;
use App\Models\Client;
class UserController extends Controller
{
   

    public function getUserDriver(Request $request){
       $id =  $request->ID;
      

       $driver = Driver::where("id" ,$id )->first();
 
  if($driver == null){
    return response()->json([
        'message' => 'Driver not found',
        'status'=> false,
        'code'=> 404
         ], 404);
  }
      




        $user =  User::find( $driver->user_id);

              $userCustom = [
                    "id"=> $driver->id, 
                    "name"=> $user->name,
                    "email"=> $user->email,
                    "approved"=> $user->approved,
                    "phone"=>  $user->phone ,
                    "role"=> "Driver"
                ];
           return response()->json([
               'payload' =>  $userCustom,
               'status'=> true,
               'code'=> 200
                ], 200);
                 
   



    }



    public function getUserClient(Request $request){
        $id =  $request->ID;
       
 
        $client = Client::where("id" ,$id )->first();
  
   if($client == null){
     return response()->json([
         'message' => 'Client not found',
         'status'=> false,
         'code'=> 404
          ], 404);
   }
       
 
         $user =  User::find( $client->user_id);
 
         $userCustom = [
            "id"=> $client->id, 
            "name"=> $user->name,
            "email"=> $user->email,
            "approved"=> $user->approved,
            "phone"=>  $user->phone ,
            "role"=> "Client"
            ];
            
            return response()->json([
                'payload' =>  $user,
                'status'=> true,
                'code'=> 200
                 ], 200);
                  
    
 
 
 
     }
}
