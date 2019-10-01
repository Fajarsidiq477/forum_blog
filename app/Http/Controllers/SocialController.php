<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator,Redirect,Response,File ;
use Socialite ;
use Illuminate\Support\Str ;
use App\Models\User ;

class SocialController extends Controller
{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {  
        $getInfo = Socialite::driver($provider)->user(); 
        $user = $this->createUser($getInfo,$provider); 
        auth()->login($user); 
        return redirect()->to('/home');
    }

    public function createUser($getInfo,$provider)
    {
        $user = User::where('provider_id', $getInfo->id)->first();
        if (!$user) {
            $user = User::create([
                'name'     => $getInfo->name,
                'email'    => $getInfo->email,
                'provider' => $provider,
                'provider_id' => $getInfo->id,

                'username' => strtolower(str_replace(' ', '', $getInfo->name)) . rand(100, 999),
                'password' => bcrypt(Str::random()),
                'remember_token' => csrf_token()
            ]);
        }

        return $user;

    }
}
