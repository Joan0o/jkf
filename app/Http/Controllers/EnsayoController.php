<?php

namespace App\Http\Controllers;

use App\ensayo;
use App\Events\reserva;
use Auth;
use DB;
use Illuminate\Http\Request;
use Mail;

class EnsayoController extends Controller
{
    public function ensayos($fecha)
    {
        $ensayos = DB::select("select banda_id, nombre, contacto, hora, duracion from ensayo
            inner join banda on (ensayo.banda_id = banda.id)
            where ensayo.estado = 'reservado' and fecha_programada = '" . $fecha . "'
            order by hora ASC");

        if (Auth::id() !== null) {
            if (count(Auth::user()->bandas) > 0) {
                foreach ($ensayos as $ensayo) {
                    foreach (Auth::user()->bandas as $banda) {
                        if ($ensayo->banda_id == $banda->id) {
                            $ensayo->from_user = 'true';
                        }
                    }
                }
            }
        }

        return response()->json($ensayos);
    }

    public function store(Request $data)
    {
        $ensayo = new ensayo([
            'fecha_programada' => $data['fecha'],
            'hora' => $data['hora'],
            'estado' => "reservado",
            'pagado' => 0,
            'duracion' => $data['duracion'],
            'banda_id' => $data['banda_id'],
        ]);

        if (!isset($data['banda_id'])) {
            $ensayo->contacto = $data['nombre'] . ' - ' . $data['contacto'];
            if (Auth::user() != null) {
                $ensayo->contacto = Auth::user()->celular . ' - ' . Auth::user()->email;
            }
            $ensayo->banda_id = '1';
        }

        $ensayo->save();

        try{
            event(new reserva($ensayo));
        }catch(Exception $e){
            return $e;
        }
        
        return 'done';
    }
}
