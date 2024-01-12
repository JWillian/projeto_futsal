<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partida extends Model
{
    use HasFactory;

    protected $table = "partidas";
    protected $fillable = [
           'id',
           'data',
           'horario_inicio',
           'horario_termino',
           'time_1',
           'time_2',
           'placar_time_1',
           'placar_time_2',
           
    ];

    public function time1()
    {
        return $this->belongsTo(Time::class, 'time_1');
    }

    public function time2()
    {
        return $this->belongsTo(Time::class, 'time_2');
    }

}
