<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegistrationRequest as Reg;
use App\Models\User;
use Auth;
use Request;


class Usercontroller extends Controller
{

    public function show(){
        return view('user.register');
    }
    public function register(Reg $request){
        $request->validated();
        $user = User::create([
            'name'=> $request->name,
            'email'=> $request->email,
            'password'=> $request->password
        ]);
        return redirect()->route('login')->with(['status'=>"Registration Successfull"]);
    }
    public function showLogin(){
        return view('user.login');
    }
 
    public function login(LoginRequest $request){
        $request->validated();
         if(Auth::guard('web')->attempt(['email'=>$request->email, 'password'=> $request->password])){
              return redirect()->route('user.dashboard')->with(['status'=>'Login SuccessFully']);
         }
        return redirect()->route('login')->withErrors(['email'=>"Invalid Crediential"]);
    }

    public function logout(){
      Auth::logout();
       return redirect()->route('login');
    }

    public function dashboard(){
        return view('user.dashboard');
    }

}
