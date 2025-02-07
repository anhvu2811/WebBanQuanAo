<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;

class ResetPasswordEmail extends Mailable
{
    public $name;
    public $password;

    public function __construct($name, $password)
    {
        $this->name = $name;
        $this->password = $password;
    }

    public function build()
    {
        return $this->subject('THAY ĐỔI MẬT KHẨU')
                    ->view('emails.reset-password-email')
                    ->with([
                        'name' => $this->name,
                        'newPassword' => $this->password
                    ]);
    }
}
