<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserRegister extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

        //data es un nombre general para que tengan todos los mail el mismo concepto
    public function __construct($user)
    {
        $this->user = $user;
        
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Esto es Una Prueba de Correo Electronico')

        ->view('Mail.mail') 
        ->with([
                'name'     => $this->user['name'],
                'email'    => $this->user['email'],
                'clave'    => $this->user['password'],
            ]);
    }
}
