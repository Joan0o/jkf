<?php

namespace App\Http\Controllers;

use App\ensayo;
use App\Events\reserva;
use App\Mail\AdminReservaRegistrada;
use App\Mail\EnsayoCancelado;
use App\Mail\ReservaRegistrada;
use App\usuario;
use Auth;
use DB;
use Illuminate\Http\Request;
use Mail;

class EnsayoController extends Controller
{
    public function ensayos($fecha)
    {
        if (Auth::check()) {
            if (Auth::user()->rol == 'admin') {
                $ensayos = DB::select("select ensayo.id, banda_id, nombre, contacto, hora, duracion, ensayo.estado, pagado from ensayo
                                        inner join banda on (ensayo.banda_id = banda.id)
                                        where fecha_programada = '" . $fecha . "'
                                        order by hora ASC");
                return response()->json($ensayos);
            }
        }

        $ensayos = DB::select("select ensayo.id, banda_id, nombre, contacto, hora, duracion from ensayo
            inner join banda on (ensayo.banda_id = banda.id)
            where ensayo.estado = 'reservado' and fecha_programada = '" . $fecha . "'
            order by hora ASC");

        if (Auth::check()) {
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
            if (Auth::check()) {
                $ensayo->contacto = Auth::user()->celular . ' - ' . Auth::user()->email;
            }
            $ensayo->banda_id = '1';
        }

        $ensayo->save();

        try {
            event(new reserva($ensayo));

            foreach ($ensayo->banda->integrantes as $i) {
                Mail::to($i->email)
                    ->queue(new ReservaRegistrada($ensayo));
            }

            $admin = usuario::find(5);

            Mail::to($admin->email)
                ->queue(new AdminReservaRegistrada(Auth::user(), $ensayo));

        } catch (Exception $e) {
            return json_encode(['mensaje' => 'Ocurrió un error publicando la reserva, igual está registrada así que te esperamos!']);
        }

        return json_encode(['mensaje' => 'Reserva registrada, te esperamos!']);
    }

    public function cancelarEnsayo(Request $data, $id)
    {

        if (!(Auth::check())) {
            return 'ninguna sesión iniciada';
        }

        $user = Auth::user();
        $ensayo = ensayo::find($id);

        $ensayo->estado = 'cancelado';
        $ensayo->detalles = $data['detalles'];
        $banda = $data['banda'];
        $ensayo->save();

        try {
            $admin = usuario::find(5);
            Mail::to($admin->email)
                ->queue(new EnsayoCancelado(
                    $ensayo,
                    $ensayo->detalles,
                    $admin->celular,
                    $user->celular,
                    $banda
                ));
            foreach ($ensayo->banda->integrantes as $i) {
                Mail::to($i->email)
                    ->queue(new EnsayoCancelado(
                        $ensayo,
                        $ensayo->detalles,
                        $admin->celular,
                        $i->celular,
                        $banda
                    ));
            }
        } catch (Exception $e) {

        } finally {
            return view('welcome')->with('mensaje', 'Ensayo cancelado, ocurrió un error enviando las notificaciones');
        }

        return view('welcome')->with('mensaje', 'Ensayo cancelado');
    }

    public function Editar(Request $data, $id)
    {
        $ensayo = ensayo::find($id);

        $ensayo->estado = 'confirmado';
        $ensayo->pagado = $data['pagado'];
        $ensayo->detalles = $data['detalles'];

        $ensayo->save();

        return json_encode(['mensaje' => 'ensayo editado']);
    }
}
