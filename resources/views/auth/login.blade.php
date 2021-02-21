<x-guest-layout>
    <style>
        .g-btn-grp {
            display: flex;
            justify-content: space-around;
        }
        .g-btn {
            display: block;
            background: lightblue;
            color: black;
            box-shadow: 4px 2px rgb(53, 26, 26);
            text-align: center;
            padding: 2px 10px;
            border: 2px solid green;
        }
    </style>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="ml-3">
                    {{ __('Log in') }}
                </x-button>
            </div>
            <div class="flex items-center justify-end mt-4 g-btn-grp">
                <a class=" text-gray-600 hover:text-gray-900 g-btn" href="{{ route('redirectToProvider', ['provider' => 'facebook']) }}">
                    <i class="fa fa-facebook"></i>
                    Facebook
                </a>
                <a class=" text-gray-600 hover:text-gray-900 g-btn" href="{{ route('redirectToProvider', ['provider' => 'twitter']) }}">
                    <i class="fa fa-twitter"></i>
                    Twitter
                </a>
                <a class=" text-gray-600 hover:text-gray-900 g-btn" href="{{ route('git.auth.redirect') }}">
                    <i class="fa fa-github"></i>
                    Github
                </a>
            </div>

        </form>
    </x-auth-card>
</x-guest-layout>
