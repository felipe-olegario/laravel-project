<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Application Name')</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <nav class="bg-blue-500 p-4">
        <div class="container mx-auto flex items-center justify-between">
            <div class="flex space-x-4">
                <a href="{{ route('vaccines.index') }}" class="text-white hover:bg-blue-600 px-3 py-2 rounded-md">Vaccines</a>
                <a href="{{ route('employees.index') }}" class="text-white hover:bg-blue-600 px-3 py-2 rounded-md">Employees</a>
                <a href="{{ route('vaccines.create') }}" class="text-white hover:bg-blue-600 px-3 py-2 rounded-md">Add Vaccine</a>
                <a href="{{ route('employees.create') }}" class="text-white hover:bg-blue-600 px-3 py-2 rounded-md">Add Employee</a>
            </div>
        </div>
    </nav>
    
    <main class="container mx-auto p-6">
        @yield('content')
    </main>
</body>
</html>
