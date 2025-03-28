@extends('layouts.master')

@section('title') Create Patient @endsection

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
                            <!-- Patient Type Checkbox -->
                            <div class="col-md-4">
                                <div class="mb-4 form-check">
                                    <!-- Hidden input for default "Regular Patient" -->
                                    <input type="hidden" name="type" value="Regular Patient">

                                    <!-- Checkbox for "Free Consultancy" -->
                                    <input type="checkbox" id="patientTypeToggle" name="type" class="form-check-input" value="Free Consultancy" checked>
                                    <label class="form-check-label" for="patientTypeToggle">Free Consultancy</label>
                                    
                                    @error('type')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="doctor_coordinator_id" class="form-label">Doctor's Coordinator</label>
                                    <select name="doctor_coordinator_id" class="form-control @error('doctor_coordinator_id') is-invalid @enderror">
                                        <option value="">Select Doctor</option>
                                        @foreach($doctors as $doctor)
                                            <option value="{{ $doctor->id }}" {{ old('doctor_coordinator_id') == $doctor->id ? 'selected' : '' }}>{{ $doctor->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('doctor_coordinator_id')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4" id="conditionalFields" style="display: none;">
                                <div class="mb-3">
                                    <label for="doctor_id" class="form-label">Doctor</label>
                                    <select name="doctor_id" class="form-control @error('doctor_id') is-invalid @enderror">
                                        <option value="">Select Doctor</option>
                                        @foreach($doctors as $doctor)
                                            <option value="{{ $doctor->id }}" {{ old('doctor_id') == $doctor->id ? 'selected' : '' }}>{{ $doctor->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('doctor_id')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <hr class="bg-dark border-2 border-top border-dark" />

                        <!-- Personal Information -->
                        <div class="row">
                            <h5 class="mb-4">Personal Information</h5>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="patient_name" class="form-label">Patient Name</label>
                                    <input type="text" name="patient_name" required class="form-control @error('patient_name') is-invalid @enderror" value="{{ old('patient_name') }}">
                                    @error('patient_name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="patient_dob" class="form-label">Date of Birth</label>
                                    <input type="date" name="patient_dob" required class="form-control @error('patient_dob') is-invalid @enderror" value="{{ old('patient_dob') }}">
                                    @error('patient_dob')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="patient_cnic" class="form-label">CNIC</label>
                                    <input type="text" id="patient_cnic" name="patient_cnic" required class="form-control @error('patient_cnic') is-invalid @enderror" value="{{ old('patient_cnic') }}">
                                    @error('patient_cnic')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="patient_contact" class="form-label">Contact Number</label>
                                    <input type="text" id="patient_contact" name="patient_contact" class="form-control @error('patient_contact') is-invalid @enderror" value="{{ old('patient_contact') }}">
                                    @error('patient_contact')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="patient_occupation" class="form-label">Occupation</label>
                                    <input type="text" name="patient_occupation" class="form-control @error('patient_occupation') is-invalid @enderror" value="{{ old('patient_occupation') }}">
                                    @error('patient_occupation')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="patient_address" class="form-label">Address</label>
                                    <textarea name="patient_address" class="form-control @error('patient_address') is-invalid @enderror">{{ old('patient_address') }}</textarea>
                                    @error('patient_address')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <hr class="bg-dark border-2 border-top border-dark" />

                        <!-- Spouse Information -->
                        <div class="row">
                            <h5 class="mb-4">Spouse Information</h5>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="spouse_name" class="form-label">Spouse Name</label>
                                    <input type="text" name="spouse_name" class="form-control @error('spouse_name') is-invalid @enderror" value="{{ old('spouse_name') }}">
                                    @error('spouse_name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="spouse_dob" class="form-label">Date of Birth</label>
                                    <input type="date" name="spouse_dob" class="form-control @error('spouse_dob') is-invalid @enderror" value="{{ old('spouse_dob') }}">
                                    @error('spouse_dob')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="spouse_cnic" class="form-label">CNIC</label>
                                    <input type="text" id="spouse_cnic" name="spouse_cnic" class="form-control @error('spouse_cnic') is-invalid @enderror" value="{{ old('spouse_cnic') }}">
                                    @error('spouse_cnic')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                         
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="spouse_contact" class="form-label">Contact Number</label>
                                    <input type="text" id="spouse_contact" name="spouse_contact" class="form-control @error('spouse_contact') is-invalid @enderror" value="{{ old('spouse_contact') }}">
                                    @error('spouse_contact')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="spouse_occupation" class="form-label">Occupation</label>
                                    <input type="text" name="spouse_occupation" class="form-control @error('spouse_occupation') is-invalid @enderror" value="{{ old('spouse_occupation') }}">
                                    @error('spouse_occupation')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="spouse_address" class="form-label">Address</label>
                                    <textarea name="spouse_address" class="form-control @error('spouse_address') is-invalid @enderror">{{ old('spouse_address') }}</textarea>
                                    @error('spouse_address')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <hr class="bg-dark border-2 border-top border-dark" />

                        <!-- Emergency Contact Information -->
                        <div class="row">
                            <h5 class="mb-4">Emergency Contact</h5>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="emergency_contact_person" class="form-label">Emergency Contact Person</label>
                                    <input type="text" name="emergency_contact_person" required class="form-control @error('emergency_contact_person') is-invalid @enderror" value="{{ old('emergency_contact_person') }}">
                                    @error('emergency_contact_person')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="emergency_contact_relation" class="form-label">Relation</label>
                                    <input type="text" name="emergency_contact_relation" required class="form-control @error('emergency_contact_relation') is-invalid @enderror" value="{{ old('emergency_contact_relation') }}">
                                    @error('emergency_contact_relation')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="emergency_contact_number" class="form-label">Contact Number</label>
                                    <input type="text" id="emergency_contact_number" name="emergency_contact_number" required class="form-control @error('emergency_contact_number') is-invalid @enderror" value="{{ old('emergency_contact_number') }}">
                                    @error('emergency_contact_number')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Additional sections as in the original form... -->
                        <hr class="bg-dark border-2 border-top border-dark" />

                        <!-- How Did You Know & Note Section -->
                        <div class="row">
                            <h5 class="mb-4">Additional Information</h5>
                            <!-- How Did You Know -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="how_did_you_know" class="form-label">How Did You Know?</label>
                                    <select name="how_did_you_know" class="form-control @error('how_did_you_know') is-invalid @enderror">
                                        <option value="">Select an option</option>
                                        <option value="Internet" {{ old('how_did_you_know') == 'Internet' ? 'selected' : '' }}>Internet</option>
                                        <option value="Social Media" {{ old('how_did_you_know') == 'Social Media' ? 'selected' : '' }}>Social Media</option>
                                        <option value="Referral" {{ old('how_did_you_know') == 'Referral' ? 'selected' : '' }}>Referral</option>
                                        <option value="Advertisement" {{ old('how_did_you_know') == 'Advertisement' ? 'selected' : '' }}>Advertisement</option>
                                        <option value="Other" {{ old('how_did_you_know') == 'Other' ? 'selected' : '' }}>Other</option>
                                    </select>
                                    @error('how_did_you_know')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Note -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="note" class="form-label">Note</label>
                                    <textarea name="note" class="form-control @error('note') is-invalid @enderror">{{ old('note') }}</textarea>
                                    @error('note')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
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

@section('scripts')
<script src="{{ URL::asset('/assets/libs/inputmask/inputmask.min.js') }}"></script>
<script>
$(document).ready(function(){
    // Apply input mask to CNIC and contact fields
    $('#patient_cnic, #spouse_cnic').inputmask('99999-9999999-9');
    $('#patient_contact, #spouse_contact, #emergency_contact_number').inputmask('(0399) 999-9999');

    // Toggle visibility of conditional fields based on checkbox state
    $('#patientTypeToggle').change(function() {
        if ($(this).is(':checked')) {
            $('#conditionalFields').hide();
        } else {
            $('#conditionalFields').show();
        }
    }).trigger('change'); // Trigger change on page load to set initial state
});
</script>
@endsection
