<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banco extends Model
{
    use HasFactory;

    /**
     * Los atributos que son asignables en masa.
     */
    
    protected $fillable = [
        'codigo',
        'nombre',
        'rif',
    ];
}
