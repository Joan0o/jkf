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
        return $this->belongsToMany('App\banda', 'usuario_has_banda');
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

    public function toMail($notifiable)
    {
        $url = url('/');

        return (new MailMessage)
            ->greeting('Hola!')
            ->line('Acabas de reservar en la sala de ensayo a las ' . $ensayo['hora'] .'!')
            ->action('Ir a la pegina', $url)
            ->line('Ingresa en nuestra pagina, inicia sesión y podras ver todas las reservas que tienes');
    }
}
