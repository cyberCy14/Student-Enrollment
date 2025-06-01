<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Student</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 min-h-screen flex items-center justify-center p-4">
    <div class="w-full max-w-md bg-white rounded-lg shadow-md p-6">
        <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Update Student Record</h2>
        
        <form method="POST" action="{{ route('student.update', $student->id) }}" class="space-y-4">
            @csrf
            @method('PUT')

            <!-- First Name -->
            <div>
                <label class="block text-gray-700 mb-1">First Name</label>
                <input type="text" name="fname" placeholder="First Name" value="{{ $student->fname }}"
                       class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            </div>

            <!-- Middle Name -->
            <div>
                <label class="block text-gray-700 mb-1">Middle Name</label>
                <input type="text" name="mname" placeholder="Middle Name" value="{{ $student->mname }}"
                       class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Last Name -->
            <div>
                <label class="block text-gray-700 mb-1">Last Name</label>
                <input type="text" name="lname" placeholder="Last Name" value="{{ $student->lname }}"
                       class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Gender (with current selection) -->
            <div>
                <label class="block text-gray-700 mb-2">Gender</label>
                <div class="flex space-x-4">
                    <label class="inline-flex items-center">
                        <input type="radio" name="gender" value="M" 
                               class="text-blue-600 focus:ring-blue-500"
                               {{ $student->gender == 'M' ? 'checked' : '' }}>
                        <span class="ml-2">Male</span>
                    </label>
                    <label class="inline-flex items-center">
                        <input type="radio" name="gender" value="F" 
                               class="text-blue-600 focus:ring-blue-500"
                               {{ $student->gender == 'F' ? 'checked' : '' }}>
                        <span class="ml-2">Female</span>
                    </label>
                </div>
            </div>

            <!-- Birth Date -->
            <div>
                <label class="block text-gray-700 mb-1">Birth Date</label>
                <input type="date" name="date_of_birth" value="{{ $student->date_of_birth }}"
                       class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Submit Button -->
            <button type="submit" 
                    class="w-full mt-6 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-200">
                Update Student
            </button>
        </form>
    </div>
</body>
</html>