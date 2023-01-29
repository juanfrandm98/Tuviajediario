<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass asignable. Probando
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'email',
        'contrasenia',
        'nombre',
        'telefono',
        'genero',
        'rolID',
        'tutela',
        'gestiona',
        'alias',
        'nombre_madre',
        'resultados',
        'ultimos_viajes',
        'avisos'
    ];

    // Tell Laravel to fetch text values and set them as arrays
    protected $casts = [
        'tutela' => 'array',
        'gestiona' => 'array',
        'resultados' => 'array',
        'ultimos_viajes' => 'array',
        'avisos' => 'array'
    ];
}
