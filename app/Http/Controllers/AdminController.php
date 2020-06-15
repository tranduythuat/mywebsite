<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function loginAdmin()
    {
        if(Auth::check()){
            
            return redirect()->to('/dashboard');
        }

        return view('login');
    }

    public function postLoginAdmin(Request $request)
    {
        $remember = $request->has('remember_me') ? true : false;
         
        if(auth()->attempt([
            'email' => $request->email,
            'password' => $request->password
        ], $remember)){
            return redirect()->to('/dashboard');
        }

        return back()->with('alert', 'Tài khoản không đúng hoặc sai mật khẩu!');
    }

    public function logout()
    {
        Auth::logout();
    }
}
