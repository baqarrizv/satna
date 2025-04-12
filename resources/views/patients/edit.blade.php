@extends('layouts.master')

@section('title') Edit Patient @endsection

@section('css')
<!-- No additional CSS needed -->
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
                                    <select class="form-control @error('doctor_coordinator_id') is-invalid @enderror" id="doctor_coordinator_id" name="doctor_coordinator_id" required>
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
                                    <select name="doctor_id" class="form-control @error('doctor_id') is-invalid @enderror" id="doctor_id">
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
<script src="{{ URL::asset('/assets/libs/inputmask/inputmask.min.js') }}"></script>
<script>
$(document).ready(function(){
    // Initialize input masks
    $('#patient_cnic').inputmask('99999-9999999-9');
    $('#spouse_cnic').inputmask('99999-9999999-9');
    $('#patient_contact, #spouse_contact, #alternative_contact').inputmask('(0399) 999-9999');

    // Initialize the filter for the current patient type
    var initialType = $('input[name="type"]:checked').val();
    if (initialType) {
        filterDoctors(initialType);
        hideandshow(initialType);
    } else {
        // Default to Regular Patient if somehow no radio button is checked
        $('input[name="type"][value="Regular Patient"]').prop('checked', true);
        filterDoctors('Regular Patient');
        hideandshow('Regular Patient');
    }
    
    // Handle patient type change
    $('input[name="type"]').change(function() {
        var selectedType = $(this).val();
        hideandshow(selectedType);
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
            // For Laboratory patients, show all doctors
            doctorSelect.find('.doctor-option').hide();
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
            if (!$('#doctor_id').val()) {
                e.preventDefault();
                alert('Please select a Doctor');
                $('#doctor_id').focus();
                hasError = true;
            }
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
        } else if (selectedType === 'Laboratory') {
            $('#doctorSelectionContainer').hide();
            $('#doctorCoordinatorContainer').hide();
            $('#fileTypeContainer').hide();
            $('#gyneOptionContainer').hide();
            // Update required attributes for doctor fields - make not required for Laboratory
            $('#doctor_id').prop('required', false);
            $('#doctor_coordinator_id').prop('required', false);
            
            // Show only these fields for Laboratory
            $('input[name="patient_name"]').closest('.col-md-4').show();
            $('input[name="patient_contact"]').closest('.col-md-4').show();
            $('input[name="patient_dob"]').closest('.col-md-4').show();
            $('#alternative_contact').closest('.col-md-4').show();
            
            // Hide other personal information fields
            $('[for="patient_cnic"]').closest('.mb-3').hide();
            $('[for="patient_address"]').closest('.mb-3').hide();
            
            // Show alternative contact field for Laboratory
            $('.if-hide-field').show();
            
            // Hide spouse section
            $('.gyne-hide-section').hide();
            
            // Set spouse fields as not required
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
            // Show CNIC fields for I/F (fixing inconsistency with create page)
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
        }
    }
    
    // Form validation
    $('form').on('submit', function(e) {
        var selectedType = $('input[name="type"]:checked').val();
        var hasError = false;
        
        // Validate required fields based on patient type
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
            if (!purpose) {
                e.preventDefault();
                alert('Purpose is required for Gyne patients.');
                $('#purpose').focus();
                hasError = true;
            }
            
            var fileType = $('select[name="filetype"]').val();
            if (!fileType) {
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
            if (!spouseName) {
                e.preventDefault();
                alert('Spouse Name is required for Infertility patients.');
                $('input[name="spouse_name"]').focus();
                hasError = true;
            }
            
            var spouseContact = $('input[name="spouse_contact"]').val();
            if (!spouseContact) {
                e.preventDefault();
                alert('Spouse Contact is required for Infertility patients.');
                $('input[name="spouse_contact"]').focus();
                hasError = true;
            }
            
            var fileType = $('select[name="filetype"]').val();
            if (!fileType) {
                e.preventDefault();
                alert('Type is required for Infertility patients.');
                $('select[name="filetype"]').focus();
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
