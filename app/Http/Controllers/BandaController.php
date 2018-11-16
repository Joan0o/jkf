<?php

namespace App\Http\Controllers;

use App\banda;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BandaController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $data)
    {
        $id = banda::create([
            'nombre' => $data['nombre'],
            'bio' => $data['bio'],
        ])->id;

        DB::table('usuario_has_banda')->insert(
            [
                'usuario_id' => Auth::user()->id,
                'banda_id' => $id,
                'activo' => "1",
            ]
        );

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $banda = banda::find($id);
        $from_user = false;

        if (Auth::user()) {
            $bandas_usuario = Auth::user()->bandas;

            if ($bandas_usuario->contains($banda)) {
                $from_user = true;
            }
        }

        return view('layouts.bandas.banda', [
            'banda' => $banda,
            'from_user' => $from_user,
        ])->render();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $banda = banda::find($id);

        if (isset($request['nombre'])) {
            $banda->nombre = $request['nombre'];
        }

        if (isset($request['bio'])) {
            $banda->bio = $request['bio'];
        }

        $banda->save();

        return json_encode($banda);
    }

}
