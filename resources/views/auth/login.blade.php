<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $settings[6]->value}} | Login</title>
    <link rel="icon" href="../{{ $settings[13]->value}}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        .gradient-bg {
            background: linear-gradient(135deg, {{ $settings[2]->value }} 0%, {{ $settings[2]->value }}80 100%);
        }
        .btn-primary {
            background-color: {{ $settings[4]->value }};
            color: {{ $settings[5]->value }};
            transition: all 0.3s ease;
        }
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        .input-field:focus {
            border-color: {{ $settings[4]->value }};
            box-shadow: 0 0 0 2px {{ $settings[4]->value }}20;
        }
    </style>
</head>

<body class="flex items-center justify-center min-h-screen p-4 gradient-bg">
    <div class="flex flex-col w-full max-w-4xl overflow-hidden bg-white shadow-xl rounded-2xl lg:flex-row">
        <!-- Left Side - Branding -->
        <div class="lg:w-1/2 bg-gradient-to-br from-[{{ $settings[2]->value }}] to-[{{ $settings[4]->value }}] p-8 flex flex-col justify-center items-center text-white">
            <div class="w-full max-w-xs mb-8">
                <img src="{{ asset($settings[1]->value) }}" alt="Company Logo" class="w-full h-auto">
            </div>
            <h2 class="mb-2 text-2xl font-bold">Welcome Back!</h2>
            <p class="text-center opacity-90">Sign in to access your account and continue your journey with us.</p>
        </div>
        
        <!-- Right Side - Login Form -->
        <div class="p-8 lg:w-1/2 sm:p-12">
            <h1 class="mb-2 text-3xl font-bold text-gray-800">Sign In</h1>
            <p class="mb-8 text-gray-600">Enter your credentials to access your account</p>
            
            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf
                
                <!-- Email Field -->
                <div>
                    <label for="email" class="block mb-1 text-sm font-medium text-gray-700">Email Address</label>
                    <input type="email" name="email" id="email" placeholder="your@email.com" 
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg input-field focus:outline-none focus:ring-1" 
                           required autocomplete="email">
                </div>
                
                <!-- Password Field -->
                <div>
                    <div class="flex items-center justify-between mb-1">
                        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    </div>
                    <div class="relative">
                        <input type="password" name="password" id="password" placeholder="••••••••" 
                               class="w-full px-4 py-3 pr-10 border border-gray-300 rounded-lg input-field focus:outline-none focus:ring-1" 
                               required autocomplete="current-password">
                        <button type="button" id="togglePassword" class="absolute text-gray-400 transform -translate-y-1/2 right-3 top-1/2 hover:text-gray-600">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                            </svg>
                        </button>
                    </div>
                </div>
                
                <!-- Remember Me -->

                
                <!-- Submit Button -->
                <button type="submit" 
                        class="w-full px-4 py-3 text-lg font-medium rounded-lg shadow-sm btn-primary">
                    Sign In
                </button>
                

            </form>
            
            <!-- Footer -->
            <div class="mt-12 text-xs text-center text-gray-500">
                <p>© {{ date('Y') }} {{ $settings[6]->value }}. All rights reserved.</p>
                <p class="mt-1">Powered by Plexcode</p>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('togglePassword').addEventListener('click', function() {
            const passwordField = document.getElementById('password');
            const icon = this.querySelector('svg');
            
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                icon.innerHTML = `
                    <path d="M13.359 11.238C15.06 9.72 16 8 16 8s-3-5.5-8-5.5a7.028 7.028 0 0 0-2.79.588l.77.771A5.944 5.944 0 0 1 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.134 13.134 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755-.165.165-.337.328-.517.486l.708.709z"/>
                    <path d="M11.297 9.176a3.5 3.5 0 0 0-4.474-4.474l.823.823a2.5 2.5 0 0 1 2.829 2.829l.822.822zm-2.943 1.299.822.822a3.5 3.5 0 0 1-4.474-4.474l.823.823a2.5 2.5 0 0 0 2.829 2.829z"/>
                    <path d="M3.35 5.47c-.18.16-.353.322-.518.487A13.134 13.134 0 0 0 1.172 8l.195.288c.335.48.83 1.12 1.465 1.755C4.121 11.332 5.881 12.5 8 12.5c.716 0 1.39-.133 2.02-.36l.77.772A7.029 7.029 0 0 1 8 13.5C3 13.5 0 8 0 8s.939-1.721 2.641-3.238l.708.709zm10.296 8.884-12-12 .708-.708 12 12-.708.708z"/>
                `;
            } else {
                passwordField.type = 'password';
                icon.innerHTML = `
                    <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                    <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                `;
            }
        });
    </script>
</body>
</html>