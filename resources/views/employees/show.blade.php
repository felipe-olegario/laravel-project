{{-- resources/views/employees/show.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Details</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-8">
        <h1 class="text-2xl font-bold mb-6">Employee Details</h1>
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <p><strong>CPF:</strong> {{ $employee->cpf }}</p>
            <p><strong>Full Name:</strong> {{ $employee->full_name }}</p>
            <p><strong>Birth Date:</strong> {{ $employee->birth_date->format('d/m/Y') }}</p>
            <p><strong>First Dose Date:</strong> {{ optional($employee->first_dose_date)->format('d/m/Y') ?? 'Não informado' }}</p>
            <p><strong>Second Dose Date:</strong> {{ optional($employee->second_dose_date)->format('d/m/Y') ?? 'Não informado' }}</p>
            <p><strong>Third Dose Date:</strong> {{ optional($employee->third_dose_date)->format('d/m/Y') ?? 'Não informado' }}</p>
            <p><strong>Vaccine ID:</strong> {{ $employee->vaccine_id }}</p>
            <p><strong>Has Comorbidity:</strong> {{ $employee->has_comorbidity ? 'Yes' : 'No' }}</p>
            <a href="{{ route('employees.edit', $employee->cpf) }}" class="bg-yellow-500 text-white px-4 py-2 rounded mt-4">Edit</a>
            <form action="{{ route('employees.destroy', $employee->cpf) }}" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded mt-4 ml-2">Delete</button>
            </form>
        </div>
        <a href="{{ route('employees.index') }}" class="text-blue-500 mt-6 block">Back to List</a>
    </div>
</body>
</html>
