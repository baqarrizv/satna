@extends('layouts.master')

@section('title') Create Doctor @endsection
<link rel="stylesheet" href="{{ URL::asset('/assets/libs/flatpickr/flatpickr.min.css') }}">
<!-- JS -->
<script src="{{ URL::asset('/assets/libs/flatpickr/flatpickr.min.js') }}"></script>
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Create New Doctor</h4>
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
                    <form action="{{ route('doctors.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <!-- Personal Information -->
                        <div class="row">
                            <h5 class="mb-5">Personal Information</h5>
                            <!-- Doctor Name -->
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Doctor Name <span class="text-danger">*</span></label>
                                    <input type="text" id="name" name="name" required class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" autocomplete="name">
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Date of Birth -->
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="dob" class="form-label">Date of Birth</label>
                                    <input type="text" id="dob" name="dob" class="form-control @error('dob') is-invalid @enderror" value="{{ old('dob') }}" autocomplete="bday">
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
                                        <option value="Male" {{ old('sex') == 'Male' ? 'selected' : '' }}>Male</option>
                                        <option value="Female" {{ old('sex') == 'Female' ? 'selected' : '' }}>Female</option>
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
                                        <option value="Single" {{ old('marital_status') == 'Single' ? 'selected' : '' }}>Single</option>
                                        <option value="Married" {{ old('marital_status') == 'Married' ? 'selected' : '' }}>Married</option>
                                        <option value="Divorced" {{ old('marital_status') == 'Divorced' ? 'selected' : '' }}>Divorced</option>
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
                                    <input type="text" id="religion" name="religion" class="form-control @error('religion') is-invalid @enderror" value="{{ old('religion') }}" autocomplete="religion">
                                    @error('religion')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Contact Number -->
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="contact_number" class="form-label">Contact Number</label>
                                    <input type="text" id="contact_number" name="contact_number" class="phone form-control @error('contact_number') is-invalid @enderror" value="{{ old('contact_number') }}">
                                    @error('contact_number')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- CNIC -->
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="cnic" class="form-label">CNIC</label>
                                    <input type="text" id="cnic" name="cnic" class="form-control @error('cnic') is-invalid @enderror" value="{{ old('cnic') }}">
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
                                        'existingFiles' => [],
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
                                    <textarea id="address" name="address" class="form-control @error('address') is-invalid @enderror" autocomplete="street-address">{{ old('address') }}</textarea>
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
                                    <input type="text" id="date_of_appointment" name="date_of_appointment" required class="form-control @error('date_of_appointment') is-invalid @enderror" value="{{ old('date_of_appointment') }}">
                                    @error('date_of_appointment')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Specialist -->
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="specialist" class="form-label">Specialist <span class="text-danger">*</span></label>
                                    <input type="text" id="specialist" name="specialist" required class="form-control @error('specialist') is-invalid @enderror" value="{{ old('specialist') }}">
                                    @error('specialist')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Department -->
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="department_id" class="form-label">Department <span class="text-danger">*</span></label>
                                    <select id="department_id" name="department_id" required class="form-control @error('department_id') is-invalid @enderror">
                                        <option value="">Select Department</option>
                                        @foreach($departments as $department)
                                            <option value="{{ $department->id }}" {{ old('department_id') == $department->id ? 'selected' : '' }}>{{ $department->name }}</option>
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
                                    <input type="number" name="doctor_charges" id="doctor_charges" step="1" required class="form-control @error('doctor_charges') is-invalid @enderror" value="{{ old('doctor_charges') }}" max="9999999" oninput="limitDigits(this, 7)">
                                    <!-- <small class="text-muted">Maximum 7 digits allowed</small> -->
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
                                    <input type="text" id="emergency_contact_name" name="emergency_contact_name" class="form-control @error('emergency_contact_name') is-invalid @enderror" value="{{ old('emergency_contact_name') }}">
                                    @error('emergency_contact_name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Emergency Contact Person Relation -->
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="emergency_contact_relation" class="form-label">Emergency Contact Relation</label>
                                    <input type="text" id="emergency_contact_relation" name="emergency_contact_relation" class="form-control @error('emergency_contact_relation') is-invalid @enderror" value="{{ old('emergency_contact_relation') }}">
                                    @error('emergency_contact_relation')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Emergency Contact Person Number -->
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="emergency_contact_number" class="form-label">Emergency Contact Number</label>
                                    <input type="text" id="emergency_contact_number" name="emergency_contact_number" class="phone form-control @error('emergency_contact_number') is-invalid @enderror" value="{{ old('emergency_contact_number') }}">
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
                                    <select id="payment_mode" name="payment_mode" class="form-control @error('payment_mode') is-invalid @enderror">
                                        <option value="">Select Payment Mode</option>
                                        <option value="Cash" {{ old('payment_mode') == 'Cash' ? 'selected' : '' }}>Cash</option>
                                        <option value="Bank" {{ old('payment_mode') == 'Bank' ? 'selected' : '' }}>Bank</option>
                                    </select>
                                    @error('payment_mode')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Bank Information for Bank Payment Mode -->
                            <div class="col-md-3 bank-info" style="display: none;">
                                <div class="mb-3">
                                    <label for="bank_name" class="form-label">Bank Name</label>
                                    <input type="text" id="bank_name" name="bank_name" class="form-control @error('bank_name') is-invalid @enderror" value="{{ old('bank_name') }}">
                                    @error('bank_name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-3 bank-info" style="display: none;">
                                <div class="mb-3">
                                    <label for="account_title" class="form-label">Account Title</label>
                                    <input type="text" id="account_title" name="account_title" class="form-control @error('account_title') is-invalid @enderror" value="{{ old('account_title') }}">
                                    @error('account_title')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-3 bank-info" style="display: none;">
                                <div class="mb-3">
                                    <label for="account_number" class="form-label">Account Number</label>
                                    <input type="text" id="account_number" name="account_number" class="form-control @error('account_number') is-invalid @enderror" value="{{ old('account_number') }}">
                                    @error('account_number')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Doctor Coordinator Checkbox -->
                            <div class="col-md-3">
                                <div class="mb-3 form-check mt-4">
                                    <input type="checkbox" id="is_coordinator" name="is_coordinator" class="form-check-input @error('is_coordinator') is-invalid @enderror" value="1" {{ old('is_coordinator') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_coordinator">Is Doctor Coordinator?</label>
                                    @error('is_coordinator')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Doctor ID and Charge Division -->
                        <div class="row">                            
                            <!-- <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="doctor_id" class="form-label">Doctor ID</label>
                                    <input type="text" id="doctor_id" name="doctor_id" class="form-control @error('doctor_id') is-invalid @enderror" value="{{ old('doctor_id') }}">
                                    @error('doctor_id')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div> -->

                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="doctor_portion" class="form-label">Doctor Portion (%)</label>
                                    <input type="number" id="doctor_portion" name="doctor_portion" step="1" class="form-control @error('doctor_portion') is-invalid @enderror" value="{{ old('doctor_portion') }}">
                                    <small id="doctor_portion_amount" class="form-text text-muted"></small>
                                    @error('doctor_portion')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="clinic_portion" class="form-label">Clinic Portion (%)</label>
                                    <input type="number" id="clinic_portion" name="clinic_portion" step="1" class="form-control @error('clinic_portion') is-invalid @enderror" value="{{ old('clinic_portion') }}">
                                    <small id="clinic_portion_amount" class="form-text text-muted"></small>
                                    @error('clinic_portion')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="mb-3 form-check mt-4">
                                    <input type="checkbox" id="is_active" name="is_active" class="form-check-input @error('is_active') is-invalid @enderror" value="1" {{ old('is_active', '1') == '1' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_active">Active Status</label>
                                    @error('is_active')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-center mt-4">
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary w-100">Create Doctor</button>
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
    // Initialize input masks
    $('#cnic').inputmask('99999-9999999-9');
    $('.phone').inputmask('(0399) 999-9999');
    
    // Handle payment mode change
    $('#payment_mode').change(function() {
        if($(this).val() === 'Bank') {
            $('.bank-info').show();
        } else {
            $('.bank-info').hide();
        }
    });
    
    // Trigger change to set initial state
    $('#payment_mode').trigger('change');
    
    // Calculate doctor and clinic portions
    function calculatePortions() {
        var doctorCharges = $('#doctor_charges').val() || 0;
        var doctorPortion = parseFloat($('#doctor_portion').val()) || 0;
        var clinicPortion = parseFloat($('#clinic_portion').val()) || 0;
        
        // Calculate actual amounts
        var doctorAmount = (doctorCharges * doctorPortion / 100).toFixed(2);
        var clinicAmount = (doctorCharges * clinicPortion / 100).toFixed(2);
        
        // Update display
        $('#doctor_portion_amount').text('Amount: Rs. ' + doctorAmount);
        $('#clinic_portion_amount').text('Amount: Rs. ' + clinicAmount);
    }
    
    // When doctor portion changes, update clinic portion
    $('#doctor_portion').on('input', function() {
        var doctorPortion = parseFloat($(this).val()) || 0;
        if (doctorPortion > 100) {
            $(this).val(100);
            doctorPortion = 100;
        }
        $('#clinic_portion').val((100 - doctorPortion).toFixed(0));
        calculatePortions();
    });
    
    // When clinic portion changes, update doctor portion
    $('#clinic_portion').on('input', function() {
        var clinicPortion = parseFloat($(this).val()) || 0;
        if (clinicPortion > 100) {
            $(this).val(100);
            clinicPortion = 100;
        }
        $('#doctor_portion').val((100 - clinicPortion).toFixed(0));
        calculatePortions();
    });
    
    // Doctor charges still updates both calculations
    $('#doctor_charges').on('input', calculatePortions);
    
    // Initial calculation
    calculatePortions();
});

// Function to limit the number of digits that can be entered
function limitDigits(input, maxDigits) {
    if (input.value.length > maxDigits) {
        input.value = input.value.slice(0, maxDigits);
    }
}
flatpickr("#dob", {
    dateFormat: "d/m/Y",  // This gives you dd/mm/yyyy
    defaultDate: "{{ old('dob') }}"
});

flatpickr("#date_of_appointment", {
    dateFormat: "d/m/Y",  // This gives you dd/mm/yyyy
    defaultDate: "{{ old('date_of_appointment') }}"
});
</script>
@endsection
