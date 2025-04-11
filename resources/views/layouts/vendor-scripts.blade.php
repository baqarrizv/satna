<!-- JAVASCRIPT -->
<script src="{{ URL::asset('/assets/libs/jquery/jquery.min.js')}}"></script>
<script src="{{ URL::asset('/assets/libs/bootstrap/bootstrap.min.js')}}"></script>
<script src="{{ URL::asset('/assets/libs/metismenu/metismenu.min.js')}}"></script>
<script src="{{ URL::asset('/assets/libs/simplebar/simplebar.min.js')}}"></script>
<script src="{{ URL::asset('/assets/libs/node-waves/node-waves.min.js')}}"></script>
<script src="{{ URL::asset('/assets/libs/waypoints/waypoints.min.js')}}"></script>
<script src="{{ URL::asset('/assets/libs/jquery-counterup/jquery-counterup.min.js')}}"></script>
<script src="{{ URL::asset('/assets/libs/dropzone/dropzone.min.js') }}"></script> 
<script src="{{ URL::asset('/assets/libs/datatables/datatables.min.js') }}"></script>
<script src="{{ URL::asset('/assets/libs/select2/select2.min.js') }}"></script>
<script src="{{ URL::asset('/assets/js/select2-init.js') }}"></script>


@if(config('settings.enable_push_notifications') && !empty(config('settings.onesignal_app_id')) && !empty(config('settings.onesignal_api_key')))
<script src="https://cdn.onesignal.com/sdks/web/v16/OneSignalSDK.page.js" defer></script>
<script>
  window.OneSignalDeferred = window.OneSignalDeferred || [];
  OneSignalDeferred.push(async function(OneSignal) {
    await OneSignal.init({
      appId: "{{ config('settings.onesignal_app_id') }}",
    });
    
    @if (Auth::check())
        await OneSignal.login("{{ Auth::user()->id }}");
    @endif

  });
</script>
@endif

@yield('script')

 <!-- App js -->
 <script src="{{ URL::asset('/assets/js/app.min.js')}}"></script>
 <script>
    let idleTime = 0;

    function timerIncrement() {
        idleTime++;
        if (idleTime > 10) { // 10 minutes, you can adjust this to your need
            window.location.href = '{{ route('lock') }}';
        }
    }

    // Increment the idle time counter every minute.
    setInterval(timerIncrement, 60000); // 1 minute

    // Reset the idle timer on any activity.
    window.onmousemove = window.onkeypress = function () {
        idleTime = 0;
    };
</script>

<script>
    Dropzone.autoDiscover = false;
    document.addEventListener('DOMContentLoaded', function () {
        if (document.querySelectorAll('.dropzone-uploader').length > 0) {

            document.querySelectorAll('.dropzone-uploader').forEach(function (element) {
                let url = element.getAttribute('data-url');
                let maxFiles = element.getAttribute('data-max-files');
                let acceptedFiles = element.getAttribute('data-accepted-files');
                let maxFileSize = element.getAttribute('data-max-file-size');
                let existingFiles = element.getAttribute('data-existingfiles');
                existingFiles = JSON.parse(existingFiles);

                let csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                // Disable multiple file upload if maxFiles is 1
                let multiple = maxFiles > 1;

                let dz = new Dropzone(element, {
                    url: url,
                    thumbnailWidth: 100,
                    thumbnailHeight: null,
                    addRemoveLinks: true,
                    maxFiles: maxFiles,
                    acceptedFiles: acceptedFiles,
                    maxFilesize: maxFileSize, // in MB
                    multiple: multiple,  // Disable multiple uploads if maxFiles is 1
                    parallelUploads: maxFiles,
                    previewTemplate: `
                        <div class="dz-preview dz-file-preview">
                            <img data-dz-thumbnail style="width: 100px; height: auto;"/>
                            <div class="dz-filename"><span data-dz-name></span></div>
                            <div class="dz-size" data-dz-size></div>
                        </div>
                    `,
                    headers: {
                        'X-CSRF-TOKEN': csrfToken  // Add the CSRF token to the headers
                    },
                    init: function () {
                        let dropzoneInstance = this;
                    
                        // Load existing files (if any)
                        if (existingFiles) {
                            existingFiles.forEach((file_path) => {
                                fetch(file_path, { method: 'HEAD' })
                                    .then(response => {
                                        let fileSize = response.headers.get('content-length');
                                        let fileName = file_path.split('/').pop();

                                        let mockFile = { name: fileName, size: fileSize, serverFileName: file_path };

                                        dropzoneInstance.emit("addedfile", mockFile);
                                        dropzoneInstance.emit("thumbnail", mockFile, file_path);
                                        dropzoneInstance.emit("complete", mockFile);

                                        dropzoneInstance.files.push(mockFile);

                                        // Add a hidden input for the existing file
                                        let inputName = element.getAttribute('data-input-name') || 'file';
                                        addHiddenInput(element, inputName, file_path, multiple);

                                    });
                            });
                        }                                    

                        let errorContainer = document.createElement('div');
                        errorContainer.classList.add('dropzone-error', 'text-danger', 'mt-2');
                        element.insertAdjacentElement('afterend', errorContainer);

                        this.on("addedfile", function (file) {
                            // Check current file count and prevent adding if maxFiles limit is reached
                            if (this.files.length > maxFiles) {
                                this.removeFile(file);  // Remove the file

                                // Display an error message in the error container
                                errorContainer.textContent = `You can only upload up to ${maxFiles} file(s).`;
                                return;
                            }

                            // Clear the error message if file count is within limit
                            errorContainer.textContent = '';
                        });
                        
                        // Handle successful upload
                        this.on("success", function (file, response) {
                            let inputName = element.getAttribute('data-input-name') || 'file';

                            // Add a hidden input for the newly uploaded file
                            addHiddenInput(element, inputName, response.file_path, multiple);

                            file.serverFileName = response.file_path;  // Save file path for future reference
                        });

                        // Handle file removal
                        this.on("removedfile", function (file) {
                            if (file.serverFileName) {
                                // Remove the corresponding hidden input for this file
                                removeHiddenInput(element, file.serverFileName);
                            }
                        });
                    }
                });
            });

            // Helper function to add hidden inputs
            function addHiddenInput(dropzoneElement, inputName, filePath, multiple) {
                let hiddenInput = document.createElement('input');
                hiddenInput.type = 'hidden';
                hiddenInput.name = multiple ? inputName + '[]' : inputName;  // Use array-style input only if multiple files are allowed
                hiddenInput.value = filePath;
                hiddenInput.setAttribute('data-file-path', filePath); 
                dropzoneElement.appendChild(hiddenInput);
            }

            // Helper function to remove hidden inputs
            function removeHiddenInput(dropzoneElement, filePath) {
                let hiddenInput = dropzoneElement.querySelector(`input[type="hidden"][data-file-path="${filePath}"]`);
                if (hiddenInput) {
                    hiddenInput.remove();
                }
            }
        }    
    });
</script>


<script>
    $(document).ready(function() {
        if ($('.data-table').length > 0) {
            $('.data-table').DataTable({
                responsive: true,
            });
        }   
    });
</script>

<script>
    if ('serviceWorker' in navigator && 'PushManager' in window) {
        // Check if the prompt has already been shown in this session
        if (!localStorage.getItem('installPromptShown')) {
            window.addEventListener('beforeinstallprompt', (e) => {
                // Prevent the mini-infobar from appearing on mobile
                e.preventDefault();
                const deferredPrompt = e;

                // Show the modal using Bootstrap's modal method
                const installModal = new bootstrap.Modal(document.getElementById('installModal'), {
                    keyboard: false
                });

                installModal.hide();

                // Add an event listener to the Install button in the modal
                document.getElementById('confirmInstallBtn').addEventListener('click', () => {
                    // Hide the modal after the button click
                    installModal.hide();

                    // Show the install prompt
                    deferredPrompt.prompt();

                    // Wait for the user to respond to the prompt
                    deferredPrompt.userChoice.then((choiceResult) => {
                        if (choiceResult.outcome === 'accepted') {
                            console.log('User accepted the install prompt');
                        } else {
                            console.log('User dismissed the install prompt');
                        }                           
                    });
                });
        
                // Set the localStorage flag to prevent showing again
                localStorage.setItem('installPromptShown', 'true');
            });
        }
    }
</script>

 @yield('script-bottom')