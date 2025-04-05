@extends('layouts.app')

@section('content')
<div class="container mx-auto py-16 px-4">
    <div class="text-center mb-20">
        <h1 class="text-5xl font-light tracking-tight mb-6">Sistema de Gerenciamento</h1>
        <p class="text-xl text-muted-foreground max-w-2xl mx-auto font-light">
            Bem-vindo ao sistema de gerenciamento de estudantes do curso de Análise e Desenvolvimento de Sistemas
        </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-10 max-w-4xl mx-auto">
        <div class="apple-card p-6">
            <div class="pb-4">
                <h2 class="text-2xl font-medium">Estudantes</h2>
                <p class="text-muted-foreground text-base">
                    Visualize, adicione, edite e remova estudantes do sistema
                </p>
            </div>
            <div class="pt-2">
                <a href="{{ route('estudantes.index') }}" class="w-full inline-block text-center apple-button py-2.5 px-6">
                    Mostrar Estudantes
                </a>
            </div>
        </div>

        <div class="apple-card p-6">
            <div class="pb-4">
                <h2 class="text-2xl font-medium">Turmas</h2>
                <p class="text-muted-foreground text-base">
                    Gerencie as turmas do curso de ADS
                </p>
            </div>
            <div class="pt-2">
                <a href="{{ route('turmas.index') }}" class="w-full inline-block text-center apple-button py-2.5 px-6">
                    Mostrar Turmas
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
