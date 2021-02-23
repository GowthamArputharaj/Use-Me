<?php

use App\Http\Controllers\Auth\SocialAccountController;
use App\Http\Controllers\PostsController;
use App\Models\SocialAccount;
use App\Models\User;
use Illuminate\Http\Request;
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

Route::get('/dashboard', function (Request $request) {
    $socialUser = $request->socialUser ?? null;
    return view('dashboard', compact('socialUser'));
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

	$user = User::where('email', $socialUserData->email)->first();

	if($user) {
		Auth::loginUsingId($user->id);
	}

    $socialUser = $socialUserData->user ?? null;

    return redirect()->route('dashboard')->with(['socialUser', $socialUser]);
    
});


Route::get('posts-search', [PostsController::class, 'postSearch'])->name('posts.search');
Route::get('posts-client-search', [PostsController::class, 'postSearch'])->name('posts.client-search');
Route::resource('posts', PostsController::class)->middleware(['auth']);



Route::get('logt', function() {
	Auth::logout();
	return redirect()->route('login');
});
