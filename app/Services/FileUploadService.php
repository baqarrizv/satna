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
            if ($oldFilePath && file_exists(public_path($oldFilePath))) {
                File::delete(public_path($oldFilePath));
            }
            // Return null to clear the database field
            return null;
        }
        
        // Handle file upload for new files
        if (str_contains($newFilePath, '/storage/temp/')) {
            // Delete the old file if it exists
            if ($oldFilePath && file_exists(public_path($oldFilePath))) {
                File::delete(public_path($oldFilePath));
            }

            // Extract the filename from the temp path
            $fileName = basename($newFilePath);

            // Create directory if it doesn't exist
            $uploadDir = 'assets/uploads/' . $storageFolder;
            if (!File::exists(public_path($uploadDir))) {
                File::makeDirectory(public_path($uploadDir), 0755, true);
            }

            // Define the new path in the specified folder
            $newFileFinalPath = $uploadDir . '/' . $fileName;

            // Convert URLs to relative file paths for Storage
            $relativeTempPath = str_replace('/storage/', '', parse_url($newFilePath, PHP_URL_PATH));

            // Copy the file from storage to public/assets/uploads
            if (Storage::disk('public')->exists($relativeTempPath)) {
                // Get the file content
                $fileContent = Storage::disk('public')->get($relativeTempPath);
                
                // Save to the new location
                File::put(public_path($newFileFinalPath), $fileContent);
                
                // Delete the temp file
                Storage::disk('public')->delete($relativeTempPath);
            } else {
                // Return null or handle the case where the file was not found
                return null;
            }

            // Return the new file path for updating the setting
            return $newFileFinalPath;
        }

        // Return the old file path if no new file is uploaded
        return $oldFilePath;
    }
}
