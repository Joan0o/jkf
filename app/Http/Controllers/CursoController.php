<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\curso;
use Exception;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cursos.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $data)
    {
        $id = curso::create([ 
            'nombre' => $data['nombre'],
            'descripcion' => $data['descripcion']
        ]);

        try{
            dump($request['temas']);

            if($request['temas'] != null){
                $tags = explode(' ', $request['temas']);
                dump($tags);
                foreach($tags as $tag){
                    $id2 = DB::table('tema')->insert(
                        ['nombre' => $tag]
                    );
                    DB::table('tema_curso')->insert([
                        'tema_id' => rand(100000),
                            'curso_id' => $id,
                            'tema_id' => $id2
                        ]
                    );
                    dump(DB::table('tema_curso')->insert([
                        'tema_id' => rand(100000),
                            'curso_id' => $id,
                            'tema_id' => $id2
                        ]
                    ));
                }
            }
        }catch(Exception $e){
            
        }
        return view('cursos.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
