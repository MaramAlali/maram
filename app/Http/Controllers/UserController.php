<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
class UserController extends Controller
{
    public function signUp(Request $request){
     $validate= Validator::make($request->all(),
     [
         'name'=>'required:users',
         'email'=>'required|email:users',
         'password'=>'min:4|required:users'
     ]);
     //vaildate from data if true or wrong
     if($validate->fails()){
         return response()->json([
             'errors'=>$validate->errors(),
             'status'=>400,
             'message'=>'create unsuccessfully']);
     }
     //create user to add for db
     $user=User::create([
         'name'=>$request->name,
         'password'=>Hash::make($request->password),
         'email'=>$request->email]);
     $token =$user->createToken('UserToken')->plainTextToken;

     return response()->json([
         'data'=>$user,
         'token'=>$token,
         'status'=>200,
         'message'=>'create successfully']);
     }

     //--------------------------login func----------------------------

     public function login(Request $request){
         $validate= Validator::make($request->all(),
        [
             'email'=>'required|email:users',
             'password'=>'min:4|required:users'
         ]);
         //vaildate from data if true or wrong
         if($validate->fails()){
             return response()->json([
                 'errors'=>$validate->errors(),
                 'status'=>400]);
         }

         $user=User::where('email',$request->email)->first();
         if($user && Hash::check($request->password, $user->password)){
            $token =$user->createToken(request()->userAgent())->plainTextToken;
             return response()->json([
             'data'=>$user,
             'token'=>$token,
             'message'=>'login successfully']);
         }
         return response()->json([
         'message'=>'data is not found']);

         }
 }