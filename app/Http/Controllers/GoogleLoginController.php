<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;

class GoogleLoginController extends Controller
{
    public function redirectToGoogle(){
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback(){
        $user = Socialite::driver('google')->user();
        $data = User::where('email',$user->getEmail())->first();
        if (is_null($data)) {
            $user['name'] = $user->name;
            $user['email'] = $user->email;
            $data = User::create($user);
        }
      
        Auth::login($data);
        return redirect()->route('categorias.index');
    }
}
