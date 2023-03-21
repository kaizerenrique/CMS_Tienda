<?php

namespace App\Http\Livewire\Admin;

use App\Models\Categoria;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use \App\Traits\Sluggenerador;
use Illuminate\Support\Facades\Storage;

class Categoriacomponente extends Component
{
    use WithPagination;
    use WithFileUploads;
    use Sluggenerador;

    public $slugcategoria;

    //modal de registro
    public $categoria, $imagen;
    public $modalAgregar = false;    

    protected function rules()
    {
        if ($modalAgregar = true) {
            return [
                'categoria.categoria' => 'required|string|min:4|max:30|unique:categorias,categoria',
                'categoria.descripcion' => 'nullable|string|min:4|max:160',
                'categoria.stado' => 'nullable|boolean',
                'imagen' => 'nullable|image|max:2048',
            ];
        }        
    }

    //modal y variables ver
    public $modalVer = false; 
    public $img_ver;   

    //modal editar
    public $modalEditar = false; 
    
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
        $slug = $this->generarslugurl();         
            
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

    /**
     * Despliega el modal para 
     * Ver categoria
     */
    public function vercategoria(Categoria $categoria )
    {
        $this->categoria = $categoria;  
        $this->img_ver = $categoria->cover_img;      
        $this->modalVer = true;
    }

    /**
     * Despliega el modal para 
     * editar categoria
     */
    public function editarmodal( Categoria $categoria)
    {       
        $this->modalVer = false; 
        $this->categoria = $categoria; 
        $this->img_ver = $categoria->cover_img;
        $this->reset(['imagen']);      
        $this->modalEditar = true;
    }

    /**
     * Guarda los cambios de categoria 
     * en la base de datos
     */
    public function editarcategoria()
    {
        $this->validate([
            'categoria.id' => 'required',
            'categoria.categoria' => 'required|string|min:4|max:30',
            'categoria.descripcion' => 'nullable|string|min:4|max:160',
            'categoria.stado' => 'nullable|boolean',
            'imagen' => 'nullable|image|max:2048',
        ]);

        if(empty($this->imagen)){
            $datos = Categoria::find($this->categoria['id']);
            $datos->categoria = $this->categoria['categoria'];
            $datos->descripcion = $this->categoria['descripcion'];
            $datos->stado = $this->categoria['stado'];
            $datos->save();         
            $this->modalEditar = false;   
            session()->flash('message', 'La categoría se a editado correctamente');
        }else {
            $datos = Categoria::find($this->categoria['id']);

            //eliminar imagen previamente almacenada
            if(!empty($datos->cover_img)){
                $url = str_replace('storage', 'public', $datos->cover_img);
                Storage::delete($url);
            }       

            $imagen = $this->imagen->store('public/categorias');
            $imagen_ruta = Storage::url($imagen);

            $datos->categoria = $this->categoria['categoria'];
            $datos->descripcion = $this->categoria['descripcion'];
            $datos->stado = $this->categoria['stado'];
            $datos->cover_img = $imagen_ruta;
            $datos->save();         
            $this->modalEditar = false;   
            session()->flash('message', 'La categoría se a editado correctamente');
           
        }

    }
    
}