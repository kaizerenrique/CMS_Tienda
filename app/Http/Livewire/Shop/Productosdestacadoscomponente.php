<?php

namespace App\Http\Livewire\Shop;

use Livewire\Component;
use App\Models\Producto;

class Productosdestacadoscomponente extends Component
{
    public function render()
    {
        $productos = Producto::all();

        return view('livewire.shop.productosdestacadoscomponente',[
            'productos' => $productos,
        ]);
    }
}
