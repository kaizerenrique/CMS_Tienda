<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Telegram;
use \App\Traits\EnvioMensajes;
use \App\Traits\Ditecp;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class Usuarioscomponente extends Component
{
    use EnvioMensajes;
    use Ditecp;

    public $buscar;

    protected $queryString = [
        'buscar' => ['except' => '']
    ];

    public function render()
    {
        //listar los usuarios y consultar por nombre y correo
        $usuarios = User::where('name', 'like', '%'.$this->buscar . '%')  //buscar por nombre de usuario
                      ->orWhere('email', 'like', '%'.$this->buscar . '%') //buscar por correo de usuario
                      ->orderBy('id','desc') //ordenar de forma decendente
                      ->paginate(10); //paginacion

        $roles = Role::all();

        return view('livewire.admin.usuarioscomponente',[
            'usuarios' => $usuarios,
            'roles' => $roles,
        ]);
    }
}
