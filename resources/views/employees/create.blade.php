<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Employee</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

    <div class="container mx-auto p-8">
        <div class="mb-4">
            <a href="{{ route('employees.index') }}" class="text-blue-500 hover:text-blue-700">← Back to Employee List</a>
        </div>
        <h1 class="text-2xl font-bold mb-6">Create Employee</h1>
        <form action="{{ route('employees.store') }}" method="POST" class="bg-white p-6 rounded-lg shadow-lg">
            @csrf
            <div class="mb-4">
                <label for="cpf" class="block text-gray-700">CPF</label>
                <input type="text" name="cpf" id="cpf" class="w-full p-2 border border-gray-300 rounded mt-1" value="{{ old('cpf') }}" required>
                @error('cpf')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label for="full_name" class="block text-gray-700">Full Name</label>
                <input type="text" name="full_name" id="full_name" class="w-full p-2 border border-gray-300 rounded mt-1" value="{{ old('full_name') }}" required>
                @error('full_name')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label for="birth_date" class="block text-gray-700">Birth Date</label>
                <input type="date" name="birth_date" id="birth_date" class="w-full p-2 border border-gray-300 rounded mt-1" value="{{ old('birth_date') }}" required>
                @error('birth_date')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label for="first_dose_date" class="block text-gray-700">First Dose Date</label>
                <input type="date" name="first_dose_date" id="first_dose_date" class="w-full p-2 border border-gray-300 rounded mt-1" value="{{ old('first_dose_date') }}">
                @error('first_dose_date')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label for="second_dose_date" class="block text-gray-700">Second Dose Date</label>
                <input type="date" name="second_dose_date" id="second_dose_date" class="w-full p-2 border border-gray-300 rounded mt-1" value="{{ old('second_dose_date') }}">
                @error('second_dose_date')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label for="third_dose_date" class="block text-gray-700">Third Dose Date</label>
                <input type="date" name="third_dose_date" id="third_dose_date" class="w-full p-2 border border-gray-300 rounded mt-1" value="{{ old('third_dose_date') }}">
                @error('third_dose_date')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label for="vaccine_id" class="block text-gray-700">Vaccine ID</label>
                <input type="number" name="vaccine_id" id="vaccine_id" class="w-full p-2 border border-gray-300 rounded mt-1" value="{{ old('vaccine_id') }}" required>
                @error('vaccine_id')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label for="has_comorbidity" class="block text-gray-700">Has Comorbidity</label>
                <select name="has_comorbidity" id="has_comorbidity" class="w-full p-2 border border-gray-300 rounded mt-1" required>
                    <option value="1" {{ old('has_comorbidity') == 1 ? 'selected' : '' }}>Yes</option>
                    <option value="0" {{ old('has_comorbidity') == 0 ? 'selected' : '' }}>No</option>
                </select>
                @error('has_comorbidity')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Create</button>
        </form>
    </div>

</body>
</html>
