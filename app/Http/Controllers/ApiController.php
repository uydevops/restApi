<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiController extends Controller
{
      public function login(Request $request)
    {

        $email=$request->email;
        $password=$request->password;

        if(Auth::attempt(['email' => $email, 'password' => $password]))
        {
            $user = Auth::user();
            $success['token'] =  $user->createToken('Login')->accessToken;
            return response()->json(['success' => $success], 200);
        }
        else
        {
            return response()->json(['error'=>'Unauthorised'], 401);
        }

}
}
