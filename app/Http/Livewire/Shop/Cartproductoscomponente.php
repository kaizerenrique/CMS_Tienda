<?php

namespace App\Http\Livewire\Shop;

use Livewire\Component;
use App\Models\Valorusd;
use Darryldecode\Cart\Cart;

class Cartproductoscomponente extends Component
{

    public function render()
    {
        $cart_items = \Cart::session(auth()->user()->id)->getContent();
        $cart_items= $cart_items->sortBy('id');       

        //calculo del valor para expresarlo en bs
        $valorusdtasa = Valorusd::latest()->first();

        $monto = \Cart::session(auth()->user()->id)->getTotal(); 
        $monto = number_format($monto, 2);       

        $articulos = \Cart::session(auth()->user()->id)->getTotalQuantity();
        
        return view('livewire.shop.cartproductoscomponente', 
        compact('cart_items','monto','articulos'));
    }

    public function eliminar_item($idItem)
    {
        \Cart::session(auth()->user()->id)->remove($idItem);
        $this->emitTo('shop.cartcomponente', 'add_carro'); 
    }

    public function inc_cantidad($rowid)
    {      
        \Cart::session(auth()->user()->id)->update($rowid,[
            'quantity' => 1,
        ]);
    }

    public function dec_cantidad($rowid)
    {      
        \Cart::session(auth()->user()->id)->update($rowid,[
            'quantity' => -1,
        ]);
    }
}
