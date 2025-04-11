@extends('layouts.master')

@section('title') Edit Doctor @endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Edit Doctor</h4>
                <a href="{{ route('doctors.index') }}" class="btn btn-secondary">Back to Doctors</a>
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
                    <form action="{{ route('doctors.update', $doctor->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <!-- Personal Information -->
                        <div class="row">
                            <h5 class="mb-5">Personal Information</h5>
                            <!-- Doctor Name -->
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Doctor Name <span class="text-danger">*</span></label>
                                    <input type="text" id="name" name="name" required class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $doctor->name) }}" autocomplete="name">
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Date of Birth -->
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="dob" class="form-label">Date of Birth</label>
                                    <input type="date" id="dob" name="dob" class="form-control @error('dob') is-invalid @enderror" value="{{ old('dob', $doctor->dob) }}" autocomplete="bday">
                                    @error('dob')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Sex -->
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="sex" class="form-label">Sex</label>
                                    <select id="sex" name="sex" class="form-control @error('sex') is-invalid @enderror" autocomplete="sex">
                                        <option value="">Select Sex</option>
                                        <option value="Male" {{ old('sex', $doctor->sex) == 'Male' ? 'selected' : '' }}>Male</option>
                                        <option value="Female" {{ old('sex', $doctor->sex) == 'Female' ? 'selected' : '' }}>Female</option>
                                    </select>
                                    @error('sex')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Marital Status -->
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="marital_status" class="form-label">Marital Status</label>
                                    <select id="marital_status" name="marital_status" class="form-control @error('marital_status') is-invalid @enderror" autocomplete="marital-status">
                                        <option value="">Select Status</option>
                                        <option value="Single" {{ old('marital_status', $doctor->marital_status) == 'Single' ? 'selected' : '' }}>Single</option>
                                        <option value="Married" {{ old('marital_status', $doctor->marital_status) == 'Married' ? 'selected' : '' }}>Married</option>
                                        <option value="Divorced" {{ old('marital_status', $doctor->marital_status) == 'Divorced' ? 'selected' : '' }}>Divorced</option>
                                    </select>
                                    @error('marital_status')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!-- Religion -->
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="religion" class="form-label">Religion</label>
                                    <input type="text" id="religion" name="religion" class="form-control @error('religion') is-invalid @enderror" value="{{ old('religion', $doctor->religion) }}" autocomplete="religion">
                                    @error('religion')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Contact Number -->
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="contact_number" class="form-label">Contact Number</label>
                                    <input type="text" id="contact_number" name="contact_number" class="phone form-control @error('contact_number') is-invalid @enderror" value="{{ old('contact_number', $doctor->contact_number) }}">
                                    @error('contact_number')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- CNIC -->
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="cnic" class="form-label">CNIC</label>
                                    <input type="text" id="cnic" name="cnic" class="form-control @error('cnic') is-invalid @enderror" value="{{ old('cnic', $doctor->cnic) }}">
                                    @error('cnic')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                            
                        <div class="row">
                            <!-- Profile Image -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="image" class="form-label">Profile Image</label>
                                    @component('common-components.dropzone', [
                                        'inputName' => 'image',
                                        'existingFiles' => $doctor->image ? [Storage::url($doctor->image)] : [],
                                        'acceptedFiles' => 'image/*',
                                        'maxFiles' => 1,
                                        'maxFileSize' => 2
                                    ]) @endcomponent
                                    @error('image')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Address -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="address" class="form-label">Address</label>
                                    <textarea name="address" class="form-control @error('address') is-invalid @enderror">{{ old('address', $doctor->address) }}</textarea>
                                    @error('address')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                       
                        <hr class="bg-dark border-2 border-top border-dark" />

                        <!-- Clinic Information -->
                        <div class="row">
                            <h5 class="mb-5">Clinic Information</h5>
                            
                            <!-- Date of Appointment -->
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="date_of_appointment" class="form-label">Date of Appointment <span class="text-danger">*</span></label>
                                    <input type="date" id="date_of_appointment" name="date_of_appointment" required class="form-control @error('date_of_appointment') is-invalid @enderror" value="{{ old('date_of_appointment', $doctor->date_of_appointment) }}">
                                    @error('date_of_appointment')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Specialist -->
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="specialist" class="form-label">Specialist <span class="text-danger">*</span></label>
                                    <input type="text" name="specialist" required class="form-control @error('specialist') is-invalid @enderror" value="{{ old('specialist', $doctor->specialist) }}">
                                    @error('specialist')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Department -->
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="department_id" class="form-label">Department <span class="text-danger">*</span></label>
                                    <select name="department_id" required class="form-control @error('department_id') is-invalid @enderror">
                                        <option value="">Select Department</option>
                                        @foreach($departments as $department)
                                            <option value="{{ $department->id }}" {{ old('department_id', $doctor->department_id) == $department->id ? 'selected' : '' }}>{{ $department->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('department_id')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Doctor Charges -->
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="doctor_charges" class="form-label">Doctor Charges <span class="text-danger">*</span></label>
                                    <input type="text" name="doctor_charges" id="doctor_charges" step="1" required class="form-control @error('doctor_charges') is-invalid @enderror" value="{{ old('doctor_charges', $doctor->doctor_charges) }}">
                                    @error('doctor_charges')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <hr class="bg-dark border-2 border-top border-dark" />

                        <!-- Emergency Contact Information -->
                        <div class="row">
                            <h5 class="mb-5">Emergency Contact Information</h5>
                            <!-- Emergency Contact Person Name -->
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="emergency_contact_name" class="form-label">Emergency Contact Name</label>
                                    <input type="text" name="emergency_contact_name" class="form-control @error('emergency_contact_name') is-invalid @enderror" value="{{ old('emergency_contact_name', $doctor->emergency_contact_name) }}">
                                    @error('emergency_contact_name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Emergency Contact Person Relation -->
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="emergency_contact_relation" class="form-label">Emergency Contact Relation</label>
                                    <input type="text" name="emergency_contact_relation" class="form-control @error('emergency_contact_relation') is-invalid @enderror" value="{{ old('emergency_contact_relation', $doctor->emergency_contact_relation) }}">
                                    @error('emergency_contact_relation')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Emergency Contact Person Number -->
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="emergency_contact_number" class="form-label">Emergency Contact Number</label>
                                    <input type="text" name="emergency_contact_number" class="phone form-control @error('emergency_contact_number') is-invalid @enderror" value="{{ old('emergency_contact_number', $doctor->emergency_contact_number) }}">
                                    @error('emergency_contact_number')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <hr class="bg-dark border-2 border-top border-dark" />

                        <!-- Payment Information -->
                        <div class="row">
                            <h5 class="mb-5">Payment Information</h5>
                            
                            <!-- Payment Mode -->
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="payment_mode" class="form-label">Payment Mode</label>
                                    <select name="payment_mode" class="form-control @error('payment_mode') is-invalid @enderror">
                                        <option value="">Select Payment Mode</option>
                                        <option value="Bank Transfer" {{ old('payment_mode', $doctor->payment_mode) == 'Bank Transfer' ? 'selected' : '' }}>Bank Transfer</option>
                                        <option value="Cash" {{ old('payment_mode', $doctor->payment_mode) == 'Cash' ? 'selected' : '' }}>Cash</option>
                                    </select>
                                    @error('payment_mode')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Account Title -->
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="account_title" class="form-label">Account Title</label>
                                    <input type="text" name="account_title" class="form-control @error('account_title') is-invalid @enderror" value="{{ old('account_title', $doctor->account_title) }}">
                                    @error('account_title')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Account Number -->
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="account_number" class="form-label">Account Number</label>
                                    <input type="text" name="account_number" class="form-control @error('account_number') is-invalid @enderror" value="{{ old('account_number', $doctor->account_number) }}">
                                    @error('account_number')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Bank Name -->
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="bank_name" class="form-label">Bank Name</label>
                                    <input type="text" name="bank_name" class="form-control @error('bank_name') is-invalid @enderror" value="{{ old('bank_name', $doctor->bank_name) }}">
                                    @error('bank_name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!-- Doctor Portion -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="doctor_portion" class="form-label">Doctor's Portion (%)</label>
                                    <input type="number" name="doctor_portion" id="doctor_portion" step="1" class="form-control @error('doctor_portion') is-invalid @enderror" value="{{ old('doctor_portion', $doctor->doctor_portion) }}">
                                    <small id="doctor_portion_amount" class="form-text text-muted"></small>
                                    @error('doctor_portion')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <!-- Clinic Portion -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="clinic_portion" class="form-label">Clinic's Portion (%)</label>
                                    <input type="number" name="clinic_portion" id="clinic_portion" step="1" class="form-control @error('clinic_portion') is-invalid @enderror" value="{{ old('clinic_portion', $doctor->clinic_portion) }}">
                                    <small id="clinic_portion_amount" class="form-text text-muted"></small>
                                    @error('clinic_portion')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Doctor Coordinator Checkbox -->
                        <div class="col-md-3">
                            <div class="mb-3 form-check mt-4">
                                <input type="checkbox" id="is_coordinator" name="is_coordinator" class="form-check-input @error('is_coordinator') is-invalid @enderror" value="1" {{ old('is_coordinator', $doctor->is_coordinator) ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_coordinator">Is Doctor Coordinator?</label>
                                @error('is_coordinator')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Active Status -->
                        <div class="col-md-3">
                            <div class="mb-3 form-check mt-4">
                                <input type="checkbox" id="is_active" name="is_active" class="form-check-input @error('is_active') is-invalid @enderror" value="1" {{ old('is_active', $doctor->is_active) ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_active">Active Status</label>
                                @error('is_active')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Update Doctor</button>
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
    // Apply input mask to CNIC field
    $('#cnic').inputmask('99999-9999999-9');

    // Apply input mask to Contact Number field with predefined 03 
    $('.phone').inputmask('(0399) 999-9999');
});

$(document).ready(function() {
    // Function to calculate and display amounts based on percentages
    function calculateAmounts() {
        let charges = parseFloat($('#doctor_charges').val()) || 0;
        let doctorPortion = parseFloat($('#doctor_portion').val()) || 0;
        let clinicPortion = 100 - doctorPortion;

        // Update clinic portion field
        $('#clinic_portion').val(clinicPortion);

        // Display amounts based on charges
        let doctorAmount = (doctorPortion / 100) * charges;
        let clinicAmount = (clinicPortion / 100) * charges;

        $('#doctor_portion_amount').text('Doctor\'s Portion: ' + doctorAmount.toFixed(2) + ' PKR');
        $('#clinic_portion_amount').text('Clinic\'s Portion: ' + clinicAmount.toFixed(2) + ' PKR');
    }

    // Function to automatically adjust the percentages and recalculate amounts
    function adjustPercentagesAndRecalculate() {
        let doctorPortion = parseFloat($('#doctor_portion').val()) || 0;
        let clinicPortion = 100 - doctorPortion;

        // Ensure clinic portion cannot be negative
        if (clinicPortion < 0) {
            clinicPortion = 0;
            $('#doctor_portion').val(100); // If doctor takes 100%, clinic gets 0%
        }

        // Set the clinic portion and calculate amounts
        $('#clinic_portion').val(clinicPortion);
        calculateAmounts();
    }

    // When doctor portion changes, update clinic portion and calculate amounts
    $('#doctor_portion').on('input', function() {
        adjustPercentagesAndRecalculate();
    });

    // When clinic portion changes, adjust doctor portion and calculate amounts
    $('#clinic_portion').on('input', function() {
        let clinicPortion = parseFloat($('#clinic_portion').val()) || 0;
        let doctorPortion = 100 - clinicPortion;

        // Ensure doctor portion cannot be negative
        if (doctorPortion < 0) {
            doctorPortion = 0;
            $('#clinic_portion').val(100); // If clinic takes 100%, doctor gets 0%
        }

        // Set the doctor portion and calculate amounts
        $('#doctor_portion').val(doctorPortion);
        calculateAmounts();
    });

    // When doctor charges change, recalculate the amounts based on the percentages
    $('#doctor_charges').on('input', function() {
        calculateAmounts();
    });

    // Initial calculation on page load
    calculateAmounts();
});
</script>
@endsection

