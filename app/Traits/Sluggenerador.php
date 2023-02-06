<?php 

namespace App\Traits;

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
	
}