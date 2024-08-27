<!DOCTYPE html>
<html>
<head>
    <title>Vaccine Details</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-6 bg-white rounded-lg shadow-md mt-10">
        <h1 class="text-3xl font-bold mb-6">Vaccine Details</h1>
        <div class="mb-4">
            <p class="text-lg"><strong class="font-semibold">Name:</strong> {{ $vaccine->name }}</p>
            <p class="text-lg"><strong class="font-semibold">Batch Number:</strong> {{ $vaccine->batch }}</p>
            <p class="text-lg"><strong class="font-semibold">Expiration Date:</strong> {{ $vaccine->expiration_date->format('d/m/Y') }}</p>
        </div>
        <a href="{{ route('vaccines.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md shadow hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">Back to List</a>
    </div>
</body>
</html>
