<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $nama;
    public $email;
    public $subject;
    public $pesan;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($nama, $email, $subject, $pesan)
    {
        $this->nama = $nama;
        $this->email = $email;
        $this->subject = $subject;
        $this->pesan = $pesan;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('erdinurikhsan0601@gmail.com', 'Erdi Nurikhsan')->subject($this->subject)->view('front.email.send');
    }
}
