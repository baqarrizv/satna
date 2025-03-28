<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TempFileUploadController extends Controller
{
    /**
     * Upload a file to the temporary folder.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function uploadFiles(Request $request)
    {
        // Check if a file is present in the request
        if ($request->hasFile('file')) {
            // Store the file in the 'temp' folder inside the 'public' disk
            $path = $request->file('file')->store('temp', 'public');

            // Return the full URL to the stored file
            return response()->json([
                'file_path' => Storage::url($path),
                'message' => 'File uploaded successfully!',
            ]);
        }

        // Return an error if no file was uploaded
        return response()->json(['error' => 'No file uploaded'], 400);
    }
}
