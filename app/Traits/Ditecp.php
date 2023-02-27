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

            $detar = $respuesta->info->error;

            switch ($detar) {
                case '1':
                    $res = array(
                        'stado' => $detar
                    );
                    return $res;                   
                    break;               
                
                default:
                    $res = array(
                        'stado' => 0,
                        'nacionalidad' => $respuesta->info->nacionalidad,
                        'cedula' => $respuesta->info->cedula,
                        'nombres' => $respuesta->info->nombres,
                        'apellidos' => $respuesta->info->apellidos
                    );
                    return $res;
                    break;
            }

        }
        catch (\Illuminate\Http\Client\ConnectionException $e){    
            $res = array(
                'stado' => 2
            );        
            return $res;
        }
    }

    public function WhatsApp($mensaje, $telefono, $documento, $nombre)
    {
        $token = config('app.ditec_token_api');
        $url_api = config('app.ditec_WhatsApp_api');

        try{
            $response = Http::withHeaders([
                'Authorization' => 'Bearer '.$token
            ])->post($url_api, [
                'mensaje' => $mensaje,
                'telefono' => $telefono,
                'documento' => $documento,
                'nombre' => $nombre
            ]);

            $respuesta = $response->getBody()->getContents();
            $respuesta = json_decode($respuesta);     
            
            return $respuesta->status;

        }
        catch (\Illuminate\Http\Client\ConnectionException $e){    
            $res = array(
                'stado' => 2
            );        
            return $res;
        }
    }
	 
}