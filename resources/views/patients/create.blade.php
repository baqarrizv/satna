@extends('layouts.master')

@section('title') Create Patient @endsection

@section('css')
<!-- No additional CSS needed -->
<link href="{{ URL::asset('/assets/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Create New Patient</h4>
                <a href="{{ route('patients.index') }}" class="btn btn-secondary">Back to Patients</a>
            </div>
        </div>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('patients.store') }}" method="POST">
                        @csrf

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
                                                {{ old('doctor_coordinator_id') == $coordinator->id ? 'selected' : '' }}>
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
                            <div class="col-md-4" id="doctorSelectionContainer" style="display: none;">
                                <div class="mb-3">
                                    <label for="doctor_id" class="form-label">Doctor <span class="text-danger">*</span></label>
                                    <select name="doctor_id" class="form-control @error('doctor_id') is-invalid @enderror select2" id="doctor_id">
                                        <option value="">Select Doctor</option>
                                        @foreach($doctors as $doctor)
                                            <option value="{{ $doctor->id }}" 
                                                data-department="{{ $doctor->department->name ?? '' }}"
                                                class="doctor-option all-doctors {{ $doctor->department ? strtolower($doctor->department->name) . '-doctors' : '' }}"
                                                {{ old('doctor_id') == $doctor->id ? 'selected' : '' }}>
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
                                        <option value="Gyne">Gyne</option>
                                        <option value="A/N">A/N</option>
                                        <option value="P/N">P/N</option>
                                        <option value="Ultrasound">Ultrasound</option>
                                        <option value="Blood Test">Blood Test</option>
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
                                    <input type="text" name="patient_name" class="form-control @error('patient_name') is-invalid @enderror" value="{{ old('patient_name') }}" required>
                                    @error('patient_name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="patient_contact" class="form-label">Contact Number <span class="text-danger">*</span></label>
                                    <input type="text" id="patient_contact" name="patient_contact" class="form-control @error('patient_contact') is-invalid @enderror" value="{{ old('patient_contact') }}" required>
                                    @error('patient_contact')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3 gyne-hide-field">
                                    <label for="patient_dob" class="form-label">Date of Birth</label>
                                    <input type="date" name="patient_dob" class="form-control" value="{{ old('patient_dob') }}">
                                </div>
                            </div>
                          
                            <div class="col-md-8">
                                <div class="mb-3 gyne-hide-field laboratory-hide-field">
                                    <label for="patient_address" class="form-label">Address</label>
                                    <textarea name="patient_address" class="form-control" rows="3">{{ old('patient_address') }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3 laboratory-hide-field">
                                    <label for="patient_cnic" class="form-label">CNIC <span id="cnic-required" class="text-danger" style="display: none;">*</span></label>
                                    <input type="text" id="patient_cnic" name="patient_cnic" class="form-control @error('patient_cnic') is-invalid @enderror" value="{{ old('patient_cnic') }}">
                                    @error('patient_cnic')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
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
@endsection

@section('script')
<!-- We're removing the duplicate jQuery loading since it's already in vendor-scripts -->
{{-- <script src="{{ URL::asset('/assets/libs/jquery/jquery.min.js') }}"></script> --}}
<script src="{{ URL::asset('/assets/libs/inputmask/inputmask.min.js') }}"></script>
{{-- <script src="{{ URL::asset('/assets/libs/select2/select2.min.js') }}"></script> --}}
<script>
$(document).ready(function(){
    // Initialize Select2
    $('.select2').select2({
        width: '100%',
        placeholder: 'Select an option'
    });

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
    
    // Remove browser validation and handle it ourselves
    $('form').attr('novalidate', 'novalidate');
    
    // Update hideandshow function to explicitly show/hide containers
    function hideandshow(selectedType){
        // Reset all required fields and visibility first to avoid validation issues when switching types
        $('#purpose').prop('required', false);
        $('select[name="filetype"]').prop('required', false);
        $('#fileTypeContainer').hide();
        $('#gyneOptionContainer').hide();
        
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
            // Add timeout to ensure the DOM is updated before setting required
            setTimeout(function() {
                $('select[name="filetype"]').prop('required', true);
            }, 100);
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
    
    // Update the validation for the form submit
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
            
            var fileType = $('select[name="filetype"]').val();
           
        } else if (selectedType === 'Regular Patient') {
            if (!$('#doctor_id').val()) {
                e.preventDefault();
                alert('Please select a Doctor');
                $('#doctor_id').focus();
                hasError = true;
            }
        }
        
        if (hasError) {
            return false;
        }
        
        // CNIC validation
        var cnic = $('#patient_cnic').val();
        if (cnic && cnic.trim() !== '') {
            var cnicRegex = /^\d{5}-\d{7}-\d{1}$/;
            if (!cnicRegex.test(cnic)) {
                e.preventDefault();
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
                alert('Please enter a valid spouse CNIC number in the format: 00000-0000000-0');
                $('#spouse_cnic').focus();
                return false;
            }
        }
        return true;
    });

    // Function to filter doctors based on department
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
        
        // Reset selections
        doctorSelect.val('');
        
        // Hide all options first
        doctorSelect.find('option').hide();
        coordinatorSelect.find('option').hide();
        
        // Always show the "Select Doctor/Coordinator" option
        doctorSelect.find('option:first').show();
        coordinatorSelect.find('option:first').show();

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
        
        // Handle no doctors available message
        if (visibleDoctorOptions === 0 && patientType !== 'Free Consultancy' && patientType !== 'Laboratory') {
            // Remove any existing no doctors message
            doctorSelect.find('.no-doctors-message').remove();
            
            // Add a disabled option for "No doctors available" message
            doctorSelect.find('option:first').after('<option class="no-doctors-message" disabled>No doctors available for this patient type</option>');
            
            // Make sure this option is visible
            doctorSelect.find('.no-doctors-message').show();
        } else {
            // Remove any existing no doctors message
            doctorSelect.find('.no-doctors-message').remove();
        }
        
        // Handle no coordinators available message
        if (visibleCoordinatorOptions === 0 && patientType === 'Free Consultancy') {
            // Remove any existing no coordinators message
            coordinatorSelect.find('.no-coordinators-message').remove();
            
            // Add a disabled option for "No coordinators available" message
            coordinatorSelect.find('option:first').after('<option class="no-coordinators-message" disabled>No coordinators available for this patient type</option>');
            
            // Make sure this option is visible
            coordinatorSelect.find('.no-coordinators-message').show();
        } else {
            // Remove any existing no coordinators message
            coordinatorSelect.find('.no-coordinators-message').remove();
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
});
</script>
@endsection

