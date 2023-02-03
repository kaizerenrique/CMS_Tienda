<?php

namespace App\Http\Livewire\Admin;

use App\Models\Categoria;
use Livewire\Component;
use Livewire\WithPagination;

class Categoriacomponente extends Component
{
    use WithPagination;

    public $activo;

    //barra de busqueda
    public $buscar;

    protected $queryString = [
        'buscar' => ['except' => '']
    ];

    public function render()
    {
        $categorias = Categoria::where('categoria', 'like', '%'.$this->buscar . '%')  //buscar por nombre de categoria 
                                ->when($this->activo, function($query)
                                {
                                    //consulta solo las categorias con estatus activo
                                    return $query->activo(); 
                                })
                                ->orderBy('id','desc') //ordenar de forma decendente
                                ->paginate(2); //paginacion
        
        return view('livewire.admin.categoriacomponente',[
            'categorias' => $categorias
        ]);
    }

    /**
     * Corrige la numeracion de la tabla al realizar 
     * una busqueda
     */
    public function updatingBuscar()
    {
        $this->resetPage();
    }

    /**
     * Corrige la numeracion de la tabla al estar el 
     * chek activo
     */
    public function updatingActivo()
    {
        $this->resetPage();
    }
}
