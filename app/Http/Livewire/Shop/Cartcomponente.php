<?php

namespace App\Http\Livewire\Shop;

use Livewire\Component;

class Cartcomponente extends Component
{
    public $cart;
    protected $listeners = ['add_carro'];
    
    public function add_carro(){

    }
    
    public function render()
    {
        return view('livewire.shop.cartcomponente');
    }
}
