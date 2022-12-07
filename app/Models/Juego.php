<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Juego extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass asignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'nombre',
        'explicacion',
        'tipo',
        'cota_inferior',
        'area_cognitiva'
    ];
}
