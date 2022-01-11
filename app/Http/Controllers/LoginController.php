<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only(['kode_login','password']);
        if (Auth::guard('web')->attempt($credentials)) {
            $ta = is_null($request->ta) ? ['ta' => "2019/2020"] : $request->only('ta');
            Session::put('ta', $ta);
            
            return redirect()->route('dashboard');
        }
        return back()->withErrors(['msg' => 'Kode / Password anda salah tolong dicheck kembali']);
    }

    public function logout()
    {
        if (Auth::guard('web')->check()) {
            Auth::logout();
        }
        return redirect()->route('login');
    }
}
