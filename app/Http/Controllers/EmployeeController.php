<?php
namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;

class EmployeeController extends Controller
{
    // Exibe uma lista de todos os funcionários
    public function index()
    {
        try {
            $employees = Employee::all();
            return view('employees.index', compact('employees'));
        } catch (QueryException $e) {
            return redirect()->route('employees.index')->withErrors('Erro ao carregar a lista de funcionários.');
        }
    }

    // Exibe o formulário de criação de um novo funcionário
    public function create()
    {
        return view('employees.create');
    }

    // Armazena um novo funcionário no banco de dados
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'cpf' => 'required|string|max:14|unique:employees',
                'full_name' => 'required|string|max:255',
                'birth_date' => 'required|date',
                'first_dose_date' => 'nullable|date',
                'second_dose_date' => 'nullable|date',
                'third_dose_date' => 'nullable|date',
                'vaccine_id' => 'required|exists:vaccines,id',
                'has_comorbidity' => 'required|boolean',
            ]);

            Employee::create($validated);
            return redirect()->route('employees.index')->with('success', 'Funcionário criado com sucesso!');
        } catch (QueryException $e) {
            return redirect()->route('employees.create')->withErrors('Erro ao criar funcionário.');
        } catch (\Exception $e) {
            return redirect()->route('employees.create')->withErrors('Ocorreu um erro inesperado.');
        }
    }

    // Exibe um funcionário específico
    public function show($cpf)
    {
        try {
            $employee = Employee::findOrFail($cpf);
            return view('employees.show', compact('employee'));
        } catch (ModelNotFoundException $e) {
            return redirect()->route('employees.index')->withErrors('Funcionário não encontrado.');
        } catch (\Exception $e) {
            return redirect()->route('employees.index')->withErrors('Ocorreu um erro inesperado.');
        }
    }

    // Exibe o formulário de edição de um funcionário específico
    public function edit($cpf)
    {
        try {
            $employee = Employee::findOrFail($cpf);
            return view('employees.edit', compact('employee'));
        } catch (ModelNotFoundException $e) {
            return redirect()->route('employees.index')->withErrors('Funcionário não encontrado.');
        } catch (\Exception $e) {
            return redirect()->route('employees.index')->withErrors('Ocorreu um erro inesperado.');
        }
    }

    // Atualiza as informações de um funcionário específico no banco de dados
    public function update(Request $request, $cpf)
    {
        try {
            $employee = Employee::findOrFail($cpf);

            $validated = $request->validate([
                'cpf' => 'required|string|max:14|unique:employees,cpf,' . $employee->cpf,
                'full_name' => 'required|string|max:255',
                'birth_date' => 'required|date',
                'first_dose_date' => 'nullable|date',
                'second_dose_date' => 'nullable|date',
                'third_dose_date' => 'nullable|date',
                'vaccine_id' => 'required|exists:vaccines,id',
                'has_comorbidity' => 'required|boolean',
            ]);

            $employee->update($validated);
            return redirect()->route('employees.index')->with('success', 'Funcionário atualizado com sucesso!');
        } catch (ModelNotFoundException $e) {
            return redirect()->route('employees.index')->withErrors('Funcionário não encontrado.');
        } catch (QueryException $e) {
            return redirect()->route('employees.edit', $id)->withErrors('Erro ao atualizar funcionário.');
        } catch (\Exception $e) {
            return redirect()->route('employees.edit', $id)->withErrors('Ocorreu um erro inesperado.');
        }
    }

    // Remove um funcionário específico do banco de dados
    public function destroy($cpf)
    {
        try {
            $employee = Employee::findOrFail($cpf);
            $employee->delete();

            return redirect()->route('employees.index')->with('success', 'Funcionário removido com sucesso!');
        } catch (ModelNotFoundException $e) {
            return redirect()->route('employees.index')->withErrors('Funcionário não encontrado.');
        } catch (QueryException $e) {
            return redirect()->route('employees.index')->withErrors('Erro ao remover funcionário.');
        } catch (\Exception $e) {
            return redirect()->route('employees.index')->withErrors('Ocorreu um erro inesperado.');
        }
    }
}
