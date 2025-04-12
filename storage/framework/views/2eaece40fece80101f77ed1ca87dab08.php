<div class="dropzone-uploader" 
    data-url="<?php echo e(route('temp-upload')); ?>"  
    data-existingfiles='<?php echo json_encode($existingFiles); ?>'
    data-max-files="<?php echo e($maxFiles ?? 1); ?>"          
    data-accepted-files="<?php echo e($acceptedFiles ?? 'image/*'); ?>"
    data-max-file-size="<?php echo e($maxFileSize ?? 2); ?>"
    data-input-name="<?php echo e($inputName ?? 'file'); ?>"
    style="border: 2px dashed #0087F7; padding: 50px; text-align: center;">
Drop files here or click to upload.
</div><?php /**PATH /home/user/htdocs/srv617279.hstgr.cloud/resources/views/common-components/dropzone.blade.php ENDPATH**/ ?>