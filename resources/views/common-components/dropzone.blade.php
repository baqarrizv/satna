<div class="dropzone-uploader" 
    data-url="{{ route('temp-upload') }}"  
    data-existingfiles='{!! json_encode($existingFiles) !!}'
    data-max-files="{{ $maxFiles ?? 1 }}"          
    data-accepted-files="{{ $acceptedFiles ?? 'image/*' }}"
    data-max-file-size="{{ $maxFileSize ?? 2 }}"
    data-input-name="{{ $inputName ?? 'file' }}"
    style="border: 2px dashed #0087F7; padding: 50px; text-align: center;">
Drop files here or click to upload.
</div>