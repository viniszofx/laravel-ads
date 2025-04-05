<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Carbon\Carbon;

class EstudanteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        
        // Nomes brasileiros comuns
        $nomesBrasileiros = [
            'João Silva', 'Maria Santos', 'Pedro Oliveira', 'Ana Souza', 'Carlos Ferreira',
            'Juliana Costa', 'Lucas Pereira', 'Fernanda Almeida', 'Rafael Rodrigues', 'Mariana Lima',
            'Bruno Gomes', 'Camila Ribeiro', 'Gustavo Martins', 'Patrícia Araújo', 'Felipe Barbosa',
            'Aline Cardoso', 'Thiago Nascimento', 'Daniela Moreira', 'Marcelo Carvalho', 'Bianca Teixeira',
            'Leonardo Vieira', 'Gabriela Correia', 'Eduardo Dias', 'Natália Mendes', 'Rodrigo Rocha',
            'Vanessa Nunes', 'André Castro', 'Letícia Fernandes', 'Fábio Pinto', 'Jéssica Lopes'
        ];
        
        // Função para gerar CPF formatado
        $gerarCpf = function() use ($faker) {
            return sprintf("%03d.%03d.%03d-%02d", 
                $faker->numberBetween(0, 999),
                $faker->numberBetween(0, 999),
                $faker->numberBetween(0, 999),
                $faker->numberBetween(0, 99)
            );
        };
        
        // Função para gerar telefone brasileiro
        $gerarTelefone = function() use ($faker) {
            return sprintf("(%02d) %d-%04d", 
                $faker->numberBetween(11, 99),
                $faker->numberBetween(90000, 99999),
                $faker->numberBetween(0, 9999)
            );
        };
        
        // Função para gerar endereço brasileiro
        $gerarEndereco = function() use ($faker) {
            $tiposLogradouro = ['Rua', 'Avenida', 'Alameda', 'Travessa', 'Praça'];
            $bairros = ['Centro', 'Jardim Paulista', 'Moema', 'Morumbi', 'Pinheiros', 'Ipanema', 'Leblon', 'Copacabana', 'Boa Viagem', 'Barra'];
            $cidades = ['São Paulo', 'Rio de Janeiro', 'Belo Horizonte', 'Curitiba', 'Porto Alegre', 'Salvador', 'Recife', 'Fortaleza', 'Brasília', 'Manaus'];
            $estados = ['SP', 'RJ', 'MG', 'PR', 'RS', 'BA', 'PE', 'CE', 'DF', 'AM'];
            
            return sprintf("%s %s, %d - %s, %s - %s, CEP %05d-%03d",
                $faker->randomElement($tiposLogradouro),
                $faker->word . ' ' . $faker->lastName,
                $faker->numberBetween(1, 2000),
                $faker->randomElement($bairros),
                $faker->randomElement($cidades),
                $faker->randomElement($estados),
                $faker->numberBetween(10000, 99999),
                $faker->numberBetween(0, 999)
            );
        };
        
        // Gerar 20 estudantes
        for ($i = 0; $i < 20; $i++) {
            $dataNascimento = $faker->dateTimeBetween('-30 years', '-18 years');
            $nome = $faker->randomElement($nomesBrasileiros);
            $email = strtolower(str_replace(' ', '.', $nome)) . '@' . $faker->randomElement(['gmail.com', 'hotmail.com', 'outlook.com', 'yahoo.com.br', 'uol.com.br']);
            
            DB::table('estudantes')->insert([
                'cpf' => $gerarCpf(),
                'nome' => $nome,
                'data_nascimento' => $dataNascimento->format('d/m/Y'),
                'email' => $email,
                'telefone' => $gerarTelefone(),
                'endereco' => $gerarEndereco(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}