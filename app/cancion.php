<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cancion extends Model
{
    protected $table = "cancion";

    protected $fillable = [
        'id', 'nombre', 'links', 'banda_id',
    ];
}
