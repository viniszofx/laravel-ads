@extends('layouts.app')

@section('content')
<div class="container mx-auto py-12 px-4">
    <div class="flex justify-between items-center mb-10">
        <h1 class="text-3xl font-light tracking-tight">Estudantes</h1>
        <a href="{{ route('estudantes.create') }}" class="apple-button-primary py-2.5 px-6 inline-flex items-center justify-center text-sm font-medium">
            Adicionar Estudante
        </a>
    </div>

    @if (session('success'))
    <div class="apple-card p-4 mb-6 bg-green-50 border-green-200">
        <p class="text-green-800">{{ session('success') }}</p>
    </div>
    @endif

    <div class="apple-card overflow-hidden">
        <table class="apple-table w-full">
            <thead>
                <tr>
                    <th class="bg-white/50 dark:bg-white/5 text-sm font-medium text-muted-foreground px-4 py-3 text-left">CPF</th>
                    <th class="bg-white/50 dark:bg-white/5 text-sm font-medium text-muted-foreground px-4 py-3 text-left">Nome</th>
                    <th class="bg-white/50 dark:bg-white/5 text-sm font-medium text-muted-foreground px-4 py-3 text-left">Data de Nascimento</th>
                    <th class="bg-white/50 dark:bg-white/5 text-sm font-medium text-muted-foreground px-4 py-3 text-right">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($estudantes as $estudante)
                <tr>
                    <td class="px-4 py-3 border-t border-border/50 font-light">{{ $estudante->cpf }}</td>
                    <td class="px-4 py-3 border-t border-border/50 font-medium">{{ $estudante->nome }}</td>
                    <td class="px-4 py-3 border-t border-border/50 font-light">{{ $estudante->data_nascimento }}</td>
                    <td class="px-4 py-3 border-t border-border/50 text-right">
                        <div class="flex justify-end gap-2">
                            <a href="{{ route('estudantes.show', $estudante->id) }}" class="apple-button text-xs py-1.5 px-4">
                                Detalhes
                            </a>
                            <a href="{{ route('estudantes.edit', $estudante->id) }}" class="apple-button text-xs py-1.5 px-4">
                                Alterar
                            </a>
                            <form action="{{ route('estudantes.destroy', $estudante->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="apple-button text-xs py-1.5 px-4 text-red-600" onclick="return confirm('Tem certeza que deseja remover este estudante?')">
                                    Remover
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
