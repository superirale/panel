<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Campaign;
use App\Contact;
use App\Http\Services\SmsService;

class SendSMS implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    protected $campaign;
    protected $contact;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Campaign $campaign, Contact $contact)
    {
        $this->campaign = $campaign;
        $this->contact = $contact;

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        (new SmsService)->send($this->campaign->message[0], $this->contact->phone);
    }
}
