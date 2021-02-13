<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RegisterUserMailable extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $subject = "Creedenciales de usuario";

    protected $username, $password;
    public function __construct($username,$password)
    {
        $this->username = $username;
        $this->password = $password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
      $user = $this->username;
      $pass = $this->password;
      $url = config('app.url');
      $name = config('app.name');
      return $this->view('emails.UserCredentials',compact('user','pass','url','name'));
    }
}
