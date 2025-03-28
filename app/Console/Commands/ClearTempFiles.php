<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;


class ClearTempFiles extends Command
{
    // Command signature and description
    protected $signature = 'temp:clear';
    protected $description = 'Clear files from storage/temp older than 10 minutes';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        // Path to the temp folder
        $tempPath = storage_path('app/public/temp');

        // Get all files in the directory
        $files = File::files($tempPath);

        // Get the current time
        $now = Carbon::now();

        foreach ($files as $file) {
            // Get the last modified time of the file
            $lastModifiedTimestamp = filemtime($file);
            $lastModified = Carbon::createFromTimestamp($lastModifiedTimestamp);

            // Calculate the difference in minutes
            $diffInMinutes = $now->diffInMinutes($lastModified, true);

            // Log the difference in minutes
            $this->info("Difference in Minutes: " . $diffInMinutes);

            // If the file is older than 10 minutes, delete it
            if ($diffInMinutes > 10) {
                File::delete($file);
                $this->info("Deleted: " . $file->getFilename());
            }
        }

        $this->info("Temp folder cleanup completed.");
    }


}
