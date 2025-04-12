<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class FileUploadService
{
    /**
     * Handle file upload and replacement.
     *
     * @param string|null $newFilePath The new file's temporary path.
     * @param string|null $oldFilePath The old file's path in storage.
     * @param string $storageFolder The folder within uploads directory for categorizing files.
     * @return string|null Updated file path or null.
     */
    public function handleFileUpdate($newFilePath, $oldFilePath, $storageFolder)
    {
        // If newFilePath is empty or null, it means the user wants to remove the image
        if (empty($newFilePath) || $newFilePath === null || $newFilePath === "null") {
            // Delete the old file if it exists
            if ($oldFilePath) {
                // Check if it's already a storage path
                if (str_starts_with($oldFilePath, 'storage/')) {
                    $storagePath = str_replace('storage/', '', $oldFilePath);
                    Storage::disk('public')->delete($storagePath);
                } else if (file_exists(public_path($oldFilePath))) {
                    // Legacy path in public directory
                    File::delete(public_path($oldFilePath));
                }
            }
            // Return null to clear the database field
            return null;
        }
        
        // Handle file upload for new files
        if (str_contains($newFilePath, '/storage/temp/')) {
            // Delete the old file if it exists
            if ($oldFilePath) {
                // Check if it's already a storage path
                if (str_starts_with($oldFilePath, 'storage/')) {
                    $storagePath = str_replace('storage/', '', $oldFilePath);
                    Storage::disk('public')->delete($storagePath);
                } else if (file_exists(public_path($oldFilePath))) {
                    // Legacy path in public directory
                    File::delete(public_path($oldFilePath));
                }
            }

            // Extract the filename from the temp path
            $fileName = basename($newFilePath);

            // Define storage path
            $storagePath = $storageFolder . '/' . $fileName;

            // Convert URLs to relative file paths for Storage
            $relativeTempPath = str_replace('/storage/', '', parse_url($newFilePath, PHP_URL_PATH));

            // Copy the file from temp to the correct storage location
            if (Storage::disk('public')->exists($relativeTempPath)) {
                // Get the file content
                $fileContent = Storage::disk('public')->get($relativeTempPath);
                
                // Save to the new location in storage
                Storage::disk('public')->put($storagePath, $fileContent);
                
                // Delete the temp file
                Storage::disk('public')->delete($relativeTempPath);
            } else {
                // Return null or handle the case where the file was not found
                return null;
            }

            // Return the new file path using storage URL
            return 'storage/' . $storagePath;
        }

        // Return the old file path if no new file is uploaded
        return $oldFilePath;
    }
}
