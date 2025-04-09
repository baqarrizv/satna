@extends('layouts.master')

@section('title') {{ $type }} @endsection

@section('css')
<style>
    .service-select optgroup {
        font-weight: bold;
        color: #495057;
        background-color: #f8f9fa;
        padding: 5px;
        font-size: 1rem;
    }

    .service-select option {
        padding: 5px 15px;
        color: #212529;
        background-color: #ffffff;
    }

    [data-bs-theme="dark"] .service-select optgroup {
        color: #e9ecef;
        background-color: #343a40;
        font-size: 1rem;
    }

    [data-bs-theme="dark"] .service-select option {
        color: #f8f9fa;
        background-color: #212529;
    }

    .service-select {
        width: 100%;
        padding: 8px;
        border: 1px solid #ced4da;
        border-radius: 4px;
        background-color: #fff;
    }

    [data-bs-theme="dark"] .service-select {
        background-color: #212529;
        border-color: #495057;
        color: #f8f9fa;
    }
</style>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">{{ $type }}</h4>
                <a href="{{ route('payments.addCharges') }}" class="btn btn-secondary">Back to Add Charges</a>
            </div>
        </div>
    </div>

    @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('payments.applyCharges') }}" method="POST">
                        @csrf
                        <input type="hidden" name="patient_id" value="{{ $patient->id }}">
                        <input type="hidden" name="type" value="{{ $type }}">

                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label class="form-label"><strong>Patient ID</strong></label>
                                <span>{{ $patient->id }}</span>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label"><strong>Patient Name</strong></label>
                                <span>{{ $patient->patient_name }}</span>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label"><strong>Date</strong></label>
                                <span>{{ now()->format('d-M-Y') }}</span>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label class="form-label"><strong>FC-File #</strong></label>
                                <span>{{ $patient->fc_number }} {{ $patient->file_number ?? 'N/A' }}</span>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label"><strong>Department</strong></label>
                                <span>{{ $patient->doctor->department->name ?? 'N/A' }}</span>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label"><strong>Doctor's Name</strong></label>
                                <span>{{ $patient->doctor->name ?? 'N/A' }}</span>
                            </div>
                        </div>

                        <hr class="bg-dark border-2 border-top border-dark" />

                        <div class="row mb-3">
                            <div class="col-md-6">
                                @if($type === 'Service Charges')
                                <div class="services">
                                    <div class="service-row">
                                        <div class="row mb-3">
                                            <div class="col-md-3">
                                                <label class="form-label"><strong>Department *</strong></label>
                                                <select id="department-filter-0" class="form-control department-filter" required>
                                                    <option value="">Select Department</option>
                                                    @php
                                                        $departments = collect($groupedServices)->keys()->toArray();
                                                    @endphp
                                                    @foreach($departments as $departmentName)
                                                        <option value="{{ $departmentName }}">{{ $departmentName }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label"><strong>Service Type *</strong></label>
                                                <select id="service-select-0" name="services[]" class="form-control service-select" required disabled>
                                                    <option value="">Select Department First</option>
                                                    @foreach($groupedServices as $departmentName => $services)
                                                        @foreach($services as $service)
                                                            <option value="{{ $service->id }}" data-charges="{{ $service->charges }}" data-department="{{ $departmentName }}" style="display: none;">
                                                                {{ $service->name }}
                                                            </option>
                                                        @endforeach
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="form-label"><strong>Charges</strong></label>
                                                <input type="number" name="charges[]" readonly class="form-control service-charges" value="">
                                            </div>
                                            <div class="col-md-2 d-flex align-items-end">
                                                <button type="button" class="btn btn-danger remove-row">-</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <button type="button" class="btn btn-success add-row">+</button>
                                        </div>
                                    </div>
                                </div>
                                @elseif($type === 'Appointment Charges')
                                <div class="appointment">
                                    <div class="row mb-3">
                                        <div class="col-md-5">
                                            <label class="form-label"><strong>Doctor *</strong></label>
                                            <select id="doctor_id" name="doctor_id" class="form-control" required>
                                                @foreach($doctors as $doctor)
                                                    <option value="{{ $doctor->id }}" data-charges="{{ $doctor->doctor_charges }}" {{ $patient->doctor_id == $doctor->id ? 'selected' : '' }}>
                                                        {{ $doctor->name }} ({{ $doctor->department->name }})
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-5">
                                            <label class="form-label"><strong>Appointment Charges</strong></label>
                                            <input type="number" id="doctor_charges" name="doctor_charges" readonly class="form-control" value="{{ $patient->doctor->doctor_charges }}">
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </div>

                            <div class="col-md-6">
                            <div class="col-md-12">
                                    <label for="payment_mode" class="form-label">Payment Mode *</label>
                                    <select name="payment_mode" id="payment_mode" class="form-control" required>
                                        <option value="Cash" {{ old('payment_mode') == 'Cash' ? 'selected' : '' }}>Cash</option>
                                        <option value="Card" {{ old('payment_mode') == 'Card' ? 'selected' : '' }}>Card</option>
                                        <option value="Online" {{ old('payment_mode') == 'Online' ? 'selected' : '' }}>Online</option>
                                        <option value="Pay Order" {{ old('payment_mode') == 'Pay Order' ? 'selected' : '' }}>Pay Order</option>
                                        <option value="Deposit" {{ old('payment_mode') == 'Deposit' ? 'selected' : '' }}>Deposit</option>
                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label"><strong>Discount</strong></label>
                                    <input type="number" id="discount" name="discount" class="form-control" value="0">
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label" id="total_label"><strong>Total</strong></label>
                                    <input type="number" id="total" name="total" class="form-control"
                                        value="{{ $type === 'Appointment Charges' ? $patient->doctor->doctor_charges : '' }}" readonly>
                                </div>
                                
                                <!-- Tax fields - initially hidden -->
                                <div class="col-md-12 tax-field" style="display:none;">
                                    <label class="form-label"><strong>Tax Amount (1.7%)</strong></label>
                                    <input type="number" id="tax_amount" class="form-control" readonly>
                                </div>
                                <div class="col-md-12 tax-field" style="display:none;">
                                    <label class="form-label"><strong>Total with Tax</strong></label>
                                    <input type="number" id="total_with_tax" class="form-control" readonly>
                                </div>
                                
                                <div class="col-md-12">
                                    <label for="receiver_name" class="form-label">Receive From</label>
                                    <input type="text" id="receiver_name" name="receiver_name" class="form-control" value="{{ old('receiver_name', $patient->patient_name) }}">
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label"><strong>Remarks</strong></label>
                                    <textarea name="remarks" class="form-control" rows="3"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Confirm Payment</button>
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
<script>
    $(document).ready(function() {
        // Payment mode change handler
        $('#payment_mode').on('change', function() {
            const paymentMode = $(this).val();
            
            if (paymentMode === 'Card' && parseFloat($('#total').val()) >= 50000) {
                // Show tax fields and update labels
                $('.tax-field').show();
                $('#total_label').html('<strong>Subtotal</strong>');
                
                // Calculate tax
                calculateTaxAndTotal();
            } else {
                // Hide tax fields and reset labels
                $('.tax-field').hide();
                $('#total_label').html('<strong>Total</strong>');
            }
        });

        // Trigger change event if Card is already selected
        if ($('#payment_mode').val() === 'Card' && parseFloat($('#total').val()) >= 50000) {
            $('#payment_mode').trigger('change');
        }
        
        // Function to calculate tax and total with tax
        function calculateTaxAndTotal() {
            const subtotal = parseFloat($('#total').val()) || 0;
            const taxPercent = 1.7;

            // Calculate original tax
            const rawTaxAmount = subtotal * taxPercent / 100;

            // Apply custom rounding to tax amount
            const taxAmount = (rawTaxAmount % 1 >= 0.5)
                ? Math.ceil(rawTaxAmount)
                : Math.floor(rawTaxAmount);

            const totalWithTax = subtotal + taxAmount;

            $('#tax_amount').val(taxAmount.toFixed(2));
            $('#total_with_tax').val(totalWithTax.toFixed(2));
        }

        // Recalculate tax when subtotal changes
        $('#total').on('change', function() {
            if ($('#payment_mode').val() === 'Card' && parseFloat($('#total').val()) >= 50000) {
                calculateTaxAndTotal();
            }
        });

        // Department filter change handler
        $(document).on('change', '.department-filter', function() {
            const selectedDepartment = $(this).val();
            const serviceSelect = $(this).closest('.service-row').find('.service-select');
            
            // Reset service selection
            serviceSelect.val('');
            
            if (selectedDepartment) {
                // Show only options from the selected department
                serviceSelect.prop('disabled', false);
                serviceSelect.find('option').hide();
                serviceSelect.find('option:first').text('Select Service').show();
                serviceSelect.find('option[data-department="' + selectedDepartment + '"]').show();
            } else {
                // If no department selected, disable service select
                serviceSelect.prop('disabled', true);
                serviceSelect.find('option').hide();
                serviceSelect.find('option:first').text('Select Department First').show();
            }
        });

        // Service selection change handler
        $(document).on('change', '.service-select', function() {
            $('.services').find('.text-danger').remove();
            const selectedOption = $(this).find('option:selected');
            const charges = selectedOption.data('charges');
            $(this).closest('.service-row').find('.service-charges').val(charges);

            const selectedValue = $(this).val();
            let duplicateFound = false;
            $('.service-select').not(this).each(function() {
                if ($(this).val() === selectedValue && selectedValue !== '') {
                    duplicateFound = true;
                }
            });

            if (duplicateFound) {
                const errorMsg = '<div class="text-danger">This service has already been added!</div>';
                $(this).val('');
                $(this).closest('.service-row').find('.service-charges').val('');
                $(this).closest('.service-row').after(errorMsg);
            }

            calculateTotal();
        });

        // Doctor selection change handler for appointment charges
        $(document).on('change', '#doctor_id', function() {
            const selectedOption = $(this).find('option:selected');
            const charges = selectedOption.data('charges');
            $('#doctor_charges').val(charges);
            calculateTotal();
        });

        // Calculate total function
        function calculateTotal() {
            let total = 0;
            const $type = "{{ $type }}";
            if ($type === 'Service Charges') {
                $('.service-charges').each(function() {
                    const charge = parseFloat($(this).val()) || 0;
                    total += charge;
                });
            } else if ($type === 'Appointment Charges') {
                total = parseFloat($('#doctor_charges').val()) || 0;
            }

            const discount = parseFloat($('#discount').val()) || 0;
            const discountedTotal = total - discount;
            $('#total').val(discountedTotal > 0 ? discountedTotal : 0);
            
            // If Card payment, recalculate tax
            if ($('#payment_mode').val() === 'Card' && parseFloat($('#total').val()) >= 50000) {
                calculateTaxAndTotal();
            }
        }

        // Add new row button handler
        $('.add-row').on('click', function() {
            // Remove any error messages
            $('.services').find('.text-danger').remove();

            // Clone the first row
            const firstRow = $('.service-row').first();
            const newRow = firstRow.clone();

            // Create a unique ID for the new elements
            const rowCount = $('.service-row').length;
            const newDepartmentFilterId = 'department-filter-' + rowCount;
            const newServiceSelectId = 'service-select-' + rowCount;
            
            // Update IDs in the new row
            newRow.find('.department-filter').attr('id', newDepartmentFilterId);
            newRow.find('.service-select').attr('id', newServiceSelectId);
            
            // Reset the form fields
            newRow.find('.department-filter').val('');
            newRow.find('.service-select').val('');
            newRow.find('.service-charges').val('');

            // Add the new row to the DOM
            $('.service-row').last().after(newRow);

            // Enable all remove buttons
            $('.remove-row').prop('disabled', false);
        });

        // Remove row button handler
        $(document).on('click', '.remove-row', function() {
            if ($('.service-row').length > 1) {
                $(this).closest('.service-row').remove();
            }

            calculateTotal();

            if ($('.service-row').length === 1) {
                $('.remove-row').prop('disabled', true);
            }
        });

        // Initial button state
        if ($('.service-row').length === 1) {
            $('.remove-row').prop('disabled', true);
        }

        // Initial total calculation
        calculateTotal();

        // Discount input handler
        $(document).on('input', '#discount', function() {
            calculateTotal();
        });
    });
</script>
@endsection