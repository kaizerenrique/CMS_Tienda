<?php

namespace App\Http\Livewire\Admin;

use App\Models\Categoria;
use Livewire\Component;

class Categoriaeditcomponente extends Component
{

    public $slugcategoria;

    public function mount($slugcategoria )
    {
        $this->slugcategoria = $slugcategoria;
    }

    public function render()
    {

        $categorias = Categoria::where('slug', $this->slugcategoria)->get();
        foreach ($categorias as $categoria) {
            $categorias = $categorias;
        }

        $titulo = $categoria->categoria;      

        return view('livewire.admin.categoriaeditcomponente',[
            'titulo' => $titulo,
        ]);
    }
}
