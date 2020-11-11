<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactoEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $subject = "Trazatech";
    public $pedido;
    public $usuario;
    public $lineas;
    public $direccion;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($pedido, $direccion,  $lineas,  $usuario)
    {
        $this->pedido = $pedido;
        $this->usuario = $usuario;
        $this->lineas = $lineas;
        $this->direccion = $direccion;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.infopedido');
    }
}
