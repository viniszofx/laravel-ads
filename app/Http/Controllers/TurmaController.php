<?php

namespace App\Http\Controllers;

use App\Models\Turma;
use Illuminate\Http\Request;

class TurmaController extends Controller
{
    public function index()
    {
        $turmas = Turma::all();
        return view('turmas.index', compact('turmas'));
    }

    public function create()
    {
        return view('turmas.create');
    }

    public function store(Request $request)
    {
        // Validação
        $validated = $request->validate([
            'numero' => 'required',
            'semestre' => 'required',
            'periodo' => 'required',
            'professor' => 'required',
            'sala' => 'required',
            'horario' => 'required',
        ]);

        // Criação da turma
        $turma = Turma::create($validated);

        // Redirecionamento com mensagem de sucesso
        return redirect()->route('turmas.index')
            ->with('success', 'Turma criada com sucesso.');
    }

    public function show(Turma $turma)
    {
        return view('turmas.show', compact('turma'));
    }

    public function edit(Turma $turma)
    {
        return view('turmas.edit', compact('turma'));
    }

    public function update(Request $request, Turma $turma)
    {
        // Validação
        $validated = $request->validate([
            'numero' => 'required',
            'semestre' => 'required',
            'periodo' => 'required',
            'professor' => 'required',
            'sala' => 'required',
            'horario' => 'required',
        ]);

        // Atualização da turma
        $turma->update($validated);

        // Redirecionamento com mensagem de sucesso
        return redirect()->route('turmas.show', $turma->id)
            ->with('success', 'Turma atualizada com sucesso');
    }

    public function destroy(Turma $turma)
    {
        // Exclusão da turma
        $turma->delete();

        // Redirecionamento com mensagem de sucesso
        return redirect()->route('turmas.index')
            ->with('success', 'Turma removida com sucesso');
    }
}