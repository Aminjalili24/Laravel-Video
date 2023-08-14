<?php

namespace App\Jobs;

use App\Mail\VerifyEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class ProcessVideo implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {


    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(VerifyEmail $verifyEmail)
    {
        Mail::raw('Verify Email',function ($message){
            $message->to('amin.jalili137819@gmail.com');
        });
//        Mail::to('amin.jalili137819@gmail.com')->send(new \App\Mail\VerifyEmail());

    }
}
