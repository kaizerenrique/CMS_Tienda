<?php 

namespace App\Traits;

use App\Models\Producto;
use Illuminate\Support\Str;

trait Sluggenerador{

    public function generarslug($titulo)
    {
        $str = strtolower($titulo);
        $game = preg_replace('/\s+/', '-', $str);
        $codigo = Str::random(6); 
        $game = $game.'-'.$codigo;

        return $game;
    }
	
    public function generarslugurl()
    {
        $codigo = Str::random(24);        

        return $codigo;
    }

    public function codegeneradorproducto()
    {    
        //generar nombre de forma randon y confirmar que no se repite
        do {
            $codigo = Str::random(16); 
        } while (Producto::where('codigo', $codigo )->exists());

        return $codigo;
    }
}