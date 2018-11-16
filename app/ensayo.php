<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ensayo extends Model
{
    protected $table = "ensayo";

    protected $fillable = [
        'id', 'fecha_programada', 'hora', 'duracion', 'estado', 'pagado', 'banda_id', 'contacto'
    ];
}
