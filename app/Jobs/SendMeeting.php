<?php

namespace App\Jobs;

use App\Mail\MeetingMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendMeeting implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $meeting;

    /**
     * Create a new job instance.
     */
    public function __construct($meeting)
    {
        $this->meeting = $meeting;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->meeting->email)->send(new MeetingMail($this->meeting));
    }
}
