<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;

class FileUploadService
{
    /**
     * Handle file upload and replacement.
     *
     * @param string|null $newFilePath The new file's temporary path.
     * @param string|null $oldFilePath The old file's path in storage.
     * @param string $storageFolder The folder in which the new file should be stored.
     * @return string|null Updated file path or null.
     */
    public function handleFileUpdate($newFilePath, $oldFilePath, $storageFolder)
    {
        if (str_contains($newFilePath, '/storage/temp/')) {
            // Delete the old file if it exists
            if ($oldFilePath && Storage::disk('public')->exists($oldFilePath)) {
                Storage::disk('public')->delete($oldFilePath);
            }

            // Extract the filename from the temp path
            $fileName = basename($newFilePath);

            // Define the new path in the specified folder (default to 'settings')
            $newFileFinalPath = $storageFolder . '/' . $fileName;

            // Convert URLs to relative file paths for Storage
            $relativeTempPath = str_replace('/storage/', '', parse_url($newFilePath, PHP_URL_PATH));
            $relativeFinalPath = str_replace('/storage/', '', parse_url($newFileFinalPath, PHP_URL_PATH));

            // Check if the temp file exists before moving it
            if (Storage::disk('public')->exists($relativeTempPath)) {
                // Move the file to the new location
                Storage::disk('public')->move($relativeTempPath, $relativeFinalPath);
            } else {
                // Return null or handle the case where the file was not found
                return null;
            }

            // Return the new file path for updating the setting
            return $relativeFinalPath;
        }

        // Return the old file path if no new file is uploaded
        return $oldFilePath;
    }
}
