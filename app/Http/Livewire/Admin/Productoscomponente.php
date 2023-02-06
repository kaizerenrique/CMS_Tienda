<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use \App\Traits\Sluggenerador;
use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Support\Facades\Storage;

class Productoscomponente extends Component
{
    use WithPagination;
    use WithFileUploads;
    use Sluggenerador;

    public $producto;

    //modal y variables para eliminar
    //un producto
    public $modalEliminar = false;
    public $mensajemodal;
    public $identificador;

    //barra de busqueda y check
    public $buscar;
    public $activo;
    public $buscarcategoria;

    protected $queryString = [
        'buscar' => ['except' => ''],
        'activo' => ['except' =>  false],
    ];

    public function render()
    {
        $categorias = Categoria::all();
        $productos = Producto::where('nombre', 'like', '%'.$this->buscar . '%')  //buscar por nombre de producto
                           ->orWhere('codigo', 'like', '%'.$this->buscar . '%')
                            ->when($this->activo, function($query)
                            {
                                //consulta solo las categorias con estatus activo
                                return $query->activo(); 
                            })
                            ->orderBy('id','desc') //ordenar de forma decendente
                            ->paginate(10); //paginacion

        return view('livewire.admin.productoscomponente',[
            'categorias' => $categorias,
            'productos' => $productos,
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

    /**
     * Consulta o pregunta si se eliminara
     * producto
     */
    public function consultaeliminarproducto( Producto $producto )
    {
        $this->mensajemodal = 'Esta seguro de querer eliminar el Producto: '.$producto->nombre; 
        $this->identificador = $producto->id;
        $this->modalEliminar = true;
    }

    /**
     * Elimina el producto y envia un mensaje 
     * o notificacion
     */
    public function eliminar( Producto $producto )
    {
        $this->modalEliminar = false;
        session()->flash('message', 'Se a eliminado correctamente la categoría: '.$producto->nombre);
        
        if(!empty($producto->cover_img)){
            $url = str_replace('storage','public',$producto->cover_img);
            Storage::delete($url);
        }                

        $producto->delete();        
    }
}
