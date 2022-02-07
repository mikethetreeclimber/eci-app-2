<?php

namespace Modules\Crm\Jobs;

use Illuminate\Bus\Queueable;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Modules\Crm\Imports\ContactListImport;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class UploadContactListJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $file;
    protected $circuit;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($file, $circuit)
    {
        $this->circuit = $circuit;
        $this->file = $file;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        return Excel::import(new ContactListImport($this->circuit), $this->file);
    }
}
