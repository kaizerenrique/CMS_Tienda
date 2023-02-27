<?php

namespace App\Http\Livewire\Shop;

use App\Models\Persona;
use Livewire\Component;

class Ordencomponente extends Component
{
    public function render()
    {
        $datosPersona = Persona::where('user_id', auth()->user()->id)->get();        
        $estado = $datosPersona->isEmpty();
        foreach($datosPersona as $perfil){

        }

        $monto = \Cart::session(auth()->user()->id)->getTotal(); 
        $monto = number_format($monto, 2);       

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
                'articulos' => $articulos
            ]);
        } else {
            return view('livewire.shop.ordencomponente',[
                'estado' => $estado,  
                'monto' => $monto,
                'articulos' => $articulos     
            ]);
        }
        
    }
}
