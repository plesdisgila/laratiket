<?php

namespace App\Mail;
use App\Tamu;
use App\Transaksi;
use App\Acara;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class TamuMail extends Mailable
{
    use Queueable, SerializesModels;

    public $transaksi;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($transaksi)
    {
        //
        $this->transaksi = $transaksi;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('email.tamu.tamu-mail')
        ->subject('invoice ' . $this->transaksi->invoice)
        ->from('no-reply@cahya.awas.my.id', 'LaraTiket');
    }
}
