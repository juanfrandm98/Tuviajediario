<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resultado extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass asignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'juegoID',
        'jugadorID',
        'fecha',
        'puntos',
        'segundos',
        'aviso'
    ];
}
