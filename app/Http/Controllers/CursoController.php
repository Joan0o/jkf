<?php

namespace App\Http\Controllers;

use DB;
use Exception;
use Illuminate\Http\Request;
use \App\curso;

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

    public function buscar(Request $data)
    {
        $cursos = DB::table('curso')->select('nombre', 'id')->get();
        return $cursos->toJson();
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
            'descripcion' => $data['descripcion'],
        ]);

        try {
            if ($request['temas'] != null) {
                $tags = explode(' ', $request['temas']);
                dump($tags);
                foreach ($tags as $tag) {
                    $id2 = DB::table('tema')->insert(
                        ['nombre' => $tag]
                    );
                    DB::table('tema_curso')->insert([
                        'tema_id' => rand(100000),
                        'curso_id' => $id,
                        'tema_id' => $id2,
                    ]
                    );
                    dump(DB::table('tema_curso')->insert([
                        'tema_id' => rand(100000),
                        'curso_id' => $id,
                        'tema_id' => $id2,
                    ]
                    ));
                }
            }
        } catch (Exception $e) {

        }
        return back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $curso = curso::find($id);
        if ($curso == null) {
            return back() - with('error');
        }
        return view('cursos.curso')->with('curso', $curso);
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
        $data->resources = array();
        if ($request->hasFile('photos')) {
            $allowedfileExtension = ['pdf', 'jpg', 'png', 'docx', 'pdf', 'pptx', 'mp4', 'mov'];
            $files = $request->file('photos');
            foreach ($files as $file) {
                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $check = in_array($extension, $allowedfileExtension);
                if ($check) {
                    foreach ($request->photos as $photo) {
                        $filename = time() . '.' . $file->getClientOriginalExtension();
                        $file->move(public_path('cursos/').$id, $filename);
                        array_push($data->resources, 'cursos/'.$id.'/'.$filename);
                    }
                }
            }
        }

        return json_encode($data);
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
