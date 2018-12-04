<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AdminReservaRegistrada extends Mailable
{
    use Queueable, SerializesModels;

    public $usuario, $ensayo;
    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($usuario, $ensayo)
    {
        $this->usuario = $usuario;
        $this->ensayo = $ensayo;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.admin-reseva-registrada')
                    ->subject('Nuevo ensayo a las ' . $this->ensayo->hora)
                    ->with([
                        'nombre' => $this->usuario->nombre,
                        'hora' => $this->ensayo->hora,
                        'duracion' => $this->ensayo->duracion,
                        'contacto' => $this->usuario->celular,
                    ]);
    }
}
