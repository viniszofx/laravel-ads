@extends('layouts.app')

@section('content')
<div class="container mx-auto py-12 px-4">
    <div class="flex justify-between items-center mb-10">
        <h1 class="text-3xl font-light tracking-tight">Detalhes da Turma</h1>
        <div class="flex gap-2">
            <a href="{{ route('turmas.index') }}" class="apple-button py-2 px-6 text-sm">
                Voltar
            </a>
            <a href="{{ route('turmas.edit', $turma->id) }}" class="apple-button-primary py-2 px-6 text-sm">
                Editar
            </a>
        </div>
    </div>

    @if (session('success'))
    <div class="apple-card p-4 mb-6 bg-green-50">
        <p class="text-green-800">{{ session('success') }}</p>
    </div>
    @endif

    <div class="apple-card max-w-3xl mx-auto">
        <div class="p-6">
            <h2 class="text-2xl font-medium mb-2">Turma {{ $turma->numero }}</h2>
        </div>
        <div class="p-6 pt-0 space-y-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div>
                    <h3 class="text-sm font-medium text-muted-foreground mb-2">Número da Turma</h3>
                    <p class="font-light text-lg">{{ $turma->numero }}</p>
                </div>
                <div>
                    <h3 class="text-sm font-medium text-muted-foreground mb-2">Semestre</h3>
                    <p class="font-light text-lg">{{ $turma->semestre }}</p>
                </div>
                <div>
                    <h3 class="text-sm font-medium text-muted-foreground mb-2">Período</h3>
                    <p class="font-light text-lg">{{ $turma->periodo }}</p>
                </div>
                <div>
                    <h3 class="text-sm font-medium text-muted-foreground mb-2">Professor</h3>
                    <p class="font-light text-lg">{{ $turma->professor }}</p>
                </div>
                <div>
                    <h3 class="text-sm font-medium text-muted-foreground mb-2">Sala</h3>
                    <p class="font-light text-lg">{{ $turma->sala }}</p>
                </div>
                <div>
                    <h3 class="text-sm font-medium text-muted-foreground mb-2">Horário</h3>
                    <p class="font-light text-lg">{{ $turma->horario }}</p>
                </div>
            </div>
            
            <div class="flex justify-between pt-4 border-t border-gray-200">
                <form action="{{ route('turmas.destroy', $turma->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="apple-button text-red-600 py-2 px-6 text-sm" onclick="return confirm('Tem certeza que deseja remover esta turma?')">
                        Excluir Turma
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection