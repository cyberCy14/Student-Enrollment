
  <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management</title>
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
    @vite('resources/css/app.css')

</head>
<body class="bg-gray-50 p-6">


 <!-- Logout Button (Top Right) -->
 <div class="absolute top-4 right-4">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition duration-200">
                Logout
            </button>
        </form>
    </div>

    
    <div class="max-w-4xl mx-auto">
        <!-- Error Messages -->
        @if($errors->any())
            <div class="mb-6 p-4 bg-red-100 border-l-4 border-red-500 text-red-700">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Student Form -->
        <div class="bg-white p-6 rounded-lg shadow-md mb-8">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">Student Information</h2>
            <form method="POST" action="{{route('register.student')}}" class="space-y-4">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-gray-700 mb-1">First name:</label>
                        <input type="text" name="fname" placeholder="First Name" 
                               class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div>
                        <label class="block text-gray-700 mb-1">Middle name:</label>
                        <input type="text" name="mname" placeholder="Middle Name" 
                               class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div>
                        <label class="block text-gray-700 mb-1">Last name:</label>
                        <input type="text" name="lname" placeholder="Last Name" 
                               class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-gray-700 mb-2">Gender</label>
                        <div class="flex items-center space-x-4">
                            <label class="inline-flex items-center">
                                <input type="radio" name="gender" value="M" required 
                                       class="text-blue-600 focus:ring-blue-500">
                                <span class="ml-2">MALE</span>
                            </label>
                            <label class="inline-flex items-center">
                                <input type="radio" name="gender" value="F" 
                                       class="text-blue-600 focus:ring-blue-500">
                                <span class="ml-2">FEMALE</span>
                            </label>
                        </div>
                    </div>
                    <div>
                        <label class="block text-gray-700 mb-1">Birthdate:</label>
                        <input type="date" name="date_of_birth" 
                               class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
                    </div>
                </div>

                <button type="submit" 
                        class="mt-4 px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-200">
                    Submit
                </button>
            </form>
        </div>

        <!-- Student Table -->
        <div class="bg-white p-6 rounded-lg shadow-md overflow-x-auto">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">Student Records</h2>
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">#</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Gender</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Birthdate</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($students as $student)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $student->id }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                {{ $student->lname }}, {{ $student->fname }} {{ $student->mname }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $student->gender }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $student->date_of_birth }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <a href="{{ route('update.student',['id'=>$student->id]) }}" 
                                   class="mr-2 px-3 py-1 bg-yellow-400 text-white rounded hover:bg-yellow-500 transition duration-200">
                                    Update
                                </a>
                                <a href="{{ route('delete.student', ['id'=>$student->id]) }}" 
                                   class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600 transition duration-200">
                                    Delete
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>