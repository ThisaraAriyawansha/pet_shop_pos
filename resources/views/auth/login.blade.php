{{-- <x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 text-sm font-medium text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')" required
                    autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block w-full mt-1" type="password" name="password" required
                    autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="text-sm text-gray-600 ms-2">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="text-sm text-gray-600 underline rounded-md hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="ms-4">
                    {{ __('Log in......') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout> --}}

{{--
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tele Tech Electronics | Login</title>
    <link rel="icon" href="{{ asset('images/favicon.ico') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('styles/common.css') }}">
</head>

<body>
    <div class="flex items-center justify-center h-dvh">
        <div class="w-[60%] max-sm:w-[90%] shadow-lg rounded-lg h-1/2 max-sm:h-2/3 flex max-lg:flex-col">
            <div
                class="bg-[#000000C9] rounded-s-lg max-lg:rounded-none max-lg:rounded-t-lg w-1/2 max-lg:w-full max-lg:h-1/3 flex justify-center items-center">
                <img class="w-75 max-lg:w-[90px]" src="./images/logo.png" alt="logo">
            </div>
            <div class="flex flex-col justify-between w-1/2 h-full p-6 controls-side max-lg:w-full">
                <!--heading-->
                <h1 class="text-3xl max-sm:text-2xl text-[#0086B8]">Log In Now</h1>
                <!--inputs-->
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    @include('_message')
                    <input placeholder="Enter your email" id="email" type="email" name="email"
                        :value="old('email')" required autofocus autocomplete="username"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    <div class="relative w-full">
                        <input required autocomplete="current-password" type="password" name="password" id="password"
                            placeholder="Enter your password"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 pr-10">
                        <button type="button" id="togglePassword"
                            class="absolute inset-y-0 right-0 flex items-center px-3 text-gray-500 hover:text-blue-600">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-eye" viewBox="0 0 16 16">
                                <path
                                    d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z" />
                                <path
                                    d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0" />
                            </svg>
                        </button>
                    </div>
                    <!--forgot pasword-->
                    <span class="flex justify-between w-full max-sm:text-xs">
                        <a href="#">Forgot password</a>
                        <label class="flex items-center gap-3 select-none" for="remember_user">
                            <input type="checkbox" name="remember_user" id="remember_user"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                            Remember Me
                        </label>
                    </span>

                    <!--login btn-->
                    <div class="flex items-center justify-end mt-4">
                        @if (Route::has('password.request'))
                            <a class="text-sm text-gray-600 underline rounded-md hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif


                    </div>

                    <span class="flex justify-center">

                        <input type="submit" value="Login"  class="rounded-full bg-[#0086B8] hover:scale-75 transition-all w-20 max-sm:w-12 max-sm:text-xs aspect-square text-white">
                        <x-button
                           >
                            {{ __('Login') }}
                        </x-button>

                    </span>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
 --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $settings[6]->value}} | Login</title>
    <link rel="icon" href="../{{ $settings[13]->value}}">
    <script src="https://cdn.tailwindcss.com"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div class="flex flex-col justify-center items-center h-dvh bg-[{{ $settings[2]->value}}]">
        <div class="w-[80%] max-sm:w-[90%] h-[60%] max-lg:h-[80%] flex max-lg:flex-col items-center justify-center">
            <div class="flex items-center justify-center w-1/2 max-lg:w-full max-lg:h-1/3">
                <img class="object-contain w-full h-full" src="{{ asset($settings[1]->value) }}" alt="logo">
            </div>
            <div class="md:w-1/2 max-md:w-full">
                <!--form-->
                <form method="POST" action="{{ route('login') }}" class="flex flex-col justify-center w-full gap-6 p-6 py-6 bg-white rounded-lg controls-side h-fit xl:gap-12">
                    @csrf
                    <!--heading-->
                    <h1 class="text-3xl max-sm:text-2xl text-[{{ $settings[3]->value}}] text-center font-black">Log In Now</h1>

                    <!--inputs-->
                    <input type="email" name="email" id="email" placeholder="Enter your email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    <div class="relative w-full">
                        <input required autocomplete="current-password" type="password" name="password" id="password" placeholder="Enter your password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 pr-10">
                        <button type="button" id="togglePassword" class="absolute inset-y-0 right-0 flex items-center px-3 text-gray-500 hover:text-blue-600">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z" />
                                <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0" />
                            </svg>
                        </button>
                    </div>
                    <!--forgot password & remember me-->
                    <span class="flex justify-between w-full max-sm:text-xs">
                        <a href="#" class="px-2 py-1 border max-2xl:text-xs">Forgot password</a>
                        <label class="flex items-center gap-3 select-none max-2xl:text-xs" for="remember_user">
                            <input type="checkbox" name="remember_user" id="remember_user" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                            Remember Me
                        </label>
                    </span>
                    <!--login btn-->
                    <span class="flex justify-center">
                        <input type="submit" value="Login" class="rounded-full bg-[{{ $settings[4]->value}}] hover:scale-75 transition-all w-20 max-sm:text-sm aspect-square text-[{{ $settings[5]->value }}]">
                    </span>
                </form>
                <span class="flex justify-center w-full mt-6">
                    <p class="text-sm text-center text-white">Powered by Plexcode.</p>
                </span>
            </div>
        </div>
    </div>
</body>

<script>
     document.getElementById('togglePassword').addEventListener('click', function() {
        const passwordField = document.getElementById('password');

        // Toggle password field type
         if (passwordField.type === 'password') {
            passwordField.type = 'text';
        } else {
            passwordField.type = 'password';
        }
    });

    // function Login() {
    //     let email = document.getElementById("email").value;
    //     let password = document.getElementById("password").value;
    //     let retVal = false;
    //     if (email == "admin" && password == "123") {
    //         retVal = true;
    //         window.location.href = "main-panel/";
    //     }
    //     return retVal;
    // }
</script>

</html>