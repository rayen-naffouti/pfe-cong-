<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cookie;
use Symfony\Component\HttpFoundation\Response;

use App\Models\User;
use App\Models\Personnel;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $user = new User;
        // $input = $request->all();
        // Personnel::create($input);
        // return User::create([
        //     'name' => $request->input('name'),
        //     'email' => $request->input('email'),
        //     'password' => Hash::make ($request->input('password')),
        //     'image' => $request->input('image'),
        // ]);

        $filename = $request->file('image')->getClientOriginalName();
        $filenameonly = pathinfo($filename, PATHINFO_FILENAME);
        $extenshion = $request->file('image')->getClientOriginalExtension();
        $compic = str_replace(' ','_',$filenameonly).'-'.rand() . '_'.time(). '.'.$extenshion;
        $path = $request->file('image')->move('image',$compic);

        
        $input = $request->all();
        Personnel::create($input);
       
        
        return User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make ($request->input('password')),
            'image' => $request->input('image', $compic),
            
        ]);
    }

    public function login(Request $request)
    {
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response([
                'message' => 'Invalid credentials!'
            ], Response::HTTP_UNAUTHORIZED);
        }
        $user = Auth::user();

        $token = $user->createToken('token')->plainTextToken;

        $cookie = cookie('jwt', $token, 60 * 24); // 1 day
        
         return response([
            'message' => $token
        ])->withCookie($cookie);
    }


    public function logout()
    {
        $cookie = Cookie::forget('jwt');

        return response([
            'message' => 'Success'
        ])->withCookie($cookie);
    }


    public function user()
    {
        return Auth::user();
    }


}
