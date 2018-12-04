<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Auth;

class EnsayoCancelado extends Mailable
{
    use Queueable, SerializesModels;

    public $ensayo, $motivo, $usuario, $admin, $banda;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($ensayo, $motivo, $admin, $user, $banda)
    {
        $this->ensayo = $ensayo;
        $this->motivo = $motivo;
        $this->usuario = $user;
        $this->admin = $admin;
        $this->banda = $banda;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.ensayo-cancelado')
                    ->subject('Ensayo cancelado')
                    ->with([
                        'hora' => $this->ensayo->hora,
                        'duracion' => $this->ensayo->duracion,
                        'motivo' => $this->motivo,
                        'banda' => $this->banda,
                        'contacto_banda' => $this->usuario,
                        'contacto_sala' => $this->admin,
                    ]);
    }
}
