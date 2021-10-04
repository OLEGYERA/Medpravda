<?php

namespace Fresh\Medpravda\Mail;

use Fresh\Medpravda\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class LeadEmail extends Mailable
{
    use Queueable, SerializesModels;

    protected $user;
    protected $type;
    protected $special_data;

    /**
     * by Olegyera
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * by Olegyera
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('OLEGYERA.Emails.lead')->with('data', $this->data);

    }
}
