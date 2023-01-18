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
        'codigo',
        'explicacion',
        'tipo',
        'cota_inferior',
        'areas_cognitivas'
    ];

    // Tell Laravel to fetch text values and set them as arrays
    protected $casts = [
        'areas_cognitivas' => 'array'
    ];
}
