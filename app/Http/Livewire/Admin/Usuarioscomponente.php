<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Telegram;
use \App\Traits\EnvioMensajes;
use \App\Traits\Ditecp;

class Usuarioscomponente extends Component
{
    use EnvioMensajes;
    use Ditecp;

    public function render()
    {
        //$text = 'Prueba del sistema para telegram';
        //$pro = $this->telegramMensajeGrupo($text);

        //$nac = 'V';
        //$cedula = '20124379';
        $usd = $this->valorbcv();
        //$identidad = $this->ceduladeidentidad($nac, $cedula);
        dd($usd);

        return view('livewire.admin.usuarioscomponente');
    }
}
