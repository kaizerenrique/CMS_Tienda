<?php

namespace App\Http\Livewire\Shop;

use Livewire\Component;
use App\Models\Producto;
use App\Models\Valorusd;
use \App\Traits\Ditecp;

class Productosdestacadoscomponente extends Component
{
    use Ditecp;

    public $idetificador;

    public function render()
    {

        $destacados = 1; //solo destacados
        $limite = 8; //limite de productos destacados para mostrar
        $productos = Producto::where('destacado', $destacados)
        ->when(true, function($query)
        {
            //consulta solo los productos con estatus activo
            return $query->activo(); 
        })               
        ->orderBy('id','desc')->latest()->take($limite)->get();

        
        //calculo del valor para expresarlo en bs
        $bsbcv = Valorusd::latest()->first();

        if(empty($bsbcv)){
            $dolarbcv = $this->valorbcv();
            $bsbcv = $dolarbcv;
        }

        foreach ($productos as $producto) {
            if($producto->metodo == 'USD'){
                $producto->costo = $producto->costo * $bsbcv->valor;
                $producto->metodo = 'BS';
            }            
        } 

        return view('livewire.shop.productosdestacadoscomponente',[
            'productos' => $productos,
        ]);
    }

    public function agregaralcarro(Producto $idetificador)
    {
        $bsbcv = Valorusd::latest()->first();
        if($idetificador->metodo == 'USD'){
            $idetificador->costo = $idetificador->costo * $bsbcv->valor;
            $idetificador->costo = number_format($idetificador->costo, 2);
        }
        
        \Cart::session(auth()->user()->id)->add(array(
            'id' => $idetificador->id,
            'name' => $idetificador->nombre,
            'price' => $idetificador->costo,
            'quantity' => 1,
            'attributes' => array(),
            'associatedModel' => $idetificador
        ));

        $this->emit('message', 'El Examen se ha agregado correctamente.');
        $this->emitTo('shop.cartcomponente', 'add_carro');        
    }
}
