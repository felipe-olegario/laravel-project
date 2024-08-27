<?php
namespace App\Http\Controllers;

use App\Models\Vaccine;
use Illuminate\Http\Request;

class VaccineController extends Controller
{
    // Exibe uma lista de todas as vacinas
    public function index()
    {
        $vaccines = Vaccine::all();
        return view('vaccines.index', compact('vaccines'));
    }

    // Exibe o formulário para criar uma nova vacina
    public function create()
    {
        return view('vaccines.create');
    }

    // Armazena os dados de uma nova vacina
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:vaccines',
            'batch' => 'required|string|max:100',
            'expiration_date' => 'required|date',
        ]);

        Vaccine::create($validated);

        return redirect()->route('vaccines.index');
    }

    // Exibe os detalhes de uma vacina específica
    public function show($id)
    {
        $vaccine = Vaccine::findOrFail($id);
        return view('vaccines.show', compact('vaccine'));
    }

    // Exibe o formulário para editar uma vacina específica
    public function edit($id)
    {
        $vaccine = Vaccine::findOrFail($id);
        return view('vaccines.edit', compact('vaccine'));
    }

    // Atualiza os dados de uma vacina específica
    public function update(Request $request, $id)
    {
        $vaccine = Vaccine::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:vaccines,name,' . $vaccine->id,
            'batch' => 'required|string|max:100',
            'expiration_date' => 'required|date',
        ]);

        $vaccine->update($validated);

        return redirect()->route('vaccines.index');
    }

    // Exclui uma vacina específica
    public function destroy($id)
    {
        $vaccine = Vaccine::findOrFail($id);
        $vaccine->delete();

        return redirect()->route('vaccines.index');
    }
    public function addVaccine($cpf)
    {
        $employee = Employee::where('cpf', $cpf)->firstOrFail();
        $vaccines = Vaccine::all();
        return view('employees.add_vaccine', compact('employee', 'vaccines'));
    }

    // Armazena a vacina vinculada ao funcionário
    public function storeVaccine(Request $request, $cpf)
    {
        $employee = Employee::where('cpf', $cpf)->firstOrFail();

        $request->validate([
            'vaccine_id' => 'required|exists:vaccines,id',
            'type' => 'required|integer|in:1,2,3',
        ]);

        $employee->vaccines()->attach($request->vaccine_id, ['type' => $request->type]);

        return redirect()->route('employees.show', $employee->cpf)->with('success', 'Vaccine added successfully!');
    }
}
