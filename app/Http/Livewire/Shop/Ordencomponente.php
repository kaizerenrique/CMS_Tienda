<?php

namespace App\Http\Livewire\Shop;

use App\Models\Persona;
use Livewire\Component;
use App\Models\Valorusd;

class Ordencomponente extends Component
{
    public $delivery;
    public $valorDelivery;

    public $mensaje;
    public $titulo;
    public $mensajeModal = false;

    protected $listeners = [
        'requiereDelivery'
    ];

    public function render()
    {
        $datosPersona = Persona::where('user_id', auth()->user()->id)->get();        
        $estado = $datosPersona->isEmpty();
        foreach($datosPersona as $perfil){

        }

        $monto = \Cart::session(auth()->user()->id)->getTotal(); 

        $total = $monto + $this->valorDelivery;
        $monto = number_format($monto, 2);  
        $total = number_format($total, 2);      

        $articulos = \Cart::session(auth()->user()->id)->getTotalQuantity();

        if ($estado == false) {
            //enviar el numero de telefono
            $telefono = $perfil->telefono->codigo_internacional.' '.$perfil->telefono->codigo_operador.' '.$perfil->telefono->nrotelefono;
            //identificar si el numero de tlf tiene whatsapp
            $whatsapp = $perfil->telefono->whatsapp;    
            
            

            return view('livewire.shop.ordencomponente',[
                'estado' => $estado, 
                'perfil' => $perfil,
                'telefono' => $telefono, 
                'whatsapp' => $whatsapp,
                'monto' => $monto,                
                'articulos' => $articulos,
                'total'  => $total
            ]);
        } else {
            return view('livewire.shop.ordencomponente',[
                'estado' => $estado,  
                'monto' => $monto,
                'articulos' => $articulos,
                'total'  => $total
            ]);
        }
        
    }

    public function requiereDelivery($delivery)
    {   
        $valorusdtasa = Valorusd::latest()->first();     
        if ($delivery == 0) {
            $this->valorDelivery = 0 * $valorusdtasa->valor;
        } else {

            $this->titulo = 'Alerta !!';
            $this->mensaje = 'Actualmente esta funcionalidad está solo para demostraciones';            
            $this->mensajeModal = true;

            $this->valorDelivery = 2 * $valorusdtasa->valor;
        }
        
        
    }
}
