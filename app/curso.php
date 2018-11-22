<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class curso extends Model
{
    protected $table = 'curso';

    protected $fillable = [
        'nombre', 'descripcion', 'texto', 'recursos', 'tema_id'
    ];

    use SearchableTrait;

    /**
     * Searchable rules.
     *
     * @var array
     */
    protected $searchable = [
        /**
         * Columns and their priority in search results.
         * Columns with higher values are more important.
         * Columns with equal values have equal importance.
         *
         * @var array
         */
        'columns' => [
            'curso.nombre' => 10,
            'curso.descripcion' => 10,
        ]
    ];


}
