@extends('layouts.master')

@section('title') {{ $type }} @endsection

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <style>
        .service-select optgroup {
            font-weight: bold;
            color: #495057;
            background-color: #f8f9fa;
            padding: 5px;
            font-size: 1rem;
        }

        .service-select optgroup[label] {
            color: #495057;
            font-weight: bold;
            padding: 8px 5px;
            background-color: #e9ecef;
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

        [data-bs-theme="dark"] .service-select optgroup[label] {
            color: #e9ecef;
            font-weight: bold;
            padding: 8px 5px;
            background-color: #495057;
        }

        [data-bs-theme="dark"] .service-select option {
            color: #f8f9fa;
            background-color: #212529;
        }

        .service-select option:hover {
            background-color: #e9ecef;
        }

        [data-bs-theme="dark"] .service-select option:hover {
            background-color: #495057;
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

        .select2-container .select2-selection--single {
            height: 38px !important;
            padding: 5px 10px;
        }

        .select2-container--default .select2-selection--single {
            border: 1px solid #ced4da;
            border-radius: 4px;
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
                                            <div class="col-md-5">
                                                <label class="form-label"><strong>Service Type *</strong></label>
                                                <select name="services[]" class="form-control service-select" required>
                                                    <option value="">Select Service</option>
                                                    @foreach($groupedServices as $departmentName => $services)
                                                        @if(count($services) > 0)
                                                            <optgroup label="{{ $departmentName }}">
                                                                @foreach($services as $service)
                                                                    <option value="{{ $service->id }}" data-charges="{{ $service->charges }}">
                                                                        {{ $service->name }}
                                                                    </option>
                                                                @endforeach
                                                            </optgroup>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-5">
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
                                            <label class="form-label"><strong>Appointment Charges</strong></label>
                                        </div>
                                        <div class="col-md-5">
                                            <input type="number" id="doctor_charges" name="doctor_charges" readonly class="form-control" value="{{ $patient->doctor->doctor_charges }}">
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </div>

                            <div class="col-md-6">
                                <div class="col-md-12">
                                    <label class="form-label"><strong>Discount</strong></label>
                                    <input type="number" id="discount" name="discount" class="form-control" value="0">
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label"><strong>Total</strong></label>
                                    <input type="number" id="total" name="total" class="form-control" 
                                        value="{{ $type === 'Appointment Charges' ? $patient->doctor->doctor_charges : '' }}" readonly>
                                </div>
                                <div class="col-md-12">
                                    <label for="payment_mode" class="form-label">Payment Mode *</label>
                                    <select name="payment_mode" class="form-control" required>
                                        <option value="Cash" {{ old('payment_mode') == 'Cash' ? 'selected' : '' }}>Cash</option>
                                        <option value="Card" {{ old('payment_mode') == 'Card' ? 'selected' : '' }}>Card</option>
                                        <option value="Online" {{ old('payment_mode') == 'Online' ? 'selected' : '' }}>Online</option>
                                        <option value="Pay Order" {{ old('payment_mode') == 'Pay Order' ? 'selected' : '' }}>Pay Order</option>
                                        <option value="Deposit" {{ old('payment_mode') == 'Deposit' ? 'selected' : '' }}>Deposit</option>
                                    </select>
                                </div>  
                                <div class="col-md-12">
                                    <label for="receiver_name" class="form-label">Receiver's Name</label>
                                    <input type="text" id="receiver_name" name="receiver_name" class="form-control" value="{{ old('receiver_name') }}">
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
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    // Improved custom matcher function for better searching
    function matchCustom(params, data) {
        // Return all options if there's no search term
        if ($.trim(params.term) === '') {
            return data;
        }
        
        // Convert search term to lowercase for case-insensitive matching
        const searchTerm = params.term.toLowerCase();
        
        // Check if the service name contains the search term
        if (data.text.toLowerCase().indexOf(searchTerm) > -1) {
            return data;
        }
        
        // Check if we're in an optgroup and if the group name contains the search term
        if (data.element && data.element.parentElement && data.element.parentElement.tagName === 'OPTGROUP') {
            const groupLabel = data.element.parentElement.getAttribute('label');
            if (groupLabel && groupLabel.toLowerCase().indexOf(searchTerm) > -1) {
                return data;
            }
        }
        
        // No match found
        return null;
    }

    // Initialize Select2 on service dropdowns
    function initSelect2() {
        $('.service-select').select2({
            placeholder: "Select Service",
            width: '100%',
            matcher: function(params, data) {
                return matchCustom(params, data);
            },
            allowClear: true
        });
    }

    $(document).ready(function () {
        // Initialize Select2 on page load
        initSelect2();

        // Service selection change handler
        $(document).on('change', '.service-select', function () {
            $('.services').find('.text-danger').remove();
            const selectedOption = $(this).find('option:selected');
            const charges = selectedOption.data('charges');
            $(this).closest('.service-row').find('.service-charges').val(charges);

            const selectedValue = $(this).val();
            let duplicateFound = false;
            $('.service-select').not(this).each(function () {
                if ($(this).val() === selectedValue && selectedValue !== '') {
                    duplicateFound = true;
                }
            });

            if (duplicateFound) {
                const errorMsg = '<div class="text-danger">This service has already been added!</div>';
                $(this).val('').trigger('change');
                $(this).closest('.service-row').find('.service-charges').val('');
                $(this).closest('.service-row').after(errorMsg);
            }

            calculateTotal();
        });

        // Calculate total function
        function calculateTotal() {
            let total = 0;
            const $type = "{{ $type }}";
            if ($type === 'Service Charges') {
                $('.service-charges').each(function () {
                    const charge = parseFloat($(this).val()) || 0;
                    total += charge;
                });
            } else if ($type === 'Appointment Charges') {
                total = parseFloat($('#doctor_charges').val()) || 0;
            }

            const discount = parseFloat($('#discount').val()) || 0;
            const discountedTotal = total - discount;
            $('#total').val(discountedTotal > 0 ? discountedTotal : 0);
        }

        // Add new row button handler - Fixed
        $('.add-row').on('click', function () {
            // Remove any error messages
            $('.services').find('.text-danger').remove();

            // Clone the first row
            const firstRow = $('.service-row').first();
            const newRow = firstRow.clone();
            
            // Find and destroy the Select2 instance in the cloned row
            const select = newRow.find('.service-select');
            
            // Reset form elements in the new row
            select.removeClass('select2-hidden-accessible').removeAttr('data-select2-id');
            select.find('option').removeAttr('data-select2-id');
            select.val('');
            
            // Remove any select2 containers that were cloned
            newRow.find('.select2-container').remove();
            
            // Clear the charges input
            newRow.find('.service-charges').val('');
            
            // Remove any error messages
            newRow.find('.text-danger').remove();
            
            // Add the new row to the DOM
            $('.service-row').last().after(newRow);
            
            // Re-initialize Select2 on all dropdowns
            initSelect2();
            
            // Enable all remove buttons
            $('.remove-row').prop('disabled', false);
        });

        // Remove row button handler
        $(document).on('click', '.remove-row', function () {
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
        $(document).on('input', '#discount', function () {
            calculateTotal();
        });
    });
</script>
@endsection
