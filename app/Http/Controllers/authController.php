<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class authController extends Controller
{


    public function showLoginForm(){

        return view('auth.loginView');
    }

    public function showRegisterForm(){
        
        return view ('auth.registerView');
    }

    public function login(Request $request){

            $checkUser = User::where('email', $request->email)->first();

            if ($checkUser && Hash::check($request->password, $checkUser->password)) {
                Session::push('user', $checkUser); 
                return redirect('/');
            } else {

                return redirect('/login')->withErrors([
                    'login' => 'Invalid email or password.',
                ])->withInput();
            }


        // $checkUser = User::where('email', $request->email)->where('password', $request->password);

        // if($checkUser){
        //     Session::push('user', $checkUser);
        //     return redirect('/');
        // } else{
        //     redirect('/login')->withErrors('error', 'User not found');
        // }


        // $credentials = $request->validate([
        //     'email' => 'required|email',
        //     'password' => 'required',
        // ]);

        // if(Auth::attempt($credentials)){
        //     $request->session()->regenerate();
        //     return redirect('/');       
        // }
        // else{
        //     return back()->withErrors(['email'  => 'Invalid login credentials. Please check your email and password.']);
        // }
    }

    public function register(Request $request){

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'vpassword' => 'required'
        ]);

        if($request->password == $request->vpassword){
            $save = User::insert([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request['password']), 
            ]);

            return ($save) ? redirect()->route('auth.loginView') : redirect()->route('auth.registerView');
        } 
        else{
            return redirect()->route('auth.registerView')->with('error', "Password does not match!");
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
