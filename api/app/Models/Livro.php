<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nome',
        'autor',
        'categoria',
        'codigo',
        'tipo',
        'tamanho',
    ];
}
