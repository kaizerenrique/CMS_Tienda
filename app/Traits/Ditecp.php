<?php 

namespace App\Traits;
use Illuminate\Support\Facades\Http;
use App\Models\Valorusd;

trait Ditecp{

     /*
    |--------------------------------------------------------------------------
    | Consulta el valor del Dólar según precio del BCV
    |--------------------------------------------------------------------------
    | Ingresan el URL de la api de ditec y el token barre
    | Retorna el status y el valor del USD
    */
    public function valorbcv()
    {
        $token = config('app.ditec_token_api');
        $url_api = config('app.ditec_bcv_api');
        try{
            $response = Http::withHeaders([
                'Authorization' => 'Bearer '.$token
            ])->get($url_api);

            $respuesta = $response->getBody()->getContents();
            $respuesta = json_decode($respuesta);
            
            if (empty(Valorusd::latest()->first()->valor)) {
                Valorusd::create([
                    'valor' => $respuesta->usd,
                ]);
                return $respuesta->usd;
            } else {
                $data = Valorusd::latest()->first()->valor; 
                if ($data == $respuesta->usd) {
                    return $data;
                } else {
                    Valorusd::create([
                        'valor' => $respuesta->usd,
                    ]);
                    return $respuesta->usd;
                }
            }
            
            
        }
        catch (\Illuminate\Http\Client\ConnectionException $e){
            return $e;
        }
    }


    public function ceduladeidentidad($nac, $cedula)
    {
        $token = config('app.ditec_token_api');
        $url_api = config('app.ditec_cedula_api');
        try{
            $response = Http::withHeaders([
                'Authorization' => 'Bearer '.$token
            ])->post($url_api, [
                'nac' => $nac,
                'ci' => $cedula,
            ]);

            $respuesta = $response->getBody()->getContents();
            $respuesta = json_decode($respuesta);

            return $respuesta;
        }
        catch (\Illuminate\Http\Client\ConnectionException $e){
            return $e;
        }
    }
	 
}