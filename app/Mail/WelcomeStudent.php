<?php

namespace App\Mail;

use App\Student;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class WelcomeStudent extends Mailable
{
    use Queueable, SerializesModels;
    public $student;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Student $student)
    {
        $this->student = $student;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Welkom bij Examenplanning')->markdown('emails.students.welcomestudent');
    }
}
