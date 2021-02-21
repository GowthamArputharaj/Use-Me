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

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
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
