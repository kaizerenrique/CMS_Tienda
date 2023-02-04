<?php

namespace App\Http\Livewire\Admin;

use App\Models\Categoria;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use \App\Traits\Sluggenerador;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

class Categoriacomponente extends Component
{
    use WithPagination;
    use WithFileUploads;
    use Sluggenerador;

    //modal de registro
    public $categoria, $imagen;
    public $modalAgregar = false;    

    protected function rules()
    {
        if ($modalAgregar = true) {
            return [
                'categoria.categoria' => 'required|string|min:4|max:30',
                'categoria.descripcion' => 'nullable|string|min:4|max:160',
                'categoria.stado' => 'boolean',
                'imagen' => 'nullable|image|max:2048',
            ];
        }        
    }

    //modal y variables ver
    public $modalVer = false; 
    public $img_ver;   
    
    //modal y variables para eliminar
    //una categoria
    public $modalEliminar = false;
    public $mensajemodal;
    public $identificador;

    //barra de busqueda y check
    public $buscar;
    public $activo;

    protected $queryString = [
        'buscar' => ['except' => ''],
        'activo' => ['except' =>  false]
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
                                ->paginate(10); //paginacion
        
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

    /**
     * Consulta o pregunta si se eliminara
     * categoria
     */
    public function consultaeliminacategoria( Categoria $categoria )
    {
        //dd($categoria->categoria);
        $this->mensajemodal = 'Esta seguro de querer eliminar la categoría: '.$categoria->categoria; 
        $this->identificador = $categoria->id;
        $this->modalEliminar = true;
    }

    /**
     * Elimina la categoria y envia un mensaje 
     * o notificacion
     */
    public function eliminar( Categoria $categoria)
    {
        $this->modalEliminar = false;
        session()->flash('message', 'Se a eliminado correctamente la categoría: '.$categoria->categoria);
        
        if(!empty($categoria->cover_img)){
            $url = str_replace('storage','public',$categoria->cover_img);
            Storage::delete($url);
        }                

        $categoria->delete();        
    }

    /**
     * Despliega el modal para agregar 
     * una categoria
     */
    public function agregarcategoria()
    {
        $this->reset(['categoria']);
        $this->reset(['imagen']);
        $this->modalAgregar = true;
    }
    
    /**
     * Almacena la categoria en la
     * base de datos
     */
    public function guardarcategoria()
    {
        $this->validate();
        //generar el slug
        $slug = $this->generarslug($this->categoria['categoria']);  
            
        //almacenar imagen
        if (!empty($this->imagen)){
            $imagen = $this->imagen->store('public/categorias');
            $imagen_ruta = Storage::url($imagen);
        } else {
            $imagen_ruta = null;            
        }
        
        Categoria::create([
            'categoria'=> $this->categoria['categoria'],
            'descripcion' => $this->categoria['descripcion'],
            'stado' => $this->categoria['stado'],
            'slug' => $slug,
            'cover_img' => $imagen_ruta,
        ]);
        
        $this->modalAgregar = false;
        session()->flash('message', 'La categoría se a creado correctamente'); 
    }

    public function vercategoria(Categoria $categoria )
    {
        $this->categoria = $categoria;  
        $this->img_ver = $categoria->cover_img;      
        $this->modalVer = true;
    }

    public function editarmodal( Categoria $categoria)
    {
        dd($categoria);
    }
    
}