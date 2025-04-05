<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Turma extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero',
        'semestre',
        'periodo',
        'professor',
        'sala',
        'horario',
    ];
}
