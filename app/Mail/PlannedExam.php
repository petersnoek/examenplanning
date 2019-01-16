<?php

namespace App\Mail;

use App\Exam;
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
    public $user;
    public $exam;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($url, User $user, Exam $exam)
    {
        $this->url = $url;
        $this->user = $user;
        $this->exam = $exam;
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
