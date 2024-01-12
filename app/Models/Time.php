<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    use HasFactory;

    protected $table = "times";
    protected $fillable = [
        'id',
        'nome',
    ];

    public function jogadores()
    {
        return $this->hasMany(Jogador::class);
    }

    public function partidas1()
    {
        return $this->hasMany(Partida::class, 'time_id');
    }

    public function partidas2()
    {
        return $this->hasMany(Partida::class, 'time_2');
    }
}
