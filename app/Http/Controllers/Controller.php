<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public function principal(){
        return view('welcome');
    }
    public function bandasusu(){
        return json_encode(Auth::user()->bandas);
    }
    public function cancelar_ensayo($id){
        return view('modals.razon')->with($id);
    }
    
    
}
