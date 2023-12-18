<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Session;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Auth::check()){
            return redirect('UserView.home');
        }else{
            return view('UserView.login');
        }
    }

    public function actionLogin(Request $request)
    {   
        $credentials = [
            'username' => $request->input('username'),
            'password' => $request->input('password'),
        ];

        //dd($credentials);

        if (!Auth::attempt($credentials)) {

            return response(['message' => 'Invalid Credential'], 401);
            
        } 
        
        $user = Auth::user();
            
            
        if ($user->active) {

            return response()->redirect('home',[
                    'message' => 'Authenticated',
                    'user' => $user,
                    'token_type' => 'Bearer',
                    'access_token' => $token
                ]);
        } else {
            Auth::logout();
            return response()->redirect('login',[
                'message' => 'User is not Active',
            ]);
        }
    }
    

    public function actionLogout()
    {
        Auth::logout();

        return response([
            'message' => 'Logout',
        ]);
        return redirect('/');
    }
}