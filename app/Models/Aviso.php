<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aviso extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass asignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'jugadorID',
        'resultadoID',
        'areas_cognitivas',
        'fecha',
        'automatico',
        'leido',
        'activo'
    ];
}
