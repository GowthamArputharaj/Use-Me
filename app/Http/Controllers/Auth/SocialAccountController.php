<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\SocialAccount;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialAccountController extends Controller
{
    protected $dashboardRoute = 'dashboard';

    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider)
    {
        
        $socialUserData = $this->getSocialUser($provider);

        $socialUser = $socialUserData->user ?? null;
        
        return view('dashboard', compact('socialUser'));
    }

    // returns Social details of user
    public function getSocialUser($provider) // provider twitter, facebook, github
    {
        $socialUser = null;

        try {
            $socialUser = Socialite::driver($provider)->user();
    
            $user = User::updateOrCreate(
                ['email' => $socialUser->email],
                ['name' => $socialUser->name]
            );
        
            Auth::loginUsingId($user->id, true);
            
            $social_account = SocialAccount::firstOrCreate(
                ['user_id' => auth()->user()->id, 'provider_name' => $provider, 'provider_id' => $socialUser->id],
            );
        
        } catch (Exception $e) {
            // return redirect()->route('login');
            // throw $e;
        }

        return $socialUser;
    }
}
