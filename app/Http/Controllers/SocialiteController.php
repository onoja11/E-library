<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;

class SocialiteController extends Controller
{
    public function  redirectTo() 
    {
        return Socialite::driver('github')->redirect();    
    }

    public function  callback() 
    {
        $githubUser = Socialite::driver('github')->user();
 
        // dd($githubUser->getNickname());

        $user = User::updateOrCreate([
            'github_id' => $githubUser->id,
        ], [
            'name' => !$githubUser->name ? $githubUser->getNickname() : $githubUser->name,
            'email' => !$githubUser->email ? $githubUser->name . mt_rand() . '@spotlightng.com' : $githubUser->email,
            'password' => Hash::make(Str::password(16)),
            'last_github_login' => now()
        ]);
     
        Auth::login($user);
     
        return redirect('/home');
    }
}
