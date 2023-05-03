<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use App\Models\User;
use Validator;
use Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required'
        ]);

        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if ($validator->fails()) {
            return back()->withErrors($validator->errors());
        } else if (Auth::guard('admin')->attempt($data)) {
            return redirect()->route('admin.dashboard')->with('alert-success-login', ' Berhasil Login');
        }else if (Auth::guard('user')->attempt($data)) {
            return redirect()->route('admin.dashboard');
        } else {
            return back()->with('alert-error-login', 'Password atau username tidak tersedia, harap periksa lagi!');
        }
    }


    public function register(Request $request)
    {
        // Jangan menggunakan $this->validate karena akan langsung return dan tidak next ke baris dibawahnya jika error
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|unique:users'
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        //$user->save();

        if ($validator->fails()) {
            return back()->withErrors($validator->errors());
        } else if ($user->save()) {
            return back()->with('alert-success-register', 'Anda berhasil mendaftar, silahkan login!');
        } else {
            return back()->with('alert-error-register', 'Server Bermasalah');
        }
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('home');
    }

    public function logoutUser()
    {
        Auth::guard('user')->logout();
        return redirect()->route('home');
    }
}
