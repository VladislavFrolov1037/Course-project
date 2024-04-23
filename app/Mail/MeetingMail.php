<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MeetingMail extends Mailable
{
    use Queueable, SerializesModels;

    public $meeting;
    public $reason;

    /**
     * Create a new message instance.
     *
     * @param array $meeting
     * @return void
     */
    public function __construct($meeting, $reason = null)
    {
        $this->meeting = $meeting;
        $this->reason = $reason;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Состояние встречи')
            ->view('mail.meetingRequestReceived');
    }
}
