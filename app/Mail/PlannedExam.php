<?php

namespace App\Mail;

use App\Slot;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PlannedExam extends Mailable
{
    use Queueable, SerializesModels;

    public $url;
    public $slot;
    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($url, Slot $slot, User $user)
    {
        $this->url = $url;
        $this->slot = $slot;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Je planning is veranderd!')->markdown('emails.planning.plannedexam');
    }
}
