<?php

namespace App\Http\Controllers;

use App\Models\Estudante;
use Illuminate\Http\Request;

class EstudanteController extends Controller
{
    public function index()
    {
        $estudantes = Estudante::all();
        return view('estudantes.index', compact('estudantes'));
    }

    public function create()
    {
        return view('estudantes.create');
    }

    public function store(Request $request)
    {
        // Validação
        $validated = $request->validate([
            'cpf' => 'required',
            'nome' => 'required',
            'data_nascimento' => 'required',
            'email' => 'required|email',
            'telefone' => 'required',
            'endereco' => 'required',
        ]);

        // Criação do estudante
        $estudante = Estudante::create($validated);

        // Redirecionamento com mensagem de sucesso
        return redirect()->route('estudantes.index')
            ->with('success', 'Estudante criado com sucesso.');
    }

    public function show(Estudante $estudante)
    {
        return view('estudantes.show', compact('estudante'));
    }

    public function edit(Estudante $estudante)
    {
        return view('estudantes.edit', compact('estudante'));
    }

    public function update(Request $request, Estudante $estudante)
    {
        // Validação
        $validated = $request->validate([
            'cpf' => 'required',
            'nome' => 'required',
            'data_nascimento' => 'required',
            'email' => 'required|email',
            'telefone' => 'required',
            'endereco' => 'required',
        ]);

        // Atualização do estudante
        $estudante->update($validated);

        // Redirecionamento com mensagem de sucesso
        return redirect()->route('estudantes.show', $estudante->id)
            ->with('success', 'Estudante atualizado com sucesso');
    }

    public function destroy(Estudante $estudante)
    {
        // Exclusão do estudante
        $estudante->delete();

        // Redirecionamento com mensagem de sucesso
        return redirect()->route('estudantes.index')
            ->with('success', 'Estudante removido com sucesso');
    }
}