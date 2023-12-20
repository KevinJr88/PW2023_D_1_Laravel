<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use App\Mail\MailSend;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Session;
use Spatie\Backtrace\File;

class RegisterController extends Controller
{

    public function register()
    {
        return view('register');
    }


    public function actionRegister(Request $request)
    {
        $str = Str::random(100);
        // dd($request->all());
        $default = new UploadedFile(public_path('/images/makanan/doublebun.png'), 'default.png', 'image/png', null, true);
        $image = $default->store('public/users');
        $user = User::create([
            'email' => $request->input('email'), // Make sure you are retrieving the email from the request
            'username' => $request->input('username'),
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
            'address' => $request->input('address'),
            'password' => Hash::make($request->password),
            'verify_key' => $str,
            'image' => $image,
        ]);
        
        $details = [
            'username' => $request->username,
            'website' => 'Flavorscape Restaurant',
            'datetime' => date('Y-m-d H:i:s'),
            'url' => request()->getHttpHost() . '/register/verify/' . $str
        ];

        Mail::to($request->email)->send(new MailSend($details));

        Session::flash('message', 'Link verifikasi telah dikirim ke email anda. Silahkan cek email anda untuk mengaktifkan akun.');
        return redirect('register');
    }

    /**
     * Display the specified resource.
     */
    public function verify($verify_key)
    {
        $keyCheck = User::select('verify_key')
            ->where('verify_key', $verify_key)
            ->exists();

        if ($keyCheck) {
            $user = User::where('verify_key', $verify_key)
                ->update([
                    'active' => 1,
                    'email_verified_at' => date('Y-m-d H:i:s'),
                ]);

            return view('verification');
        } else {
            return "Keys tidak valid.";
        }
    }


}