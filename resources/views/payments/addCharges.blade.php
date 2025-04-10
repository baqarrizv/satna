@extends('layouts.master')

@section('title') Add Charges @endsection

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
                                    <option value="Appointment Charges" {{ old('type') == 'Appointment Charges' ? 'selected' : '' }} selected>Appointment Charges</option>
                                    <option value="Service Charges" {{ old('type') == 'Service Charges' ? 'selected' : '' }}>Service Charges</option>
                                </select>
                                @error('type')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label for="patient" class="form-label">Patient ID or Contact Number</label>
                                <input type="text" class="form-control @error('patient') is-invalid @enderror" id="patient" name="patient" 
                                       value="{{ isset($patient) ? $patient->id : (session('patientId') ?? old('patient')) }}" 
                                       {{ isset($patient) ? 'readonly' : '' }} required>
                                <div class="form-text">Enter patient ID or contact number (format: (0399) 999-9999)</div>
                                @error('patient')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
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
<script>
$(document).ready(function() {
    let isMasked = false;

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
