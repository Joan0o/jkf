<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use DB;

class banda extends Model
{
    protected $table = "banda";

    protected $fillable = [
        'id', 'nombre', 'bio', 'estado'
    ];


    public function integrantes(){
        return $this->belongsToMany('App\usuario', 'usuario_has_banda');
    }
    public function canciones(){
        return $this->hasMany('App\cancion');
    }
    public function bandas(){
        return DB::table('banda')->where([
            ['estado', '<>', '-1'],
            ['id', '<>', '1'],
        ])->get();
    }
}
