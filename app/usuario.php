<?php

namespace App;

use Auth;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class usuario extends Authenticatable
{
    use Notifiable;

    protected $table = 'usuario';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre', 'email', 'password', 'celular', 'rol',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function bandas()
    {
        return $this->belongsToMany('App\banda', 'usuario_has_banda')->where('estado', '<>', -1);
    }

    public static function from_user($banda)
    {
        if (Auth::id() !== null) {
            if (!isset(Auth::user()->bandas)) {
                return false;
            }
            foreach (Auth::user()->bandas as $banda_usuario) {
                if ($banda_usuario->id == $banda->id) {
                    return true;
                }
            }
        }
        return false;
    }

    
}
