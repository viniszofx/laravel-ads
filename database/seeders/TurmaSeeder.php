<?php

namespace Database\Seeders;

use App\Models\Turma;
use Illuminate\Database\Seeder;

class TurmaSeeder extends Seeder
{
    public function run()
    {
        $turmas = [
            [
                'numero' => 'ADS-2023-1A',
                'semestre' => '1º',
                'periodo' => 'Matutino',
                'professor' => 'Dr. Carlos Silva',
                'sala' => 'Sala 101',
                'horario' => '08:00 - 12:00',
            ],
            [
                'numero' => 'ADS-2023-1B',
                'semestre' => '1º',
                'periodo' => 'Noturno',
                'professor' => 'Dra. Maria Oliveira',
                'sala' => 'Sala 102',
                'horario' => '19:00 - 23:00',
            ],
            // Adicione mais turmas conforme necessário
        ];

        foreach ($turmas as $turma) {
            Turma::create($turma);
        }
    }
}
