<?php

namespace Fresh\Medpravda\Mail;

use Fresh\Medpravda\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ForgotEmail extends Mailable
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
    public function __construct(User $user, $type, $special_data)
    {
        $this->user = $user;
        $this->type = $type;
        $this->special_data = $special_data;
    }

    /**
     * by Olegyera
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if($this->type == 1){
            return $this->markdown('OLEGYERA.Emails.auth.forgot_login')
                ->subject($this->user->name . ', ваш новый логин сгенерирован!')
                ->with([
                    'user' => $this->user,
                    'special_data' => $this->special_data,
                ]);
        }else{
            return $this->markdown('OLEGYERA.Emails.auth.forgot_password')
                ->subject($this->user->name . ', ваш новый пароль сгенерирован!')
                ->with([
                    'user' => $this->user,
                    'special_data' => $this->special_data,
                ]);
        }

    }
}
