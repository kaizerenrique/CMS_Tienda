<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    /**
     * Los atributos que son asignables en masa.
     */
    
     protected $fillable = [
        'nombre',
        'descripcion',
        'costo',
        'iva',
        'metodo',
        'codigo',
        'stado',
        'destacado',
        'delivery',
        'cover_img',
        'slug',
    ];

    /**
     * Relación con tabla de categoría.
     * Producto pertenece a una categoría. 
     */

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
}
