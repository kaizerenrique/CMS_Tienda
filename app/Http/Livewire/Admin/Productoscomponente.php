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

    
    //modal de registro
    public $producto, $imagen;
    public $modalAgregar = false;

    protected function rules()
    {
        if ($modalAgregar = true) {
            return [
                'producto.nombre' => 'required|string|min:4|max:30|unique:productos,nombre',
                'producto.descripcion' => 'nullable|string|min:4|max:160',
                'producto.costo' => 'required|numeric|between:0,999999999.99',
                'producto.iva' => 'required|boolean',
                'producto.metodo' => 'required|in:USD,BS',
                'producto.codigo' => 'nullable|string|min:4|max:80|unique:productos,codigo',                
                'producto.stado' => 'nullable|boolean',
                'producto.destacado' => 'nullable|boolean',
                'producto.delivery' => 'nullable|boolean',
                'producto.categoria_id' => 'required',
                'imagen' => 'nullable|image|max:2048'              
            ];
        }        
    }

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
        session()->flash('message', 'Se a eliminado correctamente el Producto: '.$producto->nombre);
        
        if(!empty($producto->cover_img)){
            $url = str_replace('storage','public',$producto->cover_img);
            Storage::delete($url);
        }                

        $producto->delete(); 
    }

    /**
     * Despliega el modal para agregar 
     * un producto
     */
    public function agregarproducto()
    {
        $this->reset(['producto']);
        $this->producto['iva'] = true;
        $this->reset(['imagen']);
        $this->modalAgregar = true;
    }

    /**
     * Almacena la producto en la
     * base de datos
     */
    public function guardarproducto()
    {
        $this->validate();

        //generar el slug
        $slug = $this->generarslug($this->producto['nombre']);
        
        //almacenar imagen
        if (!empty($this->imagen)){
            $imagen = $this->imagen->store('public/productos');
            $imagen_ruta = Storage::url($imagen);
        } else {
            $imagen_ruta = null;            
        }

        $categoria = Categoria::find($this->producto['categoria_id']);

        if(empty($this->producto['codigo'])){
            $codigo = $this->codegeneradorproducto();
        } else {
            $codigo = $this->producto['codigo'];
        }

        if(empty($this->producto['destacado']))
        {
            $destacado = false;
        } else {
            $destacado = $this->producto['destacado'];
        }

        if(empty($this->producto['stado']))
        {
            $estado = false;
        } else {
            $estado = $this->producto['stado'];
        }

        if(empty($this->producto['delivery']))
        {
            $delivery = false;
        } else {
            $delivery = $this->producto['delivery'];
        }

        $producto = $categoria->productos()->create([
            'nombre' => $this->producto['nombre'],
            'descripcion' => $this->producto['descripcion'],
            'costo' => $this->producto['costo'],
            'iva' => $this->producto['iva'],
            'metodo' => $this->producto['metodo'],
            'codigo' => $codigo,                
            'stado' => $estado,
            'destacado' => $destacado,
            'delivery' => $delivery,
            'cover_img' => $imagen_ruta,
            'slug' => $slug
        ]);

        $this->modalAgregar = false;

        session()->flash('message', 'Se a registrado correctamente el Producto: '.$producto->nombre);
        
    }
}
