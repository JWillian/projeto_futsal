<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classificacao extends Model
{
    use HasFactory;

    protected $table = "classificacao";
    protected $fillable = [
        'id',
        'id_time',
        'pontos',
        'quantidade_gols',
    ];
}
