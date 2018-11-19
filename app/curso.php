<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class curso extends Model
{
    protected $table = 'curso';

    protected $fillable = [
        'nombre', 'descripcion', 'texto', 'recursos', 'tema_id'
    ];
}
