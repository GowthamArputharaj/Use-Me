<?php

use App\Http\Controllers\Auth\SocialAccountController;
use App\Models\SocialAccount;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


Route::get('/login/{provider}', 'App\Http\Controllers\Auth\SocialAccountController@redirectToProvider')->name('redirectToProvider');
Route::get('/login/{provider}/callback', 'App\Http\Controllers\Auth\SocialAccountController@handleProviderCallback');

Route::get('/auth/redirect', function () {
    return Socialite::driver('github')->redirect();
})->name('git.auth.redirect');

Route::get('/auth/callback', function () {
    $provider = 'github';
    $socialUser = [];

    $socialUserData = (new SocialAccountController)->getSocialUser('github');

    $socialUser = $socialUserData->user;

    return view('dashboard', compact('socialUser'));
    
});

Route::get('test', function ()
{
    $user = User::updateOrCreate(
        ['email' => 'gowtham.amateur.id@gmail.com'],
        ['name' => 'Gowtham Arputharajj']
    );

    Auth::loginUsingId($user->id);


    dd($user, auth()->user()->id ?? 'wrong', auth(), auth()->user());
});