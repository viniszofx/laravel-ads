@extends('layouts.app')

@section('content')
<div class="container mx-auto py-12 px-4">
    <div class="flex justify-between items-center mb-10">
        <h1 class="text-3xl font-light tracking-tight">Detalhes do Estudante</h1>
        <div class="flex gap-2">
            <a href="{{ route('estudantes.index') }}" class="apple-button py-2 px-6 text-sm">
                Voltar
            </a>
            <a href="{{ route('estudantes.edit', $estudante->id) }}" class="apple-button-primary py-2 px-6 text-sm">
                Editar
            </a>
        </div>
    </div>

    @if (session('success'))
    <div class="apple-card p-4 mb-6 bg-green-50 border-green-200">
        <p class="text-green-800">{{ session('success') }}</p>
    </div>
    @endif

    <div class="apple-card max-w-3xl mx-auto">
        <div class="p-6">
            <h2 class="text-2xl font-medium mb-2">{{ $estudante->nome }}</h2>
        </div>
        <div class="p-6 pt-0 space-y-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div>
                    <h3 class="text-sm font-medium text-muted-foreground mb-2">CPF</h3>
                    <p class="font-light text-lg">{{ $estudante->cpf }}</p>
                </div>
                <div>
                    <h3 class="text-sm font-medium text-muted-foreground mb-2">Data de Nascimento</h3>
                    <p class="font-light text-lg">{{ $estudante->data_nascimento }}</p>
                </div>
                <div>
                    <h3 class="text-sm font-medium text-muted-foreground mb-2">Email</h3>
                    <p class="font-light text-lg">{{ $estudante->email }}</p>
                </div>
                <div>
                    <h3 class="text-sm font-medium text-muted-foreground mb-2">Telefone</h3>
                    <p class="font-light text-lg">{{ $estudante->telefone }}</p>
                </div>
                <div class="md:col-span-2">
                    <h3 class="text-sm font-medium text-muted-foreground mb-2">Endereço</h3>
                    <p class="font-light text-lg">{{ $estudante->endereco }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
