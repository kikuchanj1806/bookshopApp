<?php

namespace App\Http\Controllers\admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
    {
        public function showLoginForm()
        {
            return view('admin.auth.login');
        }

        public function login(Request $request)
        {
            $username = $request->input('username');
            $password = $request->input('password');

            $credentials = [
                'username' => $username,
                'password' => $password
            ];

            if (Auth::attempt($credentials, $request->input('remember'))) {
                // Authentication passed...

                return redirect()->route('admin');
            }


            Session::flash('error', 'Tài khoản hoặc mật khẩu không đúng');
            return redirect()->back();
        }

        public function logout()
        {
            Auth::logout();
            return redirect('/admin/login');
        }
    }
