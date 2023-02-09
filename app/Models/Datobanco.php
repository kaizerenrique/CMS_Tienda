<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Datobanco extends Model
{
    use HasFactory;

    /**
     * Los atributos que son asignables en masa.
     */

    protected $fillable = [
        'nrocuenta',
        'cuentadante',
        'nrotelefono',
        'tipo',
        'documento',
        'transferencia',
        'pagomovil'
    ];

    /**
     * Relación con tabla de banco.
     * Cuentas pertenece a un banco. 
     */

    public function banco()
    {
        return $this->belongsTo(Banco::class);
    }


}
