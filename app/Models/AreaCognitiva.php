<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AreaCognitiva extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'areas_cognitivas';

    /**
     * The attributes that are mass asignable
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'nombre'
    ];
}
