@extends('layouts.master')

@section('title') Edit Patient @endsection

@section('css')
<!-- No additional CSS needed -->
<link href="{{ URL::asset('/assets/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Edit Patient</h4>
                <a href="{{ route('patients.index') }}" class="btn btn-secondary">Back to Patients</a>
            </div>
        </div>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('patients.update', $patient->id) }}" method="POST">
                        @csrf
                        @method('PATCH')

                        <div class="row">
                            <!-- Patient Type Selection -->
                            <div class="col-md-12">
                                <div class="mb-4">
                                    <label class="form-label fw-bold">Patient Type</label>
                                    <div class="d-flex flex-wrap gap-2">
                                        <div class="form-check p-2">
                                            <input type="radio" id="freeConsultancy" name="type" class="form-check-input" value="Free Consultancy" {{ $patient->type == 'Free Consultancy' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="freeConsultancy">Free Consultancy</label>
                                        </div>
                                        <div class="form-check p-2">
                                            <input type="radio" id="gyne" name="type" class="form-check-input" value="Gyne" {{ $patient->type == 'Gyne' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="gyne">Gyne(Gynecology)</label>
                                        </div>
                                        <div class="form-check p-2">
                                            <input type="radio" id="ultrasound" name="type" class="form-check-input" value="I/F" {{ $patient->type == 'I/F' || $patient->type == 'Ultrasound' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="ultrasound">I/F(Infertility)</label>
                                        </div>
                                        <div class="form-check p-2">
                                            <input type="radio" id="laboratory" name="type" class="form-check-input" value="Laboratory" {{ $patient->type == 'Laboratory' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="laboratory">Laboratory</label>
                                        </div>
                                        <div class="form-check p-2">
                                            <input type="radio" id="regularPatient" name="type" class="form-check-input" value="Regular Patient" {{ $patient->type == 'Regular Patient' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="regularPatient">Regular Patient</label>
                                        </div>
                                    </div>
                                    @error('type')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Doctor's Coordinator (shown only for Free Consultancy) -->
                            <div class="col-md-4" id="doctorCoordinatorContainer">
                                <div class="mb-3">
                                    <label for="doctor_coordinator_id" class="form-label">Doctor's Coordinator <span class="text-danger">*</span></label>
                                    <select class="form-control @error('doctor_coordinator_id') is-invalid @enderror select2" id="doctor_coordinator_id" name="doctor_coordinator_id" required>
                                        <option value="">Select Coordinator</option>
                                        @foreach($coordinators as $coordinator)
                                            <option value="{{ $coordinator->id }}" 
                                                data-department="{{ $coordinator->department->name ?? '' }}"
                                                class="coordinator-option all-coordinators {{ $coordinator->department ? strtolower($coordinator->department->name) . '-coordinators' : '' }} is-coordinator"
                                                {{ $patient->doctor_coordinator_id == $coordinator->id ? 'selected' : '' }}>
                                                {{ $coordinator->name }} ({{ $coordinator->doctor_id }})
                                                @if($coordinator->department)
                                                    - {{ $coordinator->department->name }}
                                                @endif
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('doctor_coordinator_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Doctor Selection (hidden for free consultancy) -->
                            <div class="col-md-4" id="doctorSelectionContainer">
                                <div class="mb-3">
                                    <label for="doctor_id" class="form-label">Doctor <span class="text-danger">*</span></label>
                                    <select name="doctor_id" class="form-control @error('doctor_id') is-invalid @enderror select2" id="doctor_id">
                                        <option value="">Select Doctor</option>
                                        @foreach($doctors as $doctor)
                                            <option value="{{ $doctor->id }}" 
                                                data-department="{{ $doctor->department->name ?? '' }}"
                                                class="doctor-option all-doctors {{ $doctor->department ? strtolower($doctor->department->name) . '-doctors' : '' }}"
                                                {{ $patient->doctor_id == $doctor->id ? 'selected' : '' }}>
                                                {{ $doctor->name }} ({{ $doctor->doctor_id }})
                                                @if($doctor->department)
                                                    - {{ $doctor->department->name }}
                                                @endif
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('doctor_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                             <!-- File Created Field - Only for Regular Patient -->
                             <div class="col-md-4" id="fileCreatedContainer" style="display: none;">
                                <div class="mb-3">
                                    <label for="filecreated" class="form-label">File Created</label>
                                    <select name="filecreated" id="filecreated" class="form-control">
                                        <option value="No" {{ $patient->filecreated == 'No' || !$patient->filecreated ? 'selected' : '' }}>No</option>
                                        <option value="Yes" {{ $patient->filecreated == 'Yes' ? 'selected' : '' }}>Yes</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Patient Numbers Information -->
                        <div class="row mb-4">
                            <div class="col-md-12">
                                <div class="card border">
                                    <div class="card-body">
                                        <h5 class="card-title">Patient Numbers</h5>
                                        <div class="row">
                                            @if($patient->fc_number)
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label fw-bold">FC Number</label>
                                                    <p class="form-control-static">{{ $patient->fc_number }}</p>
                                                </div>
                                            </div>
                                            @endif
                                            
                                            @if($patient->file_number)
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label fw-bold">File Number</label>
                                                    <p class="form-control-static">{{ $patient->file_number }}</p>
                                                </div>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
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
                                        <option value="New" {{ $patient->filetype == 'New' ? 'selected' : '' }}>New</option>
                                        <option value="Follow Up" {{ $patient->filetype == 'Follow Up' ? 'selected' : '' }}>Follow Up</option>
                                    </select>
                                    @error('filetype')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-4" id="gyneOptionContainer" style="display: none;">
                                <div class="mb-3">
                                    <label for="purpose" class="form-label">Purpose <span class="text-danger">*</span></label>
                                    <select name="purpose" id="purpose" class="form-control @error('purpose') is-invalid @enderror">
                                        <option value="">Select Purpose</option>
                                        <option value="Gyne" {{ $patient->purpose == 'Gyne' ? 'selected' : '' }}>Gyne</option>
                                        <option value="A/N" {{ $patient->purpose == 'A/N' ? 'selected' : '' }}>A/N</option>
                                        <option value="P/N" {{ $patient->purpose == 'P/N' ? 'selected' : '' }}>P/N</option>
                                        <option value="Ultrasound" {{ $patient->purpose == 'Ultrasound' ? 'selected' : '' }}>Ultrasound</option>
                                        <option value="Blood Test" {{ $patient->purpose == 'Blood Test' ? 'selected' : '' }}>Blood Test</option>
                                    </select>
                                    @error('purpose')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Personal Information -->
                        <div class="row">
                            <h5 class="mb-4">Personal Information</h5>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="patient_name" class="form-label">Patient Name <span class="text-danger">*</span></label>
                                    <input type="text" name="patient_name" class="form-control @error('patient_name') is-invalid @enderror" value="{{ $patient->patient_name }}" required>
                                    @error('patient_name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="patient_contact" class="form-label">Contact Number <span class="text-danger">*</span></label>
                                    <input type="text" id="patient_contact" name="patient_contact" class="form-control @error('patient_contact') is-invalid @enderror" value="{{ $patient->patient_contact }}" required>
                                    @error('patient_contact')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3 gyne-hide-field">
                                    <label for="patient_dob" class="form-label">Date of Birth</label>
                                    <input type="date" name="patient_dob" class="form-control"  value="{{ $patient->patient_dob ? \Carbon\Carbon::parse($patient->patient_dob)->format('Y-m-d') : '' }}">
                                </div>
                            </div>
                          
                            <div class="col-md-8">
                                <div class="mb-3 gyne-hide-field laboratory-hide-field">
                                    <label for="patient_address" class="form-label">Address</label>
                                    <textarea name="patient_address" class="form-control" rows="3">{{ $patient->patient_address }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3 laboratory-hide-field">
                                    <label for="patient_cnic" class="form-label">CNIC <span id="cnic-required" class="text-danger" style="display: none;">*</span></label>
                                    <input type="text" id="patient_cnic" name="patient_cnic" class="form-control @error('patient_cnic') is-invalid @enderror" value="{{ $patient->patient_cnic }}">
                                    @error('patient_cnic')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <small class="form-text text-muted">Format: 00000-0000000-0</small>
                                </div>
                            </div>
                            
                        </div>
                        <!-- Alternative Contact -->
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3 if-hide-field">
                                    <label for="alternative_contact" class="form-label">Alternative Contact</label>
                                    <input type="text" id="alternative_contact" name="alternative_contact" class="form-control" value="{{ $patient->alternative_contact }}">
                                </div>
                            </div>
                            
                           
                        </div>

                        <!-- Spouse Information -->
                        <div class="row gyne-hide-section">
                            <h5 class="mb-4">Spouse Information</h5>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="spouse_name" class="form-label">Spouse Name <span class="if-required text-danger">*</span></label>
                                    <input type="text" name="spouse_name" class="form-control" value="{{ $patient->spouse_name }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="spouse_contact" class="form-label">Spouse Contact <span class="if-required text-danger">*</span></label>
                                    <input type="text" id="spouse_contact" name="spouse_contact" class="form-control" value="{{ $patient->spouse_contact }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="spouse_dob" class="form-label">Spouse Date of Birth</label>
                                    <input type="date" name="spouse_dob" class="form-control" value="{{ $patient->spouse_dob ? \Carbon\Carbon::parse($patient->spouse_dob)->format('Y-m-d') : '' }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="spouse_cnic" class="form-label">Spouse CNIC</label>
                                    <input type="text" id="spouse_cnic" name="spouse_cnic" class="form-control" value="{{ $patient->spouse_cnic }}">
                                    <small class="form-text text-muted">Format: 00000-0000000-0</small>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Update Patient</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<!-- We're removing the duplicate jQuery loading since it's already in vendor-scripts -->
{{-- <script src="{{ URL::asset('/assets/libs/jquery/jquery.min.js') }}"></script> --}}
<script src="{{ URL::asset('/assets/libs/inputmask/inputmask.min.js') }}"></script>
{{-- <script src="{{ URL::asset('/assets/libs/select2/select2.min.js') }}"></script> --}}
<script>
$(document).ready(function(){
    // Initialize input masks
    $('#patient_cnic').inputmask('99999-9999999-9');
    $('#spouse_cnic').inputmask('99999-9999999-9');
    $('#patient_contact, #spouse_contact, #alternative_contact').inputmask('(0399) 999-9999');

    // Helper function to count digits in a string
    function countDigits(str) {
        return str.replace(/\D/g, '').length;
    }

    // Helper function to validate phone numbers
    function validatePhoneNumber(phoneNumber) {
        // Remove all non-digits
        const digitsOnly = phoneNumber.replace(/\D/g, '');
        // Check if exactly 11 digits
        return digitsOnly.length === 11;
    }

    // Initialize the filter for the current patient type
    var initialType = $('input[name="type"]:checked').val();
    if (initialType) {
        hideandshow(initialType);
        filterDoctors(initialType);
    } else {
        // Default to Regular Patient if somehow no radio button is checked
        $('input[name="type"][value="Regular Patient"]').prop('checked', true);
        hideandshow('Regular Patient');
        filterDoctors('Regular Patient');
    }
    
    // Attach click handlers to all patient type radio buttons
    $('input[name="type"]').on('click', function() {
        var selectedType = $(this).val();
        console.log("Patient type selected: " + selectedType);
        hideandshow(selectedType);
    });
    
    // Re-initialize Select2 if needed, but don't redefine it since it's already loaded
    if ($.fn.select2) {
        $('.select2').select2({
            width: '100%',
            placeholder: 'Select an option'
        });
    }
    
    function filterDoctors(patientType) {
        var doctorSelect = $('#doctor_id');
        var coordinatorSelect = $('#doctor_coordinator_id');
        
        // Destroy Select2 before manipulating options
        if (doctorSelect.hasClass('select2-hidden-accessible')) {
            doctorSelect.select2('destroy');
        }
        
        if (coordinatorSelect.hasClass('select2-hidden-accessible')) {
            coordinatorSelect.select2('destroy');
        }
        
        // Hide all options first
        doctorSelect.find('option').hide();
        coordinatorSelect.find('option').hide();
        
        // Always show the "Select Doctor" option and selected options
        doctorSelect.find('option:first, option:selected').show();
        coordinatorSelect.find('option:first, option:selected').show();

        var visibleDoctorOptions = 0;
        var visibleCoordinatorOptions = 0;

        if (patientType === 'Gyne') {
            // Show only Gynecology department doctors
            var gyneOptions = doctorSelect.find('.doctor-option.gynecology-doctors');
            gyneOptions.show();
            visibleDoctorOptions = gyneOptions.length;
        } else if (patientType === 'I/F') {
            // Show only Infertility department doctors
            var ifOptions = doctorSelect.find('.doctor-option.infertility-doctors');
            ifOptions.show();
            visibleDoctorOptions = ifOptions.length;
        } else if (patientType === 'Free Consultancy') {
            // For Free Consultancy, show only coordinators that are not from Gynecology or Infertility departments
            coordinatorSelect.find('.coordinator-option').each(function() {
                const dept = $(this).data('department')?.toLowerCase() || '';
                if (dept !== 'gynecology' && dept !== 'infertility') {
                    $(this).show();
                    visibleCoordinatorOptions++;
                }
            });
        } else if (patientType === 'Laboratory') {
            // For Laboratory patients, we hide the doctor selection
            visibleDoctorOptions = 0;
        } else {
            // For Regular Patient, show all doctors EXCEPT Infertility and Gynecology
            doctorSelect.find('.doctor-option').each(function() {
                const dept = $(this).data('department')?.toLowerCase() || '';
                if (dept !== 'gynecology' && dept !== 'infertility') {
                    $(this).show();
                    visibleDoctorOptions++;
                }
            });
        }
        
        // Remove any existing doctor/coordinator messages first
        doctorSelect.find('.no-doctors-message').remove();
        coordinatorSelect.find('.no-coordinators-message').remove();
        
        // Handle no doctors available message
        if (visibleDoctorOptions === 0 && patientType !== 'Free Consultancy' && patientType !== 'Laboratory') {
            // Check if the currently selected doctor is valid for this type
            const selectedDoctor = doctorSelect.find('option:selected');
            const selectedDoctorVal = selectedDoctor.val();
            const selectedIsValid = selectedDoctorVal && selectedDoctorVal !== '' && 
                                   (selectedDoctor.hasClass('all-doctors') || 
                                    (patientType === 'Gyne' && selectedDoctor.hasClass('gynecology-doctors')) ||
                                    (patientType === 'I/F' && selectedDoctor.hasClass('infertility-doctors')) ||
                                    (patientType === 'Regular Patient' && !selectedDoctor.hasClass('gynecology-doctors') && !selectedDoctor.hasClass('infertility-doctors')));
                                    
            // If no valid selection, add the no doctors message
            if (!selectedIsValid) {
                // Add a disabled option for "No doctors available" message
                doctorSelect.find('option:first').after('<option class="no-doctors-message" disabled>No doctors available for this patient type</option>');
                // Make sure this option is visible
                doctorSelect.find('.no-doctors-message').show();
                // Reset selection to empty if current selection is invalid
                if (selectedDoctorVal && selectedDoctorVal !== '') {
                    doctorSelect.val('');
                }
            }
        }
        
        // Handle no coordinators available message
        if (visibleCoordinatorOptions === 0 && patientType === 'Free Consultancy') {
            // Check if the currently selected coordinator is valid for this type
            const selectedCoordinator = coordinatorSelect.find('option:selected');
            const selectedCoordinatorVal = selectedCoordinator.val();
            const coordinatorDept = selectedCoordinator.data('department')?.toLowerCase() || '';
            const selectedIsValid = selectedCoordinatorVal && selectedCoordinatorVal !== '' && 
                                   coordinatorDept !== 'gynecology' && coordinatorDept !== 'infertility';
            
            // If no valid selection, add the no coordinators message
            if (!selectedIsValid) {
                // Add a disabled option for "No coordinators available" message
                coordinatorSelect.find('option:first').after('<option class="no-coordinators-message" disabled>No coordinators available for this patient type</option>');
                // Make sure this option is visible
                coordinatorSelect.find('.no-coordinators-message').show();
                // Reset selection to empty if current selection is invalid
                if (selectedCoordinatorVal && selectedCoordinatorVal !== '') {
                    coordinatorSelect.val('');
                }
            }
        }
        
        // Remove any existing alert messages
        $('#no-doctors-message, #no-coordinators-message').remove();
        
        // Reinitialize Select2 with filtered options
        doctorSelect.select2({
            width: '100%',
            placeholder: 'Select Doctor',
            templateResult: function(data) {
                // Skip hidden options in dropdown
                if ($(data.element).css('display') === 'none') {
                    return null;
                }
                return data.text;
            }
        });
        
        coordinatorSelect.select2({
            width: '100%',
            placeholder: 'Select Coordinator',
            templateResult: function(data) {
                // Skip hidden options in dropdown
                if ($(data.element).css('display') === 'none') {
                    return null;
                }
                return data.text;
            }
        });
    }
    
    function hideandshow(selectedType) {
        // Reset all fields
        resetAllFields();
        
        // Define configuration for each patient type
        const patientTypeConfig = {
            'Free Consultancy': {
                doctor: { show: false, required: false },
                coordinator: { show: true, required: true },
                fileType: { show: false, required: false },
                purpose: { show: false, required: false },
                gyneOption: { show: false },
                patientFields: {
                    cnic: { show: true, required: false },
                    dob: { show: true },
                    address: { show: true }
                },
                spouseSection: { 
                    show: true, 
                    required: false 
                },
                ifFields: { show: true },
                laboratoryFields: { show: true },
                fileCreated: { show: false }
            },
            'Regular Patient': {
                doctor: { show: true, required: true },
                coordinator: { show: false, required: false },
                fileType: { show: false, required: false },
                purpose: { show: false, required: false },
                gyneOption: { show: false },
                patientFields: {
                    cnic: { show: true, required: false },
                    dob: { show: true },
                    address: { show: true }
                },
                spouseSection: { 
                    show: true, 
                    required: false 
                },
                ifFields: { show: true },
                laboratoryFields: { show: true },
                fileCreated: { show: true }
            },
            'Laboratory': {
                doctor: { show: false, required: false },
                coordinator: { show: false, required: false },
                fileType: { show: false, required: false },
                purpose: { show: false, required: false },
                gyneOption: { show: false },
                patientFields: {
                    cnic: { show: false, required: false },
                    dob: { show: true },
                    address: { show: false }
                },
                spouseSection: { 
                    show: false, 
                    required: false 
                },
                ifFields: { show: true },
                laboratoryFields: { show: false },
                fileCreated: { show: false }
            },
            'Gyne': {
                doctor: { show: true, required: true },
                coordinator: { show: false, required: false },
                fileType: { show: true, required: true },
                purpose: { show: true, required: true },
                gyneOption: { show: true },
                patientFields: {
                    cnic: { show: false, required: false },
                    dob: { show: false },
                    address: { show: false }
                },
                spouseSection: { 
                    show: false, 
                    required: false 
                },
                ifFields: { show: true },
                laboratoryFields: { show: true },
                fileCreated: { show: false }
            },
            'I/F': {
                doctor: { show: true, required: true },
                coordinator: { show: false, required: false },
                fileType: { show: true, required: true },
                purpose: { show: false, required: false },
                gyneOption: { show: false },
                patientFields: {
                    cnic: { show: true, required: false },
                    dob: { show: true },
                    address: { show: true }
                },
                spouseSection: { 
                    show: true, 
                    required: true 
                },
                ifFields: { show: false },
                laboratoryFields: { show: true },
                fileCreated: { show: false }
            }
        };
        
        // Get configuration for selected type
        const config = patientTypeConfig[selectedType];
        
        // Apply configuration
        applyDoctorConfig(config.doctor);
        applyCoordinatorConfig(config.coordinator);
        applyFileTypeConfig(config.fileType, config.purpose, config.gyneOption);
        applyPatientFieldsConfig(config.patientFields);
        applySpouseSectionConfig(config.spouseSection);
        applySpecialFieldsConfig(config.ifFields, config.laboratoryFields);
        applyFileCreatedConfig(config.fileCreated);
        
        // Ensure essential fields are always required
        ensureEssentialFields();
        
        // Call filterDoctors after updating UI
        filterDoctors(selectedType);
    }
    
    // Reset all fields to default state
    function resetAllFields() {
        // Reset required fields
        $('#purpose').prop('required', false);
        $('select[name="filetype"]').prop('required', false);
        
        // Hide containers
        $('#fileTypeContainer').hide();
        $('#gyneOptionContainer').hide();
    }

    // Configure doctor fields
    function applyDoctorConfig(config) {
        $('#doctorSelectionContainer').toggle(config.show);
        $('#doctor_id').prop('required', config.required);
    }

    // Configure coordinator fields
    function applyCoordinatorConfig(config) {
        $('#doctorCoordinatorContainer').toggle(config.show);
        $('#doctor_coordinator_id').prop('required', config.required);
    }

    // Configure file type and purpose fields
    function applyFileTypeConfig(fileTypeConfig, purposeConfig, gyneOptionConfig) {
        $('#fileTypeContainer').toggle(fileTypeConfig.show);
        
        // Use setTimeout to ensure DOM is updated before setting required attribute
        if (fileTypeConfig.required) {
            setTimeout(function() {
                $('select[name="filetype"]').prop('required', fileTypeConfig.required);
            }, 100);
        } else {
            $('select[name="filetype"]').prop('required', false);
        }
        
        if (purposeConfig.show) {
            $('#gyneOptionContainer').show();
            $('#purpose').prop('required', purposeConfig.required);
        } else {
            $('#gyneOptionContainer').hide();
            $('#purpose').prop('required', false);
        }
    }

    // Configure patient personal fields
    function applyPatientFieldsConfig(config) {
        // Configure CNIC field
        const cnicField = $('[for="patient_cnic"]').closest('.mb-3');
        cnicField.toggle(config.cnic.show);
        $('#patient_cnic').prop('required', config.cnic.required);
        $('#cnic-required').toggle(config.cnic.required);
        
        // Configure DOB and Address fields
        $('.gyne-hide-field').toggle(config.dob.show);
        $('.laboratory-hide-field').toggle(config.address.show);
    }

    // Configure spouse section
    function applySpouseSectionConfig(config) {
        $('.gyne-hide-section').toggle(config.show);
        $('input[name="spouse_name"]').prop('required', config.required);
        $('input[name="spouse_contact"]').prop('required', config.required);
        $('.if-required').toggle(config.required);
    }

    // Configure special fields for I/F and Laboratory
    function applySpecialFieldsConfig(ifConfig, labConfig) {
        $('.if-hide-field').toggle(ifConfig.show);
    }
    
    // Configure File Created field
    function applyFileCreatedConfig(config) {
        $('#fileCreatedContainer').toggle(config.show);
    }
    
    // Ensure essential fields are always required
    function ensureEssentialFields() {
        // Patient name and contact are always required
        $('input[name="patient_name"]').prop('required', true);
        $('input[name="patient_contact"]').prop('required', true);
    }
    
    // Remove browser validation and handle it ourselves
    $('form').attr('novalidate', 'novalidate');
    
    // Form validation
    $('form').on('submit', function(e) {
        var selectedType = $('input[name="type"]:checked').val();
        var hasError = false;
        
        // Start with basic validation for all patient types
        
        // Patient name and contact are required for all types
        if (!$('input[name="patient_name"]').val()) {
            e.preventDefault();
            alert('Patient Name is required.');
            $('input[name="patient_name"]').focus();
            return false;
        }
        
        if (!$('input[name="patient_contact"]').val()) {
            e.preventDefault();
            alert('Contact Number is required.');
            $('input[name="patient_contact"]').focus();
            return false;
        }

        // Validate contact number format
        const contactNumber = $('input[name="patient_contact"]').val();
        if (!validatePhoneNumber(contactNumber)) {
            e.preventDefault();
            alert('Contact Number must contain exactly 11 digits. Please enter a valid mobile number.');
            $('input[name="patient_contact"]').focus();
            return false;
        }
        
        // Validate spouse contact if provided
        const spouseContactNumber = $('input[name="spouse_contact"]').val();
        if (spouseContactNumber && !validatePhoneNumber(spouseContactNumber)) {
            e.preventDefault();
            alert('Spouse Contact Number must contain exactly 11 digits. Please enter a valid mobile number.');
            $('input[name="spouse_contact"]').focus();
            return false;
        }
        
        // Validate alternative contact if provided
        const alternativeContactNumber = $('input[name="alternative_contact"]').val();
        if (alternativeContactNumber && !validatePhoneNumber(alternativeContactNumber)) {
            e.preventDefault();
            alert('Alternative Contact Number must contain exactly 11 digits. Please enter a valid mobile number.');
            $('input[name="alternative_contact"]').focus();
            return false;
        }
        
        // Type-specific validation
        if (selectedType === 'Free Consultancy') {
            if (!$('#doctor_coordinator_id').val()) {
                e.preventDefault();
                alert('Please select a Coordinator');
                $('#doctor_coordinator_id').focus();
                hasError = true;
            }
        } else if (selectedType === 'Gyne') {
            if (!$('#doctor_id').val()) {
                e.preventDefault();
                alert('Please select a Doctor');
                $('#doctor_id').focus();
                hasError = true;
            }
            
            var purpose = $('#purpose').val();
            if (!purpose && $('#purpose').is(':visible') && $('#gyneOptionContainer').is(':visible')) {
                e.preventDefault();
                alert('Purpose is required for Gyne patients.');
                $('#purpose').focus();
                hasError = true;
            }
            
            var fileType = $('select[name="filetype"]').val();
            if (!fileType && $('#fileTypeContainer').is(':visible')) {
                e.preventDefault();
                alert('Type is required for Gyne patients.');
                $('select[name="filetype"]').focus();
                hasError = true;
            }
        } else if (selectedType === 'I/F') {
            if (!$('#doctor_id').val()) {
                e.preventDefault();
                alert('Please select a Doctor');
                $('#doctor_id').focus();
                hasError = true;
            }
            
            var spouseName = $('input[name="spouse_name"]').val();
            if (!spouseName && $('.gyne-hide-section').is(':visible')) {
                e.preventDefault();
                alert('Spouse Name is required for Infertility patients.');
                $('input[name="spouse_name"]').focus();
                hasError = true;
            }
            
            var spouseContact = $('input[name="spouse_contact"]').val();
            if (!spouseContact && $('.gyne-hide-section').is(':visible')) {
                e.preventDefault();
                alert('Spouse Contact is required for Infertility patients.');
                $('input[name="spouse_contact"]').focus();
                hasError = true;
            }
        } else if (selectedType === 'Regular Patient') {
            if (!$('#doctor_id').val()) {
                e.preventDefault();
                alert('Please select a Doctor');
                $('#doctor_id').focus();
                hasError = true;
            }
        }
        
        // If we already found errors, don't continue with CNIC validation
        if (hasError) {
            return false;
        }
        
        // Skip CNIC validation for Gyne, I/F, and Free Consultancy as CNIC is not required
        if (selectedType === 'Gyne' || selectedType === 'I/F' || selectedType === 'Free Consultancy' || selectedType === 'Laboratory') {
            return true;
        } else {
            // For other patient types
            var cnic = $('#patient_cnic').val();
            if (cnic) {
                // Only validate CNIC format if a value is provided
                var cnicRegex = /^\d{5}-\d{7}-\d{1}$/;
                if (!cnicRegex.test(cnic)) {
                    e.preventDefault();
                    alert('Please enter a valid CNIC number in the format: 00000-0000000-0');
                    $('#patient_cnic').focus();
                    return false;
                }
            }
            
            var spouseCnic = $('#spouse_cnic').val();
            if (spouseCnic) {
                // Only validate spouse CNIC format if a value is provided
                var cnicRegex = /^\d{5}-\d{7}-\d{1}$/;
                if (!cnicRegex.test(spouseCnic)) {
                    e.preventDefault();
                    alert('Please enter a valid spouse CNIC number in the format: 00000-0000000-0');
                    $('#spouse_cnic').focus();
                    return false;
                }
            }
        }
    });
});
</script>
@endsection
