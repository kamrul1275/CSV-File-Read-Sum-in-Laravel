<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Mail\WelcomeEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessPodcast implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public $employee;

    public function __construct($employee)
    {

        //dd($this->employee=$employee);
       $this->employee=$employee;
    }

    /**
     * Execute the job.
     */







     public function handle()
     {
         try {

           // dd(Mail::to($this->employee->Email)->send(new WelcomeEmail($this->employee->Email)));
            Mail::to($this->employee->Email)->send(new WelcomeEmail($this->employee));
         } catch (\Exception $e) {
             // Log the exception
             \Log::error('Error processing ProcessPodcast job: ' . $e->getMessage());
             // Optionally, retry the job or mark it as failed
             // $this->release(10); // Retry the job after 10 seconds
             // $this->fail($e); // Mark the job as failed
         }
     }
     







    // public function handle(): void
    // {

    //    dd( Mail::to($this->employee->Email)->send(new WelcomeEmail($this->employee)));
    //     //Mail::to($this->employee->Email)->send(new WelcomeEmail($this->employee->Email));
        

    // }
}
