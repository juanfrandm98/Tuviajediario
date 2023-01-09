<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destino extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass asignable
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'nombre',
        'descripcion',
        'clima',
        'situacion',
        'datos_interes'
    ];

    // Tell Laravel to fetch text values and set them as arrays
    protected $casts = [
        'datos_interes' => 'array'
    ];
}
