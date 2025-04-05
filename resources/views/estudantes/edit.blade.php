@extends('layouts.app')

@section('content')
<div class="container mx-auto py-12 px-4">
    <div class="flex justify-between items-center mb-10">
        <h1 class="text-3xl font-light tracking-tight">Editar Estudante</h1>
        <a href="{{ route('estudantes.show', $estudante->id) }}" class="apple-button py-2 px-6 text-sm">
            Cancelar
        </a>
    </div>

    <div class="apple-card max-w-3xl mx-auto">
        <div class="p-6">
            <h2 class="text-2xl font-medium">Formulário de Edição</h2>
        </div>
        <div class="p-6 pt-0">
            <form action="{{ route('estudantes.update', $estudante->id) }}" method="POST" class="space-y-8">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="space-y-2">
                        <label for="cpf" class="text-sm font-medium text-muted-foreground">CPF</label>
                        <input type="text" name="cpf" id="cpf" value="{{ $estudante->cpf }}" required class="apple-input h-11 w-full px-4 py-2 text-sm">
                        @error('cpf')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="space-y-2">
                        <label for="nome" class="text-sm font-medium text-muted-foreground">Nome</label>
                        <input type="text" name="nome" id="nome" value="{{ $estudante->nome }}" required class="apple-input h-11 w-full px-4 py-2 text-sm">
                        @error('nome')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="space-y-2">
                        <label for="data_nascimento" class="text-sm font-medium text-muted-foreground">Data de Nascimento</label>
                        <input type="text" name="data_nascimento" id="data_nascimento" value="{{ $estudante->data_nascimento }}" required class="apple-input h-11 w-full px-4 py-2 text-sm">
                        @error('data_nascimento')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="space-y-2">
                        <label for="email" class="text-sm font-medium text-muted-foreground">Email</label>
                        <input type="email" name="email" id="email" value="{{ $estudante->email }}" required class="apple-input h-11 w-full px-4 py-2 text-sm">
                        @error('email')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="space-y-2">
                        <label for="telefone" class="text-sm font-medium text-muted-foreground">Telefone</label>
                        <input type="text" name="telefone" id="telefone" value="{{ $estudante->telefone }}" required class="apple-input h-11 w-full px-4 py-2 text-sm">
                        @error('telefone')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="space-y-2 md:col-span-2">
                        <label for="endereco" class="text-sm font-medium text-muted-foreground">Endereço</label>
                        <input type="text" name="endereco" id="endereco" value="{{ $estudante->endereco }}" required class="apple-input h-11 w-full px-4 py-2 text-sm">
                        @error('endereco')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
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
