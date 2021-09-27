<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscription;
use App\Models\Travel;
use App\Models\Driver;
use App\Models\Client;
use App\Models\User;
use App\Models\Car;
use JWTAuth;
class DriverController extends Controller
{
   public function getSub(Request $request){

    $subs = Subscription::all();

    return response()->json([
        'payload' =>  $subs,
        'status'=> true,
        'code'=> 200
         ], 200);



   }


   public function history(Request $request){
    $token = JWTAuth::getToken();
    $user = JWTAuth::toUser($token);
    
   



    $pers = User::find($user->id);
    return $pers;
    $pers->roles;
    $rol = $pers->roles[0]->title;
    if($rol == "Driver"){
        $driver = Driver::where("user_id" ,$user->id)->first();
        $travels = Travel::where("driver_id" , $driver->id )->get();
        return response()->json([
            'payload' =>  $travels,
            'status'=> true,
            'code'=> 200
             ], 200);
              

    }else{
        
        $client = Client::where("user_id" ,$user->id)->first();
        $travels = Travel::where("client_id" , $client->id )->get();
        return response()->json([
            'payload' =>  $travels,
            'status'=> true,
            'code'=> 200
             ], 200);
    }


 

   }





public function registerCar(Request $request){

    // return $request->carname;
    $token = JWTAuth::getToken();
    $user = JWTAuth::toUser($token);
    $driver = Driver::where("user_id" ,  $user->id)->first();
$req = [
    "carname"=> $request->carname,
    "identity_num"=>$request->identity_num,
    "license_number"=>$request->license_number,
    "insurance_policy_number"=>$request->insurance_policy_number,
    "city"=>$request->city,
    "driver_id"=>$driver->id,
    "identification_number_photo"=>$request->identification_number_photo,
    "license_number_photo"=>$request->license_number_photo,
    "photo"=>$request->photo
];




    // return $request->all();
    $car = Car::create($req); 
// return $car;
    if ($request->input('identification_number_photo', false)) {
        $car->addMedia(storage_path('tmp/uploads/' . basename($request->input('identification_number_photo'))))->toMediaCollection('identification_number_photo');
    }

    if ($request->input('license_number_photo', false)) {
        $car->addMedia(storage_path('tmp/uploads/' . basename($request->input('license_number_photo'))))->toMediaCollection('license_number_photo');
    }

    if ($request->input('photo', false)) {
        $car->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
    }

    return response()->json([
        'payload' =>   $car,
        'status'=> true,
        'code'=> 200
         ], 200);

}







}
