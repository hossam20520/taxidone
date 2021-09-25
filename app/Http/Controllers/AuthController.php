<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Driver;
use App\Models\Client;
use App\Models\Confimation;
use App\Models\Subscriptiondriver;
use App\Models\Car;
use Tymon\JWTAuth\Exceptions\JWTException;
use TymonJWTAuthExceptionsJWTException;
use App\Http\Resources\Admin\UserResource;
// use MediaUploadingTrait;
use JWTAuth;
class AuthController extends Controller
{
  

    public function confirmClient(Request $request){

        $token = JWTAuth::getToken();
        $user = JWTAuth::toUser($token);
       
       

        $vol = Confimation::where("user_id", $user->id)->where("status", "pending")->first();

        if($vol == null){
            return response()->json([
                'message' => 'Code Not Found',
                'status'=> false,
                'code'=> 404
                 ], 404);
          }

        $vol = Confimation::where("user_id", $user->id)->where("status", "pending")->first();
        if($request->code == $vol->code ){
            
  

            Confimation::where("id" , $vol->id)->update([
                "status"=>"approved"
            ]);

            return response()->json([
                'payload' =>  $user,
                'access_token' => $token ,
                'status'=> true,
                'code'=> 200
                 ], 200);
           
        }else{
            // 5174
            return response()->json([
                'message' => 'Incorrect Code',
                'status'=> false,
                'code'=> 401
                 ], 401);

        }



    }





    public function confirm(Request $request){

        $token = JWTAuth::getToken();
        $user = JWTAuth::toUser($token);
       
        $array = array( "user"=> $user,  "car_registerd" => false , "subscription"=> false , "confirmed"=> false  );

        $vol = Confimation::where("user_id", $user->id)->where("status", "pending")->first();

        if($vol == null){
            return response()->json([
                'message' => 'Code Not Found',
                'status'=> false,
                'code'=> 404
                 ], 404);
          }

        $vol = Confimation::where("user_id", $user->id)->where("status", "pending")->first();
        if($request->code == $vol->code ){
            
  

            Confimation::where("id" , $vol->id)->update([
                "status"=>"approved"
            ]);

            return response()->json([
                'payload' =>  $array,
                'access_token' => $token ,
                'status'=> true,
                'code'=> 200
                 ], 200);
           
        }else{
            // 5174
            return response()->json([
                'message' => 'Incorrect Code',
                'status'=> false,
                'code'=> 401
                 ], 401);

        }



         
          
        // return $vol;

    }

    public function RegisterDriver(Request $request)
    {


        
        $userEmail = User::where('email', '=', $request->email)->first();
        $userPhone = User::where('phone', '=', $request->phone)->first();

        
        if ($userEmail !== null) {
           
        
            return response()->json([
                'message' => 'Email Already Used',
                'status'=> false,
                'code'=> 409
                 ], 409);

        }else if($userPhone !== null){

            return response()->json([
                'message' => 'Phone Already Used',
                'status'=> false,
                'code'=> 409
                 ], 409);

        }else{


            $fourRandomDigit = rand(1000,9999);
            $user = User::create($request->all());
            $user->roles()->sync($request->input('roles', [3]));
            $driver = Driver::create([
                "wallet"=>0,
                "name"=>$user->name,
                "email"=> $user->email,
                "phone"=> $user->phone,
                "user_id"=> $user->id,
                "delete"=> "no",
                "confirm"=> "no",

            ]);

            $credentials = $request->only('phone', 'password');
            $token = JWTAuth::attempt($credentials);

            Confimation::create(["code"=> $fourRandomDigit  , "user_id"=> $user->id , "status"=> "pending"]);
             

            return response()->json([
                'payload' => $user,
                'access_token' => $token ,
                'status'=> true,
                'code'=> 200
                 ], 200);

        }
        





    }



    public function LoginDriver(Request $request)
    {




         $credentials = $request->only('phone', 'password');
         $token = JWTAuth::attempt($credentials);
         $user = User::where('phone', $request->phone)->first();
      


         if($token){

            if($user->approved == 0){
                return response()->json([
                    'message' => "your account has not been approved yet",
                    'status'=> false,
                    'code'=> 401
                     ], 401);
            }





            $confirm = Confimation::where('user_id', $user->id)->first();
            $driver = Driver::where('user_id', $user->id)->first();
            $subscription = Subscriptiondriver::where('driver_id',$driver->id)->where('status',"runing")->first();
           
            $car = Car::where('driver_id', $driver->id)->first();
           
   
           //  return $subscription;
            if ( $confirm->status == "pending"){
                $status = false;
            }else{
                $status = true;
            }
   
           //  return $subscription;
   
            if($subscription == null){
             $sub = false;
   
            }else{
   
               $sub = true;
            }
   
   
   
            if($car == null){
               $car = false;
               
              }else{
     
                 $car = true;
              }
         
   
        $array = array( "user"=> $user,  "car_registerd" => $car , "subscription"=>  $sub , "confirmed"=> $status );


            return response()->json([
                'payload' =>  $array,
                'access_token' => $token ,
                'status'=> true,
                'code'=> 200
                 ], 200);



            
         }else{

            return response()->json([
                'message' => "Incorrect credentials",
                'status'=> false,
                'code'=> 403 
                 ], 403 );
         }

        



    }


    public function LoginClient(Request $request){

        $credentials = $request->only('phone', 'password');
        $token = JWTAuth::attempt($credentials);
        $user = User::where('phone', $request->phone)->first();

        if($token){

            $array = array( "user"=> $user );
            return response()->json([
                'payload' =>  $array,
                'access_token' => $token ,
                'status'=> true,
                'code'=> 200
                 ], 200);
        }else{
            return response()->json([
                'message' => "Incorrect credentials",
                'status'=> false,
                'code'=> 403 
                 ], 403 );
        }

    }




    public function RegisterClient(Request $request){

        $userEmail = User::where('email', '=', $request->email)->first();
        $userPhone = User::where('phone', '=', $request->phone)->first();

        
        if ($userEmail !== null) {
           
        
            return response()->json([
                'message' => 'Email Already Used',
                'status'=> false,
                'code'=> 409
                 ], 409);

        }else if($userPhone !== null){

            return response()->json([
                'message' => 'Phone Already Used',
                'status'=> false,
                'code'=> 409
                 ], 409);

        }else{


            $fourRandomDigit = rand(1000,9999);
            $user = User::create($request->all());
            $user->roles()->sync($request->input('roles', [4]));
            $driver = Client::create([
            
                "name"=>$user->name,
                "email"=> $user->email,
                "phone"=> $user->phone,
                "user_id"=> $user->id
              

            ]);

            $credentials = $request->only('phone', 'password');
            $token = JWTAuth::attempt($credentials);

            Confimation::create(["code"=> $fourRandomDigit  , "user_id"=> $user->id , "status"=> "pending"]);
             

            return response()->json([
                'payload' => $user,
                'access_token' => $token ,
                'status'=> true,
                'code'=> 200
                 ], 200);

        }
        
    }


}
