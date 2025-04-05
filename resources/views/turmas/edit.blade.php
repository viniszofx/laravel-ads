@extends('layouts.app')

@section('content')
<div class="container mx-auto py-12 px-4">
    <div class="flex justify-between items-center mb-10">
        <h1 class="text-3xl font-light tracking-tight">Editar Turma</h1>
        <a href="{{ route('turmas.show', $turma->id) }}" class="apple-button py-2 px-6 text-sm">
            Cancelar
        </a>
    </div>

    @if ($errors->any())
    <div class="apple-card p-4 mb-6 bg-red-100">
        <ul class="list-disc pl-5">
            @foreach ($errors->all() as $error)
                <li class="text-red-600">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="apple-card max-w-3xl mx-auto">
        <div class="p-6">
            <h2 class="text-2xl font-medium">Formulário de Edição</h2>
        </div>
        <div class="p-6 pt-0">
            <form action="{{ route('turmas.update', $turma->id) }}" method="POST" class="space-y-8">
                @csrf
                @method('PUT')
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="space-y-2">
                        <label for="numero" class="text-sm font-medium text-muted-foreground">Número da Turma</label>
                        <input type="text" name="numero" id="numero" value="{{ old('numero', $turma->numero) }}" required class="apple-input h-11 w-full px-4 py-2 text-sm">
                    </div>
                    
                    <div class="space-y-2">
                        <label for="semestre" class="text-sm font-medium text-muted-foreground">Semestre</label>
                        <input type="text" name="semestre" id="semestre" value="{{ old('semestre', $turma->semestre) }}" required class="apple-input h-11 w-full px-4 py-2 text-sm">
                    </div>
                    
                    <div class="space-y-2">
                        <label for="periodo" class="text-sm font-medium text-muted-foreground">Período</label>
                        <input type="text" name="periodo" id="periodo" value="{{ old('periodo', $turma->periodo) }}" required class="apple-input h-11 w-full px-4 py-2 text-sm">
                    </div>
                    
                    <div class="space-y-2">
                        <label for="professor" class="text-sm font-medium text-muted-foreground">Professor</label>
                        <input type="text" name="professor" id="professor" value="{{ old('professor', $turma->professor) }}" required class="apple-input h-11 w-full px-4 py-2 text-sm">
                    </div>
                    
                    <div class="space-y-2">
                        <label for="sala" class="text-sm font-medium text-muted-foreground">Sala</label>
                        <input type="text" name="sala" id="sala" value="{{ old('sala', $turma->sala) }}" required class="apple-input h-11 w-full px-4 py-2 text-sm">
                    </div>
                    
                    <div class="space-y-2">
                        <label for="horario" class="text-sm font-medium text-muted-foreground">Horário</label>
                        <input type="text" name="horario" id="horario" value="{{ old('horario', $turma->horario) }}" required class="apple-input h-11 w-full px-4 py-2 text-sm">
                    </div>
                </div>
                
                <div class="flex justify-end">
                    <button type="submit" class="apple-button-primary py-2.5 px-6 text-sm">
                        Salvar Alterações
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection