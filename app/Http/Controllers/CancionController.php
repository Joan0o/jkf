<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\cancion;
use App\banda;

class CancionController extends Controller
{

    public function store(Request $data)
    {

        cancion::create([
            'nombre' => $data['nombre'],
            'links' => $data['links'],
            'banda_id' => $data['banda_id'],
        ]); 
        
        return view('layouts.bandas.pills')->with('collection', banda::find($data['banda_id'])->canciones)->render();

    }
}
