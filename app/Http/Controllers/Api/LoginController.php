<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Session;

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
            return view('UserView.login');
        }
    }

    public function actionLogin(Request $request)
    {   
        $data = [
            'username' => $request->input('username'),
            'password' => $request->input('password'),
        ];
        if(Auth::attempt($data)){
            $user = Auth::user();

            if($user->active){
                return redirect('home');
            }else{
                Auth::logout();
                Session::flash('error', 'Akun anda belum diverifikasi. Silahkan cek email anda');
                return redirect()->route('login.index');
            }
        }else{
            Session::flash('error', 'Username atau Password salah');
            return redirect()->route('login.index');
        }
    
    }
    

    public function actionLogout()
    {
        Auth::logout();
        
        return redirect('/');
    }
}