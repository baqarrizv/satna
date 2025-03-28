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
                    <form action="{{ route('payments.addCharges') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="type" class="form-label">Charges Type</label>
                                    <select name="type" class="form-control @error('type') is-invalid @enderror" required>
                                        <option value="Appointment Charges" {{ old('type') == 'Appointment Charges' ? 'selected' : '' }}>Appointment Charges</option>
                                        <option value="Service Charges" {{ old('type') == 'Service Charges' ? 'selected' : '' }}>Service Charges</option>
                                    </select>
                                    @error('type')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">                        
                            <div class="col-md-12">
                                <div class="mb-3">                                
                                    <label for="patient" class="form-label">Patient ID/Contact #</label>
                                    <div class="d-flex align-items-center">
                                        <i id="toggle-mask-icon" class="uil-phone-alt" style="cursor: pointer; font-size: 1.3rem; margin-right: 10px; color: gray;"></i>
                                        <input type="text" id="patient" name="patient" required class="form-control @error('patient') is-invalid @enderror" value="{{ old('patient') }}" style="flex-grow: 1;">
                                    </div>
                                </div>
                                @error('patient')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-primary">Add Charges</button>
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
    let isMasked = false; // Tracks masking state

    $('#toggle-mask-icon').on('click', function() {
        const inputField = $('#patient');

        if (!isMasked) {
            // Apply mask and set icon color to primary
            inputField.inputmask('(0399) 999-9999');
            $(this).css('color', 'blue'); // Change icon color
            isMasked = true;
        } else {
            // Remove mask and reset icon color
            inputField.inputmask('remove');
            $(this).css('color', 'gray'); // Reset icon color
            isMasked = false;
        }
    });
});
</script>
@endsection
