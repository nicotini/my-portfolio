<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request) {
        //validator

        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'required',
            'confirm_password' => 'required|same:password'
        ]);

        if($validator->fails()) {
            $responce = [
                'success' => false,
                'message' => $validator->errors()
            ];
            return $responce()->json($responce, 400);
        }
        $input = $request->all();
        $input['password'] = bcrypt( $input['password']);
        $user = User::create($input);

        $success['token'] = $user->createToken('MyApp')->plainTextToken;
        $success['name'] = $user->name;

        $responce = [
            'success' => true,
            'data' => $success,
            'message' => 'User register successfully'
        ];
        return response()->json($responce, 200);


    }

    public function login(Request $request) {
        if(Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ]));
        $user= Auth::user();
        $user= $request->user();
        $success['token'] = $user->createToken('MyApp')->plainTextToken;
        $success['name'] = $user->name;

        $responce = [
            'success' => true,
            'data' => $success,
            'message' => 'User register successfully'
        ];
        return response()->json($responce, 200);


        
    }
}
