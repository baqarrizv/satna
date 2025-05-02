@extends('layouts.master')

@section('title') Add Charges @endsection

@section('css')
<link href="{{ URL::asset('/assets/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Add Charges</h4>
                <a href="{{ route('payments.index') }}" class="btn btn-secondary">Back to Payments</a>
            </div>
        </div>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    
    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="row justify-content-center">
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('payments.addCharges') }}">
                        @csrf
                        <div class="row mb-4">
                            <div class="col-12 mb-3">
                                <label for="type" class="form-label">Charge Type</label>
                                <select class="form-control @error('type') is-invalid @enderror" id="type" name="type" required>
                                    <option value="">Select Type</option>
                                    <option value="Appointment Charges" {{ (old('type') == 'Appointment Charges' || (isset($type) && $type == 'Appointment Charges')) ? 'selected' : '' }} {{ !isset($type) ? 'selected' : '' }}>Appointment Charges</option>
                                    <option value="Service Charges" {{ (old('type') == 'Service Charges' || (isset($type) && $type == 'Service Charges')) ? 'selected' : '' }}>Service Charges</option>
                                </select>
                                @error('type')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label for="patient" class="form-label">Patient ID or Contact Number</label>
                                <input type="text" class="form-control @error('patient') is-invalid @enderror" id="patient" name="patient" 
                                       value="{{ isset($patient) ? $patient->id : (isset($patientInput) ? $patientInput : (session('patientId') ?? old('patient'))) }}" 
                                       {{ isset($patient) ? 'readonly' : '' }} required>
                                <div class="form-text">Enter patient ID or contact number (format: (0399) 999-9999)</div>
                                @error('patient')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            
                            @if((isset($patient) && !$patient->doctor_id) || $showDoctorSelection)
                            <div class="col-12 mt-3" id="doctor-selection-container">
                                <label for="doctor_id" class="form-label">Select Doctor</label>
                                <select class="form-control doctor_id @error('doctor_id') is-invalid @enderror" id="doctor_id" name="doctor_id" required>
                                    <option value="">Select Doctor</option>
                                    @foreach($doctors as $doctor)
                                        <option value="{{ $doctor->id }}" {{ old('doctor_id') == $doctor->id ? 'selected' : '' }}>
                                            {{ $doctor->name }} ({{ $doctor->doctor_id }})
                                            @if(isset($doctor->department->name))
                                                - {{ $doctor->department->name }}
                                            @endif
                                        </option>
                                    @endforeach
                                </select>
                                <div class="form-text">
                                    @if($showDoctorSelection)
                                        Select a doctor to create a new patient record
                                    @else
                                        This patient needs a doctor assignment
                                    @endif
                                </div>
                                @error('doctor_id')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            @endif
                        </div>
                        
                        <div class="row">
                            <div class="col-12">
                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary">Continue</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ URL::asset('/assets/libs/inputmask/inputmask.min.js') }}"></script>
<script src="{{ URL::asset('/assets/libs/select2/select2.min.js') }}"></script>
<script>
$(document).ready(function() {
    let isMasked = false;

    // Initialize Select2 for doctor dropdown
    $('.doctor_id').select2({
        placeholder: 'Select a doctor',
        width: '100%'
    });

    // Check current charge type and adjust doctor selection visibility if needed
    function updateDoctorFieldVisibility() {
        if ($('#doctor-selection-container').length > 0) {
            // If we have an error message mentioning doctor assignment, always show
            if ($('.alert-danger').text().indexOf('doctor') !== -1) {
                $('#doctor-selection-container').show();
                return;
            }
            
            if($('#type').val() == 'Service Charges'){
                $('#doctor-selection-container').hide();
                $('.doctor_id').prop('required', false);
            } else {
                $('#doctor-selection-container').show();
                $('.doctor_id').prop('required', true);
            }
        }
    }
    
    // Run initially
    updateDoctorFieldVisibility();
    
    // Update when charge type changes
    $('#type').on('change', function() {
        updateDoctorFieldVisibility();
    });

    // Toggle mask for patient input
    $('#toggle-mask-icon').on('click', function() {
        const inputField = $('#patient');

        if (!isMasked) {
            inputField.inputmask('(0399) 999-9999');
            $(this).css('color', 'blue');
            isMasked = true;
        } else {
            inputField.inputmask('remove');
            $(this).css('color', 'gray');
            isMasked = false;
        }
    });
});
</script>
@endsection
