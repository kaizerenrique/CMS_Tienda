<?php

namespace App\Http\Livewire\Admin;

use App\Models\Categoria;
use Livewire\Component;
use Livewire\WithPagination;

class Categoriacomponente extends Component
{
    use WithPagination;

    //barra de busqueda
    public $buscar;

    protected $queryString = [
        'buscar' => ['except' => '']
    ];

    public function render()
    {
        $categorias = Categoria::where('categoria', 'like', '%'.$this->buscar . '%')  //buscar por nombre de categoria 
                                ->orderBy('id','desc') //ordenar de forma decendente
                                ->paginate(10); //paginacion
        
        return view('livewire.admin.categoriacomponente',[
            'categorias' => $categorias
        ]);
    }

    //Actualizar tabla para corregir falla de busqueda
    public function updatingBuscar()
    {
        $this->resetPage();
    }
}
