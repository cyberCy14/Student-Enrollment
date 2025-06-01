<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
    @vite('resources/css/app.css')

</head>
<body class="bg-gray-50 p-6">
    <div class="max-w-md mx-auto">
        <!-- Error Messages -->
        @if(session('error'))
            <div class="mb-6 p-4 bg-red-100 border-l-4 border-red-500 text-red-700">
                <div class="flex">
                    <div class="text-red-500">
                        {{ session('error') }}
                    </div>
                </div>
            </div>
        @endif

        <!-- Registration Form -->
        <div class="bg-white p-6 rounded-lg shadow-md mb-8 ">
            <h2 class="text-center text-3xl font-extrabold text-gray-800 mb-4">Register</h2>
            <form method="POST" action="{{ route('register.post') }}" class="space-y-4">
                @csrf

                <div>
                    <label class="block text-gray-700 mb-1">Name:</label>
                    <input id="name" type="text" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                           class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('name') border-red-500 @enderror">
                </div>

                <div>
                    <label class="block text-gray-700 mb-1">Email address:</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email"
                           class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('email') border-red-500 @enderror">
                    @error('email')
                        <p class="mt-1 text-sm text-red-600">
                            <strong>{{ $message }}</strong>
                        </p>
                    @enderror
                </div>

                <div>
                    <label class="block text-gray-700 mb-1">Password:</label>
                    <input id="password" type="password" name="password" required autocomplete="new-password"
                           class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('password') border-red-500 @enderror">
                    @error('password')
                        <p class="mt-1 text-sm text-red-600">
                            <strong>{{ $message }}</strong>
                        </p>
                    @enderror
                </div>

                <div>
                    <label class="block text-gray-700 mb-1">Confirm Password:</label>
                    <input id="password-confirm" type="password" name="vpassword" required autocomplete="new-password"
                           class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>

                <button type="submit" 
                        class="mt-4 px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-200 w-full">
                    Register
                </button>
            </form>

            <div class="mt-4 text-center">
                <p class="text-sm text-gray-600">
                    Already have an account? 
                    <a href="{{ route('auth.loginView') }}" class="font-medium text-blue-600 hover:text-blue-800">Sign in</a>
                </p>
            </div>
        </div>
    </div>
</body>
</html>