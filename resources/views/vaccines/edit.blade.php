<!DOCTYPE html>
<html>
<head>
    <title>Edit Vaccine</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-6 bg-white rounded-lg shadow-md mt-10">
        <a href="{{ route('vaccines.index') }}" class="text-blue-500 hover:text-blue-700 text-sm mb-6 inline-flex items-center">
            <i class="fas fa-arrow-left mr-2"></i>
            Back to Vaccine List
        </a>

        <h1 class="text-2xl font-bold mb-6">Edit Vaccine</h1>
        <form action="{{ route('vaccines.update', $vaccine->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name</label>
                <input type="text" name="name" id="name" class="form-input mt-1 block w-full border p-2 border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50" value="{{ old('name', $vaccine->name) }}" required>
                @error('name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="batch" class="block text-gray-700 text-sm font-bold mb-2">Batch Number</label>
                <input type="text" name="batch" id="batch" class="form-input mt-1 block w-full border border-gray-300 p-2 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50" value="{{ old('batch', $vaccine->batch) }}" required>
                @error('batch')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="expiration_date" class="block text-gray-700 text-sm font-bold mb-2">Expiration Date</label>
                <input type="date" name="expiration_date" id="expiration_date" class="form-input mt-1 block w-full border p-2 border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50" value="{{ old('expiration_date', $vaccine->expiration_date->format('Y-m-d')) }}" required>
                @error('expiration_date')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md shadow hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">Update</button>
        </form>
    </div>
</body>
</html>
