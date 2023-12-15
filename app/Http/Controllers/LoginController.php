<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Auth::check()){
            return redirect('home');
        }else{
            return view('login');
        }
    }

    public function actionLogin(Request $request)
    {
        $data = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];
        if(Auth::attempt($data)){
            if($user->active){
                return redirect('home');
            }else{
                Auth::logout();
                Session::flash('error','Akun anda belum diverifikasi. Silahkan cek email Anda.');
                return redirect('login');
            }
        }else{
            Session::flash('error', 'Email atau password salah');
            return redirect('login');
        }
    }

    public function actionLogout()
    {
        Auth::logout();
        return redirect('/');
    }
}