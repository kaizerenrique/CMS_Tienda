<?php 

namespace App\Traits;

trait Sluggenerador{

    public function generarslug($titulo)
    {
        $str = strtolower($titulo);
        $game = preg_replace('/\s+/', '-', $str);

        return $game;
    }
	
}