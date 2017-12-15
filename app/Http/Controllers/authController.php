<?php

namespace App\Http\Controllers;

use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Http\Request;
use App\User;
use JWTAuth;

class authController extends Controller
{
    public function signup(Request $request){
    
    	$this->validate($request, [
    		'name' =>'required',
    		'email'=>'required|unique:users',
    		'password'=>'required',
    		]);

    	return User::create([
    		'name'=>$request->json('name'),
    		'email'=>$request->json('email'),
    		'password'=>bcrypt($request->json('password')),
    		]);
    }

    public function signin(Request $request){

    	$this->validate($request, [
    		'email' =>'required',
    		'password'=>'required',
    		]);

    	  // grab credentials from the request
        $credentials = $request->only('email', 'password');

        try {
            // attempt to verify the credentials and create a token for the user
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        // all good so return the token
        // return response()->json(compact('token'));
        return response()->json([
            'name' => $request->user()->name,
            'token' =>$token
        ]);
    }
}
