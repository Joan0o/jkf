<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class banda extends Model
{
    protected $table = "banda";

    protected $fillable = [
        'id', 'nombre', 'bio',
    ];


    public function integrantes(){
        return $this->belongsToMany('App\usuario', 'usuario_has_banda');
    }
    public function canciones(){
        return $this->hasMany('App\cancion');
    }
    public function bandas(){
        return banda::all()->where('id', '<>', 1);
    }
}
