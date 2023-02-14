<?php

namespace App\Http\Livewire\Comp;

use Livewire\Component;
use \App\Traits\Ditecp;
use \App\Models\User;

class Personacomponente extends Component
{
    use Ditecp;

    public $modalPersona = false;
    public $persona;
    public $datospersona;

    public $modalDatosPersona = false;


    protected function rules()
    {
        if ($modalPersona = true) {
            return [
                'persona.nac' => 'required',
                'persona.ci' => 'required|numeric|integer|digits_between:6,8',
                'persona.fecha_nacimiento' => 'nullable|date'
            ];
        }        
    }

    public function render()
    {
        return view('livewire.comp.personacomponente');
    }

    public function persona()
    {
        $this->reset(['persona']);
        $this->modalPersona = true;
    }

    public function comprobarCedula()
    {
        $this->validate();

        $this->modalPersona = false;

        $info = $this->ceduladeidentidad($this->persona['nac'], $this->persona['ci']);

        switch ($info['stado']) {
            case '2':
                //error de conexion 
                break;
            case '1':
                //no registrado en el cne
                $this->datospersona['nac']  = $this->persona['nac'];
                $this->datospersona['ci'] = $this->persona['ci'];
                $this->datospersona['fecha_nacimiento'] = $this->persona['fecha_nacimiento'];
                $this->modalDatosPersona = true;
                break;            
            default:         
                $this->datospersona['nac']  = $info['nacionalidad'];
                $this->datospersona['ci'] = $info['cedula'];
                $this->datospersona['nombres'] = $info['nombres'];
                $this->datospersona['apellidos'] = $info['apellidos'];
                $this->datospersona['fecha_nacimiento'] = $this->persona['fecha_nacimiento'];
                $this->modalDatosPersona = true;
                break;
        }        
    }

    public function guardarpersona()
    {
        $this->validate([
            'datospersona.nombres' => 'required|string|min:4|max:120',
            'datospersona.apellidos' => 'required|string|min:4|max:160',
            'datospersona.nac' => 'required|in:V,E',
            'datospersona.ci' => 'required|string|min:6|max:14',
            'datospersona.fecha_nacimiento' => 'nullable|date',
            'datospersona.sexo' => 'required|in:Femenino,Masculino',
            'datospersona.codigo_operador' => 'nullable|in:416,426,414,424,412',
            'datospersona.nrotelefono' => 'nullable|string|min:7|max:7',
            'datospersona.whatsapp' => 'nullable|boolean',            
        ]);
        
        $def = auth()->user()->persona()->create([
            'nacionalidad' => $this->datospersona['nac'],
            'cedula' => $this->datospersona['ci'],
            'nombres' => $this->datospersona['nombres'],
            'apellidos' => $this->datospersona['apellidos'],
            'fnacimiento' => $this->datospersona['fecha_nacimiento'],
            'sexo' => $this->datospersona['sexo']
        ])->telefono()->create([
            'codigo_internacional' => '+58',
            'codigo_operador' => $this->datospersona['codigo_operador'] ?? null,
            'nrotelefono' => $this->datospersona['nrotelefono'] ?? null,
            'whatsapp' => $this->datospersona['whatsapp'] ?? 0,
        ]);

        return redirect()->route('orden');
    }
}
