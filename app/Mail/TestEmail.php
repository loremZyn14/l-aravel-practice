<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TestEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $address = 'darnrish.it.solution@gmail.com';
        $subject = 'This is a demo!';
        $name = 'Jane Doe';

        return $this->view('emails.test')
                    ->from($address)
                    ->subject($subject)
                    ->with([ 'test_message' => $this->data['message'] ]);
    }
}
