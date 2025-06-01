<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
     @vite('resources/css/app.css')
</head>
<body class="bg-gray-50 p-6">
    <div class="max-w-md mx-auto">
        <!-- Error Messages -->
        @error('email')
            <div class="mb-6 p-4 bg-red-100 border-l-4 border-red-500 text-red-700">
                <div class="flex">
                    <div class="text-red-500">
                        {{ $message }}
                    </div>
                </div>
            </div>
        @enderror

        @error('password')
            <div class="mb-6 p-4 bg-red-100 border-l-4 border-red-500 text-red-700">
                <div class="flex">
                    <div class="text-red-500">
                        {{ $message }}
                    </div>
                </div>
            </div>
        @enderror

        <!-- Login Form -->
        <div class="bg-white p-6 rounded-lg shadow-md mb-8">
            <h2 class="text-center text-3xl font-extrabold text-gray-800 mb-4">Login</h2>
            <form method="POST" action="{{ route('auth.loginView') }}" class="space-y-4">
                @csrf

                <div>
                    <label class="block text-gray-700 mb-1">Email address:</label>
                    <input id="email" type="email" name="email" required autocomplete="email"
                           class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('email') border-red-500 @enderror">
                </div>

                <div>
                    <label class="block text-gray-700 mb-1">Password:</label>
                    <input id="password" type="password" name="password" required autocomplete="current-password"
                           class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('password') border-red-500 @enderror">
                </div>

                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input id="remember-me" name="remember" type="checkbox"
                               class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                        <label for="remember-me" class="ml-2 block text-sm text-gray-600">
                            Remember me
                        </label>
                    </div>

                    <div class="text-sm">
                        <a href="#" class="font-medium text-blue-600 hover:text-blue-800">
                            Forgot password?
                        </a>
                    </div>
                </div>

                <button type="submit" 
                        class="mt-4 px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-200 w-full">
                    Login
                </button>
            </form>

            <div class="mt-4 text-center">
                <p class="text-sm text-gray-600">
                    Don't have an account? 
                    <a href="{{ route('auth.registerView') }}" class="font-medium text-blue-600 hover:text-blue-800">
                        Register here
                    </a>
                </p>
            </div>
        </div>
    </div>
</body>
</html>