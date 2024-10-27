<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminRequest;
use App\Http\Requests\LoginRequest;

use App\Models\admin;
use Auth;
use Illuminate\Http\Request;

class AdminController extends Controller
{
  
    public function show(){
        return view('admin.register');
    }
    public function register(AdminRequest $request){
        $request->validated();
        $user = admin::create([
            'name'=> $request->name,
            'email'=> $request->email,
            'password'=> $request->password
        ]);
        return redirect()->route('admin.login')->with(['status'=>"Registration Successfull"]);
    }
    public function showLogin(){
        return view('admin.login');
    }
 
    public function login(LoginRequest $request){
        $request->validated();
         if(Auth::guard('admin')->attempt(['email'=>$request->email, 'password'=> $request->password])){
              return redirect()->route('admin.dashboard')->with(['status'=>'Login SuccessFully']);
         }
        return redirect()->route('admin.login')->withErrors(['email'=>"Invalid Crediential"]);
    }

    public function logout(){
      Auth::logout();
       return redirect()->route('admin.login');
    }

    public function dashboard(){
        return view('admin.dashboard');
    }
}
