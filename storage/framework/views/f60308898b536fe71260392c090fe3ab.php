<?php $__env->startSection('title'); ?> Create Patient <?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
<!-- No additional CSS needed -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Create New Patient</h4>
                <a href="<?php echo e(route('patients.index')); ?>" class="btn btn-secondary">Back to Patients</a>
            </div>
        </div>
    </div>

    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>
    
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="<?php echo e(route('patients.store')); ?>" method="POST">
                        <?php echo csrf_field(); ?>

                        <div class="row">                            
                            <!-- Patient Type Selection -->
                            <div class="col-md-12">
                                <div class="mb-4">
                                    <label class="form-label fw-bold">Patient Type</label>
                                    <div class="d-flex flex-wrap gap-2">
                                        <div class="form-check p-2">
                                            <input type="radio" id="freeConsultancy" name="type" class="form-check-input" value="Free Consultancy">
                                            <label class="form-check-label" for="freeConsultancy">Free Consultancy</label>
                                        </div>
                                        <div class="form-check p-2">
                                            <input type="radio" id="gyne" name="type" class="form-check-input" value="Gyne">
                                            <label class="form-check-label" for="gyne">Gyne(Gynecology)</label>
                                        </div>
                                        <div class="form-check p-2">
                                            <input type="radio" id="ultrasound" name="type" class="form-check-input" value="I/F">
                                            <label class="form-check-label" for="ultrasound">I/F(Infertility)</label>
                                        </div>
                                        <div class="form-check p-2">
                                            <input type="radio" id="laboratory" name="type" class="form-check-input" value="Laboratory">
                                            <label class="form-check-label" for="laboratory">Laboratory</label>
                                        </div>
                                        <div class="form-check p-2">
                                            <input type="radio" id="regularPatient" name="type" class="form-check-input" value="Regular Patient" checked>
                                            <label class="form-check-label" for="regularPatient">Regular Patient</label>
                                        </div>
                                    </div>
                                    <?php $__errorArgs = ['type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="text-danger"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>

                            <!-- Doctor's Coordinator (shown only for Free Consultancy) -->
                            <div class="col-md-4" id="doctorCoordinatorContainer">
                                <div class="mb-3">
                                    <label for="doctor_coordinator_id" class="form-label">Doctor's Coordinator <span class="text-danger">*</span></label>
                                    <select class="form-control <?php $__errorArgs = ['doctor_coordinator_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="doctor_coordinator_id" name="doctor_coordinator_id" required>
                                        <option value="">Select Coordinator</option>
                                        <?php $__currentLoopData = $coordinators; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $coordinator): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($coordinator->id); ?>" 
                                                data-department="<?php echo e($coordinator->department->name ?? ''); ?>"
                                                class="coordinator-option all-coordinators <?php echo e($coordinator->department ? strtolower($coordinator->department->name) . '-coordinators' : ''); ?> is-coordinator"
                                                <?php echo e(old('doctor_coordinator_id') == $coordinator->id ? 'selected' : ''); ?>>
                                                <?php echo e($coordinator->name); ?> (<?php echo e($coordinator->doctor_id); ?>)
                                                <?php if($coordinator->department): ?>
                                                    - <?php echo e($coordinator->department->name); ?>

                                                <?php endif; ?>
                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php $__errorArgs = ['doctor_coordinator_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($message); ?></strong>
                                        </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>

                            <!-- Doctor Selection (hidden for free consultancy) -->
                            <div class="col-md-4" id="doctorSelectionContainer" style="display: none;">
                                <div class="mb-3">
                                    <label for="doctor_id" class="form-label">Doctor <span class="text-danger">*</span></label>
                                    <select name="doctor_id" class="form-control <?php $__errorArgs = ['doctor_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="doctor_id">
                                        <option value="">Select Doctor</option>
                                        <?php $__currentLoopData = $doctors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doctor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($doctor->id); ?>" 
                                                data-department="<?php echo e($doctor->department->name ?? ''); ?>"
                                                class="doctor-option all-doctors <?php echo e($doctor->department ? strtolower($doctor->department->name) . '-doctors' : ''); ?>"
                                                <?php echo e(old('doctor_id') == $doctor->id ? 'selected' : ''); ?>>
                                                <?php echo e($doctor->name); ?> (<?php echo e($doctor->doctor_id); ?>)
                                                <?php if($doctor->department): ?>
                                                    - <?php echo e($doctor->department->name); ?>

                                                <?php endif; ?>
                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php $__errorArgs = ['doctor_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($message); ?></strong>
                                        </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                        </div>

                        <!-- File Type Selection (for Gyne) -->
                        <div class="row" id="fileTypeContainer" style="display: none;">
                            <div class="col-md-4 if-hide-field">
                                <div class="mb-3">
                                    <label for="filetype" class="form-label">Type <span class="text-danger">*</span></label>
                                    <select name="filetype" class="form-control">
                                        <option value="">Select Type</option>
                                        <option value="New">New</option>
                                        <option value="Follow Up">Follow Up</option>
                                    </select>
                                    <?php $__errorArgs = ['filetype'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="text-danger"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            
                            <div class="col-md-4" id="gyneOptionContainer" style="display: none;">
                                <div class="mb-3">
                                    <label for="purpose" class="form-label">Purpose <span class="text-danger">*</span></label>
                                    <select name="purpose" id="purpose" class="form-control <?php $__errorArgs = ['purpose'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                        <option value="">Select Purpose</option>
                                        <option value="Gyne">Gyne</option>
                                        <option value="A/N">A/N</option>
                                        <option value="P/N">P/N</option>
                                        <option value="Ultrasound">Ultrasound</option>
                                        <option value="Blood Test">Blood Test</option>
                                    </select>
                                    <?php $__errorArgs = ['purpose'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="text-danger"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                        </div>

                        <!-- Personal Information -->
                        <div class="row">
                            <h5 class="mb-4">Personal Information</h5>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="patient_name" class="form-label">Patient Name <span class="text-danger">*</span></label>
                                    <input type="text" name="patient_name" class="form-control <?php $__errorArgs = ['patient_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('patient_name')); ?>" required>
                                    <?php $__errorArgs = ['patient_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="text-danger"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="patient_contact" class="form-label">Contact Number <span class="text-danger">*</span></label>
                                    <input type="text" id="patient_contact" name="patient_contact" class="form-control <?php $__errorArgs = ['patient_contact'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('patient_contact')); ?>" required>
                                    <?php $__errorArgs = ['patient_contact'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="text-danger"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3 gyne-hide-field">
                                    <label for="patient_dob" class="form-label">Date of Birth</label>
                                    <input type="date" name="patient_dob" class="form-control" value="<?php echo e(old('patient_dob')); ?>">
                                </div>
                            </div>
                          
                            <div class="col-md-8">
                                <div class="mb-3 gyne-hide-field laboratory-hide-field">
                                    <label for="patient_address" class="form-label">Address</label>
                                    <textarea name="patient_address" class="form-control" rows="3"><?php echo e(old('patient_address')); ?></textarea>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3 laboratory-hide-field">
                                    <label for="patient_cnic" class="form-label">CNIC <span id="cnic-required" class="text-danger" style="display: none;">*</span></label>
                                    <input type="text" id="patient_cnic" name="patient_cnic" class="form-control <?php $__errorArgs = ['patient_cnic'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('patient_cnic')); ?>">
                                    <?php $__errorArgs = ['patient_cnic'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($message); ?></strong>
                                        </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    <small class="form-text text-muted">Format: 00000-0000000-0</small>
                                </div>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3 if-hide-field">
                                    <label for="alternative_contact" class="form-label">Alternative Contact</label>
                                    <input type="text" id="alternative_contact" name="alternative_contact" class="form-control">
                                </div>
                            </div>
                        </div>
                        <!-- Spouse Information -->
                        <div class="row gyne-hide-section">
                            <h5 class="mb-4">Spouse Information</h5>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="spouse_name" class="form-label">Spouse Name <span class="if-required text-danger">*</span></label>
                                    <input type="text" name="spouse_name" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="spouse_contact" class="form-label">Spouse Contact <span class="if-required text-danger">*</span></label>
                                    <input type="text" id="spouse_contact" name="spouse_contact" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="spouse_dob" class="form-label">Spouse Date of Birth</label>
                                    <input type="date" name="spouse_dob" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="spouse_cnic" class="form-label">Spouse CNIC</label>
                                    <input type="text" id="spouse_cnic" name="spouse_cnic" class="form-control">
                                    <small class="form-text text-muted">Format: 00000-0000000-0</small>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Create Patient</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script src="<?php echo e(URL::asset('/assets/libs/inputmask/inputmask.min.js')); ?>"></script>
<script>
$(document).ready(function(){
    // Set initial visibility for Regular Patient (default)
    $('#doctorSelectionContainer').show();
    $('#doctorCoordinatorContainer').hide();
    $('#fileTypeContainer').hide();
    $('#gyneOptionContainer').hide();
    $('#doctor_id').prop('required', true);
    $('#doctor_coordinator_id').prop('required', false);

    // Initialize input masks
    $('#patient_cnic').inputmask('99999-9999999-9');
    $('#spouse_cnic').inputmask('99999-9999999-9');
    $('#patient_contact, #spouse_contact, #alternative_contact').inputmask('(0399) 999-9999');

    // Initialize the filter for Regular Patient (which is checked by default)
    var initialType = $('input[name="type"]:checked').val();
    filterDoctors(initialType);
    hideandshow(initialType);
    
    // Attach click handlers to the radio buttons to ensure immediate UI updates
    $('#freeConsultancy').on('click', function() {
        console.log("Free Consultancy selected via click");
        // Force display the coordinator container and hide doctor container
        $('#doctorSelectionContainer').hide();
        $('#doctorCoordinatorContainer').show();
        $('#doctor_id').prop('required', false);
        $('#doctor_coordinator_id').prop('required', true);
        
        hideandshow('Free Consultancy');
        filterDoctors('Free Consultancy');
    });
    
    // Handle patient type change
    $('input[name="type"]').change(function() {
        var selectedType = $(this).val();
        console.log("Patient type changed to: " + selectedType);
        hideandshow(selectedType);
    });
    
    // Form validation
    $('form').on('submit', function(e) {
        var selectedType = $('input[name="type"]:checked').val();
        console.log("Form submission initiated for patient type: " + selectedType);
        var hasError = false;
        
        // Only validate fields marked with * (required) in the UI
        if (selectedType === 'Free Consultancy') {
            // For Free Consultancy, check coordinator field
            console.log("Checking coordinator value: " + $('#doctor_coordinator_id').val());
            console.log("Coordinator field required: " + $('#doctor_coordinator_id').prop('required'));
            console.log("Coordinator container visible: " + $('#doctorCoordinatorContainer').is(':visible'));
            
            if ($('#doctorCoordinatorContainer').is(':visible') && !$('#doctor_coordinator_id').val()) {
                e.preventDefault();
                console.log("Error: Coordinator not selected");
                alert('Please select a Coordinator');
                $('#doctor_coordinator_id').focus();
                hasError = true;
            }
            
            // Make sure doctor field is not required for Free Consultancy
            $('#doctor_id').prop('required', false);
        } else if (selectedType === 'Gyne') {
            if (!$('#doctor_id').val()) {
                e.preventDefault();
                console.log("Error: Doctor not selected");
                alert('Please select a Doctor');
                $('#doctor_id').focus();
                hasError = true;
            }
            
            // Only check Purpose if it's visible
            if ($('#gyneOptionContainer').is(':visible')) {
                var purpose = $('#purpose').val();
                if (!purpose) {
                    e.preventDefault();
                    console.log("Error: Purpose not selected");
                    alert('Purpose is required for Gyne patients.');
                    $('#purpose').focus();
                    hasError = true;
                }
            }
            
            // Only check Type if it's visible
            if ($('#fileTypeContainer').is(':visible')) {
                var fileType = $('select[name="filetype"]').val();
                if (!fileType) {
                    e.preventDefault();
                    console.log("Error: Type not selected");
                    alert('Type is required for Gyne patients.');
                    $('select[name="filetype"]').focus();
                    hasError = true;
                }
            }
        } else if (selectedType === 'I/F') {
            if (!$('#doctor_id').val()) {
                e.preventDefault();
                console.log("Error: Doctor not selected");
                alert('Please select a Doctor');
                $('#doctor_id').focus();
                hasError = true;
            }
            
            // Only validate spouse info if the fields are visible
            if ($('.gyne-hide-section').is(':visible')) {
                var spouseName = $('input[name="spouse_name"]').val();
                if (!spouseName) {
                    e.preventDefault();
                    console.log("Error: Spouse Name missing");
                    alert('Spouse Name is required for Infertility patients.');
                    $('input[name="spouse_name"]').focus();
                    hasError = true;
                }
                
                var spouseContact = $('input[name="spouse_contact"]').val();
                if (!spouseContact) {
                    e.preventDefault();
                    console.log("Error: Spouse Contact missing");
                    alert('Spouse Contact is required for Infertility patients.');
                    $('input[name="spouse_contact"]').focus();
                    hasError = true;
                }
            }
            
            // Only check Type if it's visible
            if ($('#fileTypeContainer').is(':visible')) {
                var fileType = $('select[name="filetype"]').val();
                if (!fileType) {
                    e.preventDefault();
                    console.log("Error: Type not selected");
                    alert('Type is required for Infertility patients.');
                    $('select[name="filetype"]').focus();
                    hasError = true;
                }
            }
        } else if (selectedType === 'Regular Patient') {
            if (!$('#doctor_id').val()) {
                e.preventDefault();
                console.log("Error: Doctor not selected");
                alert('Please select a Doctor');
                $('#doctor_id').focus();
                hasError = true;
            }
        } else if (selectedType === 'Laboratory') {
            // For Laboratory, we just need to validate patient name and contact
            // which are already required via HTML
        }
        
        // If we already found errors, don't continue with CNIC validation
        if (hasError) {
            console.log("Form submission stopped due to validation errors");
            return false;
        }
        
        // Only validate CNIC format if value is provided (not required for any patient type)
        var cnic = $('#patient_cnic').val();
        if (cnic && cnic.trim() !== '') {
            var cnicRegex = /^\d{5}-\d{7}-\d{1}$/;
            if (!cnicRegex.test(cnic)) {
                e.preventDefault();
                console.log("Error: Invalid CNIC format");
                alert('Please enter a valid CNIC number in the format: 00000-0000000-0');
                $('#patient_cnic').focus();
                return false;
            }
        }
        
        var spouseCnic = $('#spouse_cnic').val();
        if (spouseCnic && spouseCnic.trim() !== '') {
            var cnicRegex = /^\d{5}-\d{7}-\d{1}$/;
            if (!cnicRegex.test(spouseCnic)) {
                e.preventDefault();
                console.log("Error: Invalid spouse CNIC format");
                alert('Please enter a valid spouse CNIC number in the format: 00000-0000000-0');
                $('#spouse_cnic').focus();
                return false;
            }
        }
        
        console.log("Form validation successful, submitting form");
        return true;
    });

    // Function to filter doctors based on department
    function filterDoctors(patientType) {
        var doctorSelect = $('#doctor_id');
        var coordinatorSelect = $('#doctor_coordinator_id');
        
        // Hide all options first
        doctorSelect.find('option').hide();
        coordinatorSelect.find('option').hide();
        
        // Always show the "Select Doctor" option and selected options
        doctorSelect.find('option:first, option:selected').show();
        coordinatorSelect.find('option:first, option:selected').show();

        if (patientType === 'Gyne') {
            // Show only Gynecology department doctors
            doctorSelect.find('.doctor-option.gynecology-doctors').show();
        } else if (patientType === 'I/F') {
            // Show only Infertility department doctors
            doctorSelect.find('.doctor-option.infertility-doctors').show();
        } else if (patientType === 'Free Consultancy') {
            // For Free Consultancy, show only coordinators that are not from Gynecology or Infertility departments
            coordinatorSelect.find('.coordinator-option').each(function() {
                const dept = $(this).data('department')?.toLowerCase() || '';
                if (dept !== 'gynecology' && dept !== 'infertility') {
                    $(this).show();
                }
            });
        } else if (patientType === 'Laboratory') {
            // For Laboratory patients, we don't need to filter doctors
            doctorSelect.find('.doctor-option').show();
        } else {
            // For Regular Patient, show all doctors EXCEPT Infertility and Gynecology
            doctorSelect.find('.doctor-option').each(function() {
                const dept = $(this).data('department')?.toLowerCase() || '';
                if (dept !== 'gynecology' && dept !== 'infertility') {
                    $(this).show();
                }
            });
        }
    }
    
    function hideandshow(selectedType){
        if (selectedType === 'Free Consultancy') {
            // Show coordinator selection and hide doctor selection
            $('#doctorSelectionContainer').hide();
            $('#doctorCoordinatorContainer').show();
            $('#fileTypeContainer').hide();
            $('#gyneOptionContainer').hide();
            // Update required attributes for doctor fields
            $('#doctor_id').prop('required', false);
            $('#doctor_coordinator_id').prop('required', true);
            // Reset requirements for CNIC
            $('#patient_cnic').prop('required', false);
            $('#cnic-required').hide();
            $('#purpose').prop('required', false);
            $('select[name="filetype"]').prop('required', false);
            // Show CNIC fields
            $('[for="patient_cnic"]').closest('.mb-3').show();
            $('[for="spouse_cnic"]').closest('.mb-3').show();
            // Show DOB, Address, and Spouse fields
            $('.gyne-hide-field').show();
            $('.gyne-hide-section').show();
            // Show Type field
            $('.if-hide-field').show();
            // Set spouse fields as optional
            $('input[name="spouse_name"]').prop('required', false);
            $('input[name="spouse_contact"]').prop('required', false);
            $('.if-required').hide();
            filterDoctors(selectedType);
            
            // Log the visibility state for debugging
            console.log("Free Consultancy selected:");
            console.log("Doctor container visible: " + $('#doctorSelectionContainer').is(':visible'));
            console.log("Coordinator container visible: " + $('#doctorCoordinatorContainer').is(':visible'));
            console.log("Doctor required: " + $('#doctor_id').prop('required'));
            console.log("Coordinator required: " + $('#doctor_coordinator_id').prop('required'));
        } else if (selectedType === 'Regular Patient') {
            $('#doctorSelectionContainer').show();
            $('#doctorCoordinatorContainer').hide();
            $('#fileTypeContainer').hide();
            $('#gyneOptionContainer').hide();
            // Update required attributes for doctor fields
            $('#doctor_id').prop('required', true);
            $('#doctor_coordinator_id').prop('required', false);
            // Reset requirements for CNIC
            $('#patient_cnic').prop('required', false);
            $('#cnic-required').hide();
            $('#purpose').prop('required', false);
            $('select[name="filetype"]').prop('required', false);
            // Show CNIC fields
            $('[for="patient_cnic"]').closest('.mb-3').show();
            $('[for="spouse_cnic"]').closest('.mb-3').show();
            // Show DOB, Address, and Spouse fields
            $('.gyne-hide-field').show();
            $('.gyne-hide-section').show();
            // Show Type field
            $('.if-hide-field').show();
            // Set spouse fields as optional
            $('input[name="spouse_name"]').prop('required', false);
            $('input[name="spouse_contact"]').prop('required', false);
            $('.if-required').hide();
            filterDoctors(selectedType);
        } else if (selectedType === 'Gyne') {
            $('#doctorSelectionContainer').show();
            $('#doctorCoordinatorContainer').hide();
            $('#fileTypeContainer').show();
            $('#gyneOptionContainer').show();
            // For Gyne patients, show Type field but not Alternative Contact
            $('.if-hide-field').show();
            // Update required attributes for doctor fields
            $('#doctor_id').prop('required', true);
            $('#doctor_coordinator_id').prop('required', false);
            // No CNIC required for Gyne
            $('#patient_cnic').prop('required', false);
            $('#cnic-required').hide();
            $('#purpose').prop('required', true);
            $('select[name="filetype"]').prop('required', true);
            // Hide CNIC fields for Gyne
            $('[for="patient_cnic"]').closest('.mb-3').hide();
            $('[for="spouse_cnic"]').closest('.mb-3').hide();
            // Hide DOB, Address, and Spouse fields for Gyne
            $('.gyne-hide-field').hide();
            $('.gyne-hide-section').hide();
            // Set all spouse fields as not required
            $('input[name="spouse_name"]').prop('required', false);
            $('input[name="spouse_contact"]').prop('required', false);
            $('.if-required').hide();
            filterDoctors(selectedType);
        } else if (selectedType === 'I/F') {
            $('#doctorSelectionContainer').show();
            $('#doctorCoordinatorContainer').hide();
            $('#fileTypeContainer').show();
            $('#gyneOptionContainer').hide();
            // Hide Type field and Alternative Contact for I/F
            $('.if-hide-field').hide();
            // Both patient and spouse information required for I/F
            $('input[name="patient_name"]').prop('required', true);
            $('input[name="spouse_name"]').prop('required', true);
            $('input[name="patient_contact"]').prop('required', true);
            $('input[name="spouse_contact"]').prop('required', true);
            // Reset requirements for CNIC
            $('#patient_cnic').prop('required', false);
            $('#cnic-required').hide();
            $('#purpose').prop('required', false);
            $('select[name="filetype"]').prop('required', true);
            // Show CNIC fields for I/F
            $('[for="patient_cnic"]').closest('.mb-3').show();
            $('[for="spouse_cnic"]').closest('.mb-3').show();
            // Show DOB, Address, and Spouse fields
            $('.gyne-hide-field').show();
            $('.gyne-hide-section').show();
            // Set spouse fields as required for I/F
            $('.if-required').show();
            // Update required attributes for doctor fields
            $('#doctor_id').prop('required', true);
            $('#doctor_coordinator_id').prop('required', false);
            filterDoctors(selectedType);
        } else if (selectedType === 'Laboratory') {
            // Configuration for Laboratory patient type
            $('#doctorSelectionContainer').hide();
            $('#doctorCoordinatorContainer').hide();
            $('#fileTypeContainer').hide();
            $('#gyneOptionContainer').hide();
            // Update required attributes for doctor fields
            $('#doctor_id').prop('required', false);
            $('#doctor_coordinator_id').prop('required', false);
            // Make patient name and contact required, but not CNIC
            $('input[name="patient_name"]').prop('required', true);
            $('input[name="patient_contact"]').prop('required', true);
            $('#patient_cnic').prop('required', false);
            $('#cnic-required').hide();
            $('#purpose').prop('required', false);
            $('select[name="filetype"]').prop('required', false);
            // Show CNIC field, DOB, and Alternative Contact
            $('[for="patient_cnic"]').closest('.mb-3').show();

            // Show DOB field
            $('.gyne-hide-field').show();
            $('.laboratory-hide-field').hide();
            // Hide spouse section as it's not needed for Laboratory
            $('.gyne-hide-section').hide();
            // Show Alternative Contact field
            $('.if-hide-field').show();
            // Set spouse fields as not required
            $('input[name="spouse_name"]').prop('required', false);
            $('input[name="spouse_contact"]').prop('required', false);
            $('.if-required').hide();
            filterDoctors(selectedType);
        }
    }
});
</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/user/htdocs/srv617279.hstgr.cloud/resources/views/patients/create.blade.php ENDPATH**/ ?>