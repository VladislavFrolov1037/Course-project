<?php

namespace App\Jobs;

use App\Mail\MeetingMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendReject implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $meeting;

    public $reason;

    /**
     * Create a new job instance.
     */
    public function __construct($meeting, $reason)
    {
        $this->meeting = $meeting;
        $this->reason = $reason;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->meeting->email)->send(new MeetingMail($this->meeting, $this->reason));
    }
}
