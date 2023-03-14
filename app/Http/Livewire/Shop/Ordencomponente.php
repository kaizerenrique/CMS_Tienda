<?php

namespace App\Http\Livewire\Shop;

use App\Models\Persona;
use Livewire\Component;
use App\Models\Valorusd;
use \App\Traits\Sluggenerador;
use \App\Traits\EnvioMensajes;

class Ordencomponente extends Component
{
    use Sluggenerador;
    use EnvioMensajes;

    public $delivery;
    public $valorDelivery = 0;

    public $mensaje;
    public $titulo;
    public $mensajeModal = false;
    public $modalOrden = false;

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

    public function generarorden()
    {
        $orden = $this->codegeneradorproducto();       

        $this->titulo = 'Nueva Orden';
        $this->mensaje = 'Su Orden '. $orden .' de compra se a generado exitosamente ';            
        $this->modalOrden = true; 
        
        $user = auth()->user();
        $perfil = auth()->user()->persona;
        $text = "<b>Orden Generada:</b>:\n"
                . "<b>El Usuario: </b>\n"
                . "$user->name\n"
                . "$user->email\n"
                . "<b>Nombre: </b>\n"
                . "$perfil->nombres\n"
                . "<b>Apellido: </b>\n"
                . "$perfil->apellidos\n"
                . "<b>Orden: </b>\n"
                . "$orden\n";

        $this->telegramMensajeGrupo($text);

    }

    public function redireccionar()
    {
        \Cart::session(auth()->user()->id)->clear();
        return redirect()->route('welcome');
    }
}
