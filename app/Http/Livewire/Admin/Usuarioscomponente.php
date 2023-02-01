<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Telegram;
use \App\Traits\EnvioMensajes;

class Usuarioscomponente extends Component
{
    use EnvioMensajes;

    public function render()
    {
        //$activity = Telegram::getUpdates();

        $text = 'Prueba del sistema para telegram';
        $pro = $this->telegramMensajeGrupo($text);
        dd($pro);

        return view('livewire.admin.usuarioscomponente');
    }
}
