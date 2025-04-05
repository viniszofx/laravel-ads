@extends('layouts.app')

@section('content')
<div class="container mx-auto py-12 px-4">
    <div class="flex justify-between items-center mb-10">
        <h1 class="text-3xl font-light tracking-tight">Turmas</h1>
        <a href="{{ route('turmas.create') }}" class="apple-button-primary py-2.5 px-6 inline-flex items-center justify-center text-sm font-medium">
            Adicionar Turma
        </a>
    </div>

    @if (session('success'))
    <div class="apple-card p-4 mb-6 bg-green-50">
        <p class="text-green-800">{{ session('success') }}</p>
    </div>
    @endif

    @if ($errors->any())
    <div class="apple-card p-4 mb-6 bg-red-100">
        <ul class="list-disc pl-5">
            @foreach ($errors->all() as $error)
                <li class="text-red-600">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="apple-card overflow-hidden">
        <table class="apple-table w-full">
            <thead>
                <tr>
                    <th>Número da Turma</th>
                    <th>Semestre</th>
                    <th>Período</th>
                    <th>Professor</th>
                    <th class="text-right">Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($turmas as $turma)
                <tr>
                    <td class="font-medium">{{ $turma->numero }}</td>
                    <td class="font-light">{{ $turma->semestre }}</td>
                    <td class="font-light">{{ $turma->periodo }}</td>
                    <td class="font-light">{{ $turma->professor }}</td>
                    <td class="text-right">
                        <div class="flex justify-end gap-2">
                            <a href="{{ route('turmas.show', $turma->id) }}" class="apple-button text-xs py-1.5 px-4">
                                Detalhes
                            </a>
                            <a href="{{ route('turmas.edit', $turma->id) }}" class="apple-button text-xs py-1.5 px-4">
                                Alterar
                            </a>
                            <form action="{{ route('turmas.destroy', $turma->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="apple-button text-xs py-1.5 px-4 text-red-600" onclick="return confirm('Tem certeza que deseja remover esta turma?')">
                                    Remover
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center py-4">Nenhuma turma cadastrada.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection