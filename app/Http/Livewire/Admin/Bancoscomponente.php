<?php

namespace App\Http\Livewire\Admin;

use App\Models\Banco;
use App\Models\Datobanco;
use App\Models\Datobancopagomovil;
use Illuminate\Pagination\Paginator;
use Livewire\Component;
use Livewire\WithPagination;

class Bancoscomponente extends Component
{
    use WithPagination;

    
    public $modalregistrabanco = false;
    

    public $bancoreg;
    public $mensaje;
    public $titulo;
    public $mensajeModal = false;
    public $modalver = false;
    public $eliminacuenta = false;
    public $resultado, $idcuenta;


    protected function rules()
    {
        if ($modalregistrabanco = true) {
            return [
                'bancoreg.id' => 'nullable',
                'bancoreg.banco' => 'numeric',
                'bancoreg.nrocuenta' => 'required|string|min:20|max:20',
                'bancoreg.cuentadante' => 'required|string|min:4',
                'bancoreg.telefono' => 'required|string|min:11|max:11',
                'bancoreg.tipo' => 'required|string',
                'bancoreg.documento' => 'required|numeric|integer|digits_between:6,9',
                'bancoreg.transferencia' => 'boolean',
                'bancoreg.pagomovil' => 'boolean'
            ];
        }        
    }

    //barra de busqueda y check
    public $buscar;

    protected $queryString = [
        'buscar' => ['except' => '']
    ];

    public function render()
    {
        $listadebancos = Banco::all();

        $pagosformas = Datobanco::where('nrocuenta', 'like', '%'.$this->buscar . '%')
        ->orWhere('cuentadante', 'like', '%'.$this->buscar . '%')
        ->orWhere('nrotelefono', 'like', '%'.$this->buscar . '%')
        ->orderBy('id','desc') //ordenar de forma decendente
        ->paginate(10); //paginacion



        return view('livewire.admin.bancoscomponente',[
            'listadebancos' => $listadebancos,
            'pagosformas' => $pagosformas,
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


    public function registrardatos()
    {
        $this->reset(['bancoreg']);
        $this->titulo = 'Registrar Cuenta Bancaria';
        $this->modalregistrabanco = true;
    }
    


    /**
     * Guardar el registro de la cuenta y el 
     * pago movil
     */
    public function salvarbanco()
    {    
        //validamos los datos del formulario    
        $this->validate();

        if (isset($this->bancoreg['id'])) {                         
            $evalua = Datobanco::where('nrocuenta', $this->bancoreg['nrocuenta'])->get();         
            if ($this->bancoreg['id'] == $evalua[0]->id) {
                $editarcuenta = Datobanco::findOrFail($this->bancoreg['id']);            
                $editarcuenta->nrocuenta = $this->bancoreg['nrocuenta'];
                $editarcuenta->cuentadante = $this->bancoreg['cuentadante'];
                $editarcuenta->nrotelefono = $this->bancoreg['telefono'];
                $editarcuenta->tipo = $this->bancoreg['tipo'];
                $editarcuenta->documento = $this->bancoreg['documento']; 

                $editarcuenta->transferencia = $this->bancoreg['transferencia']; 
                $editarcuenta->pagomovil = $this->bancoreg['pagomovil']; 

                $editarcuenta->banco_id = $this->bancoreg['banco'];            
                $editarcuenta->update();                         
                $this->modalregistrabanco = false; 
                session()->flash('message', 'Se a editado correctamente la cuenta: '.$editarcuenta->nrocuenta);
                               
            }else{
                $this->modalregistrabanco = false;
                $this->titulo = 'Alerta !!';
                $this->mensaje = 'El número de cuenta '.$this->bancoreg['nrocuenta'].' ya se encuentra registrado';            
                $this->mensajeModal = true;
            }            
        }else{
            if (Datobanco::where('nrocuenta', $this->bancoreg['nrocuenta'])->exists()) {
                $this->modalregistrabanco = false;
                $this->titulo = 'Alerta !!';
                $this->mensaje = 'El número de cuenta '.$this->bancoreg['nrocuenta'].' ya se encuentra registrado';            
                $this->mensajeModal = true;
            }else{
                $registrocuenta = new Datobanco();
                $registrocuenta->nrocuenta = $this->bancoreg['nrocuenta'];
                $registrocuenta->cuentadante = $this->bancoreg['cuentadante'];
                $registrocuenta->nrotelefono = $this->bancoreg['telefono'];
                $registrocuenta->tipo = $this->bancoreg['tipo'];
                $registrocuenta->documento = $this->bancoreg['documento'];
                $registrocuenta->transferencia = $this->bancoreg['transferencia']; 
                $registrocuenta->pagomovil = $this->bancoreg['pagomovil']; 
                $registrocuenta->banco_id = $this->bancoreg['banco'];            
                $registrocuenta->save();    
                $this->modalregistrabanco = false;
                session()->flash('message', 'Se a registrado correctamente la cuenta: '.$registrocuenta->nrocuenta);
            }                
        }        
    }

    public function editarcuenta(Datobanco $bancoreg)
    {

        $this->titulo = 'Editar cuenta bancaria';
        $this->bancoreg['id'] = $bancoreg->id;       
        $this->bancoreg['banco'] = $bancoreg->banco->id;
        $this->bancoreg['nrocuenta'] = $bancoreg->nrocuenta;
        $this->bancoreg['cuentadante'] = $bancoreg->cuentadante;
        $this->bancoreg['telefono'] = $bancoreg->nrotelefono;
        $this->bancoreg['tipo'] = $bancoreg->tipo;
        $this->bancoreg['documento'] = $bancoreg->documento;
        $this->bancoreg['transferencia'] = $bancoreg->transferencia;
        $this->bancoreg['pagomovil'] = $bancoreg->pagomovil;
        
        $this->modalregistrabanco = true;        
    }

    public function vercuenta(Datobanco $bancoreg)
    {
        $this->titulo = 'Ver cuenta bancaria';
        $this->bancoreg['id'] = $bancoreg->id;       
        $this->bancoreg['banco'] = $bancoreg->banco->id;
        $this->bancoreg['nrocuenta'] = $bancoreg->nrocuenta;
        $this->bancoreg['cuentadante'] = $bancoreg->cuentadante;
        $this->bancoreg['telefono'] = $bancoreg->nrotelefono;
        $this->bancoreg['tipo'] = $bancoreg->tipo;
        $this->bancoreg['documento'] = $bancoreg->documento;
        $this->bancoreg['transferencia'] = $bancoreg->transferencia;
        $this->bancoreg['pagomovil'] = $bancoreg->pagomovil;
        
        $this->modalver = true;  
    }

    public function consultareliminarcuenta(Datobanco $bancoreg)
    {        
        $this->titulo = 'Alerta !!';
        $this->resultado = 'Esta seguro de querer eliminar el número de cuenta '. $bancoreg->nrocuenta . ' una vez eliminado no podrá ser recuperado';
        $this->idcuenta = $bancoreg->id;
        $this->eliminacuenta = true;
    }

    public function Borrarcuenta(Datobanco $bancoreg)
    {
        $this->eliminacuenta = false;
        $bancoreg->delete(); 
        session()->flash('message', 'Se a eliminado correctamente la categoría: '.$bancoreg->nrocuenta);
        
    }

}
