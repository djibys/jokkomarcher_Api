<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
{
     //REGISTER API 
     public function register(Request $request){
        //validation 
        $request->validate([
            "first_name"=> "required",
            "last_name"=> "required",
            "sexe"=> "required",
            "adress"=> "required",
            "phone_number"=> "required",
            "email"=> "required|email|unique:clients",
            "password"=> "required|confirmed",            
        ]);
        //create data
        $client = new Client();
        $client->first_name = $request->first_name;
        $client->last_name = $request->last_name;
        $client->sexe = $request->sexe;
        $client->adress = $request->adress;
        $client->email = $request->email;
        $client->phone_number = isset($request->phone_number) ? $request->phone_number : "";
        $client->password = Hash::make($request->password);
        

        $client->save();

        // send response
        return response()->json([
            "status" => 1,
            "message" => "client registered succesfully"
        ]);
    }
     // LOGIN API
     public function login(Request $request)
     {
         // validation
         $request->validate([
             "email" => "required|email",
             "password" => "required"
         ]);
 
         // check client
         $client = Client::where("email", "=", $request->email)->first();
 
         if(isset($client->id)){
 
             if(Hash::check($request->password, $client->password)){
 
                 // create a token
                 $token = $client->createToken("auth_token")->plainTextToken;
 
                 /// send a response
                 return response()->json([
                     "status" => 1,
                     "message" => "Student logged in successfully",
                     "access_token" => $token
                 ]);
             }else{
 
                 return response()->json([
                     "status" => 0,
                     "message" => "Password didn't match"
                 ], 404);
             }
         }else{
 
             return response()->json([
                 "status" => 0,
                 "message" => "Student not found"
             ], 404);
         }
     }
     // LOGOUT API
    public function logout()
    {
       // auth()->user()->tokens()->delete();
    

        $client= Auth::Client()->token();
        $client->revoke();
        return response()->json('Successfully logged out');

        return response()->json([
            "status" => 1,
            "message" => "Client logged out successfully"
        ]);
    }
}
