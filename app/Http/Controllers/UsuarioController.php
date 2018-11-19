<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Storage;
use \App\usuario;

class UsuarioController extends Controller
{

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usuario = usuario::find($id);

        if (Auth::user()) {
            $usuario = Auth::user();
            $logged_in = true;
        }

        return view('layouts.usuarios.perfil', [
            'usuario' => $usuario,
            'logged_in' => $logged_in,
        ])->render();
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
        $usuario = usuario::find($id);

        if (isset($request['nombre'])) {
            $usuario->nombre = $request['nombre'];
        }
        if (isset($request['celular'])) {
            $usuario->celular = $request['celular'];
        }

        if ($request->hasFile('foto')) {
            if ($request->file('foto')->isValid()) {
                try {
                    $file = $request->foto;
                    $fileArray = array('image' => $file);

                    $rules = array(
                        'image' => 'mimes:jpeg,jpg,png,gif|required|max:10000', // max 10000kb
                    );

                    $validator = Validator::make($fileArray, $rules);

                    if ($validator->fails()) {
                        return redirect()->back(['error' => $validator->errors()->getMessages()], 400);
                    } else {
                        $name = time() . '.' . $file->getClientOriginalExtension();

                        $file->move(public_path('avatars'), $name);
                        
                        $usuario->foto = $name;

                    };

                } catch (Illuminate\Filesystem\FileNotFoundException $e) {

                }
            }
        }

        $usuario->save();

        return redirect()->back()->with('success', ['your message,here']);   
    }
}
