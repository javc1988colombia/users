<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\UserRepo;

class AdminEmail extends Mailable
{
    use Queueable, SerializesModels;

    protected $inputs;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($inputs)
    {
        $this->inputs = $inputs;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {      
        $user_repo = new UserRepo();

        $items = $user_repo->getUserByCountry();

        return $this->view('admin')
        ->from('javc2009@gmail.com', 'Jonathan Velez')
        ->subject('Welcome')
        ->with([
          'items' => $items
        ]);
    }
}
