<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(){
        return view('auth.register');
    }

    public function register_post(Request $request){
 
        //insert ke table user
        User::create([
            'name' => request('name'),
            'address' => request('address'),
            'no_telp' => request('no_telp'),
            'email' => request('email'),    
            'password'=>bcrypt(request('email')),
            'role' => request('role'),
            'status' => 1,
       ]);
      
      return redirect ('/login')->with('sukses','Data Berhasil Diinput');
    }

    public function login(){
        return view('auth.login');
    }

    public function login_post(Request $request) {

        $this->validate($request,[
            'email'=>'required|email',
            'password'=>'required',
        ]);

        
        if(!Auth::attempt($request->only('email','password'))){
            return back()->with('status','Login gagal, silahkan isi username dan password dengan benar');
        }

        return redirect('/dashboard');
    }
  
    public function logout() {
        Auth::logout();
        return redirect('/login');
    }

    public function dashboard(){
        return view('dashboard.dashboard');
    }
}
