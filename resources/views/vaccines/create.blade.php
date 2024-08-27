<!DOCTYPE html>
<html>
<head>
    <title>Add New Vaccine</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="container mx-auto p-4 bg-white rounded-lg shadow-lg">
        <div class="mb-4">
            <a href="{{ route('vaccines.index') }}" class="text-blue-500 hover:text-blue-700">← Back to Vaccine List</a>
        </div>
        <h1 class="text-2xl font-bold mb-4">Add New Vaccine</h1>
        <form action="{{ route('vaccines.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-semibold mb-2">Name</label>
                <input type="text" name="name" id="name" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ old('name') }}" required>
                @error('name')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="batch" class="block text-gray-700 font-semibold mb-2">Batch Number</label>
                <input type="text" name="batch" id="batch" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ old('batch') }}" required>
                @error('batch')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="expiration_date" class="block text-gray-700 font-semibold mb-2">Expiration Date</label>
                <input type="date" name="expiration_date" id="expiration_date" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ old('expiration_date') }}" required>
                @error('expiration_date')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">Save</button>
        </form>
    </div>

</body>
</html>
