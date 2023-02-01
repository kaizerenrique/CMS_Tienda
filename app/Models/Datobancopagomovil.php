<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Datobancopagomovil extends Model
{
    use HasFactory;

    /**
     * Los atributos que son asignables en masa.
     */

    protected $fillable = [
        'nrotelefono',
        'tipo',
        'documento',
    ];

    /**
     * Relación con tabla de pagomovil.
     * Numeros de pago movil pertenece a un banco. 
     */

     public function banco()
     {
        return $this->belongsTo(Banco::class);
     }
}
