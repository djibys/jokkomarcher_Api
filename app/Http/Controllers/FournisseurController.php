<?php

namespace App\Http\Controllers;

use App\Models\Fournisseur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class FournisseurController extends Controller
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
        $fournisseur = new Fournisseur();
        $fournisseur->first_name = $request->first_name;
        $fournisseur->last_name = $request->last_name;
        $fournisseur->sexe = $request->sexe;
        $fournisseur->adress = $request->adress;
        $fournisseur->email = $request->email;
        $fournisseur->phone_number = isset($request->phone_number) ? $request->phone_number : "";
        $fournisseur->password = Hash::make($request->password);
        

        $fournisseur->save();

        // send response
        return response()->json([
            "status" => 1,
            "message" => "Fournisseur registered succesfully bravo "
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
         $fournisseur = Fournisseur::where("email", "=", $request->email)->first();
 
         if(isset($fournisseur->id)){
 
             if(Hash::check($request->password, $fournisseur->password)){
 
                 // create a token
                 $token = $fournisseur->createToken("auth_token")->plainTextToken;
 
                 /// send a response
                 return response()->json([
                     "status" => 1,
                     "message" => "fournisseur logged in successfully",
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
                 "message" => "Fournisseur not found"
             ], 404);
         }
     }
     // LOGOUT API
    public function logout()
    {
       // auth()->user()->tokens()->delete();
    

        $fournisseur= Auth::Client()->token();
        $fournisseur->revoke();
        return response()->json('Successfully logged out');

        return response()->json([
            "status" => 1,
            "message" => "Fournisseur logged out successfully"
        ]);
    }
    public function profil(){

        $fournisseur=Fournisseur::get();
        dd(auth()->user());
        return response()->json([
            "status" =>1,
            "message"=>"list des fournisseur",
            "data" => auth()->user(),
            // "data"=>$fournisseur

        ]);
    }
}