<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    /**
     * Los atributos que son asignables en masa.
     */
    
    protected $fillable = [
        'categoria',
        'descripcion',
        'stado',
        'slug',
        'cover_img',
    ];

    /**
     * Relación con tabla de Producto.
     * Categoría tiene productos. 
     */

    public function productos()
    {
        return $this->hasMany(Producto::class);
    }

    /**
     * Realiza una busqueda de los elementos activos
     */

    public function scopeActivo( $query)
    {
        return $query->where('stado', 1);
    }
}
