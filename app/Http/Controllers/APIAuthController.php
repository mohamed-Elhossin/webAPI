<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class APIAuthController extends Controller
{

    public function register(Request $request)
    {
        $data = $request->validate([
            "name" => "required|string",
            "email" => "required|unique:users,email|email",
            "password" => "required|confirmed"
        ]);

        $user = User::create([
            "name" => $data['name'],
            "email" => $data['email'],
            "password" => bcrypt($data['password'])
        ]);

        $token = $user->createToken("myToken")->plainTextToken;

        $response = [
            "message"=>"Welcome in System",
            "user"=>$user,
            "token"=>$token
        ];
        return response($response,200);
    }


 public function login(Request $request){
    $data = $request->validate([
        "email" => "required|email",
        "password" => "required"
    ]);

    $user = User::where("email","=",$data['email'])->first();

    if(!$user ||  !Hash::check($data['password'],$user->password) ){
        return ["message"=>"Login False try Agien"];
    }

    $token = $user->createToken("myToken")->plainTextToken;

    $response = [
        "message"=>"Welcome in System",
        "user"=>$user,
        "token"=>$token
    ];
    return response($response,200);
 }





    public function logout(){
        auth()->user()->tokens()->delete();
        $response = [
            "message"=>"Logout from System",
        ];
        return response($response,200);
    }

}



