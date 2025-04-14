@extends('layouts.master')

@section('title') {{ $type }} @endsection

@section('css')
<link href="{{ URL::asset('/assets/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('/assets/css/charge-details.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<div class="container-fluid"
    data-tax-percentage="{{ $settings->tax_percentage }}"
    data-tax-threshold="{{ $settings->tax_threshold }}">
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
                    <form action="{{ route('payments.applyCharges') }}" method="POST" id="paymentForm">
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
                                                <select id="department-filter-0" class="form-control department-filter select2" required>
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
                                                <select id="service-select-0" name="services[]" class="form-control service-select select2" required disabled>
                                                    <option value="">Select Department First</option>
                                                    @foreach($groupedServices as $departmentName => $services)
                                                    @foreach($services as $service)
                                                    <option value="{{ $service->id }}"
                                                        data-charges="{{ $service->charges }}"
                                                        data-department="{{ $departmentName }}"
                                                        style="display: none;">
                                                        {{ $service->name }}
                                                    </option>
                                                    @endforeach
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="form-label"><strong>Charges</strong></label>
                                                <input type="text" name="charges[]" readonly class="form-control service-charges" value="">
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
                                            <select id="doctor_id" name="doctor_id" class="form-control select2" required>
                                                @foreach($doctors as $doctor)
                                                <option value="{{ $doctor->id }}" data-charges="{{ $doctor->doctor_charges }}" {{ $patient->doctor_id == $doctor->id ? 'selected' : '' }}>
                                                    {{ $doctor->name }} ({{ $doctor->department->name }})
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-5">
                                            <label class="form-label"><strong>Appointment Charges</strong></label>
                                            <input type="text" id="doctor_charges" name="doctor_charges" readonly class="form-control" value="{{ number_format($patient->doctor->doctor_charges, 0) }}">
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
                                    <input type="text" id="total" name="total" class="form-control"
                                        value="{{ $type === 'Appointment Charges' ? number_format($patient->doctor->doctor_charges, 0) : '' }}" readonly>
                                </div>

                                <!-- Tax fields - initially hidden -->
                                <div class="col-md-12 tax-field" style="display:none;">
                                    <label class="form-label"><strong>Tax Amount ({{ $settings->tax_percentage }}% for amount exceeding {{ number_format($settings->tax_threshold, 0) }})</strong></label>
                                    <input type="text" id="tax_amount" name="tax_amount" class="form-control" readonly>
                                </div>
                                <div class="col-md-12 tax-field" style="display:none;">
                                    <label class="form-label"><strong>Total with Tax</strong></label>
                                    <input type="text" id="total_with_tax" name="total_with_tax" class="form-control" readonly>
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

        // Process initial department selection
        $('.department-filter').each(function() {
            const selectedDepartment = $(this).val();
            if (selectedDepartment) {
                const serviceSelect = $(this).closest('.service-row').find('.service-select');

                // Make sure select is enabled
                serviceSelect.prop('disabled', false);

                // Make only relevant options visible
                serviceSelect.find('option').hide();
                serviceSelect.find('option:first').text('Select Service').show();
                serviceSelect.find('option[data-department="' + selectedDepartment + '"]').show();

                console.log('Initial setup: Found ' + serviceSelect.find('option[data-department="' + selectedDepartment + '"]').length +
                    ' options for department: ' + selectedDepartment);
            }
        });

        // Fix for empty rows that might be present initially
        $('.service-row').each(function(index) {
            // Make sure the department filter has a unique ID
            const departmentFilter = $(this).find('.department-filter');
            departmentFilter.attr('id', 'department-filter-' + index);

            // Make sure the service select has a unique ID
            const serviceSelect = $(this).find('.service-select');
            serviceSelect.attr('id', 'service-select-' + index);

            // Ensure both selects are properly initialized with Select2
            if (!departmentFilter.hasClass('select2-hidden-accessible')) {
                departmentFilter.select2({
                    width: '100%',
                    placeholder: 'Select Department',
                    dropdownParent: departmentFilter.parent()
                });
            }

            if (!serviceSelect.prop('disabled') && !serviceSelect.hasClass('select2-hidden-accessible')) {
                serviceSelect.select2({
                    width: '100%',
                    placeholder: 'Select Service',
                    dropdownParent: serviceSelect.parent(),
                    templateResult: function(data) {
                        // Skip hidden options
                        const $option = $(data.element);
                        if ($option.css('display') === 'none') {
                            return null;
                        }
                        return data.text;
                    }
                });
            }
        });

        // Get tax settings from data attributes
        var taxPercentage = parseFloat("{{ $settings->tax_percentage }}");
        var taxThreshold = parseFloat("{{ $settings->tax_threshold }}");

        console.log("Tax Percentage:", taxPercentage);
        console.log("Tax Threshold:", taxThreshold);

        // Initial calculation if Card is selected
        if ($('#payment_mode').val() === 'Card') {
            showTaxFields('Card');
        }

        // Function to initialize Select2

        // Payment mode change handler
        $('#payment_mode').on('change', function() {
            const paymentMode = $(this).val();
            showTaxFields(paymentMode);
        });
        // Function to show/hide tax fields based on payment mode
        function showTaxFields(paymentMode) {
            if (paymentMode === 'Card') {
                var subtotal = parseFloat($('#total').val().replace(/,/g, '')) || 0;
                if (subtotal >= taxThreshold) {
                    // Show tax fields and update labels
                    $('.tax-field').show();
                    $('#total_label').html('<strong>Subtotal</strong>');
                    // Calculate tax immediately
                    calculateTaxAndTotal();
                } else {
                    subtotal = numberWithCommas(subtotal);
                    $('#total').val(subtotal);
                    $('.tax-field').hide();
                    $('#total_label').html('<strong>Total</strong>');
                }
            } else {
                // Hide tax fields and reset labels
                var total = numberWithCommas($('#total').val().replace(/,/g, ''));
                $('#total').val(total);
                $('.tax-field').hide();
                $('#total_label').html('<strong>Total</strong>');
            }
        }

        // Function to calculate tax and total with tax
        function calculateTaxAndTotal() {
            var subtotal = parseFloat($('#total').val().replace(/,/g, '')) || 0;
            console.log("Calculating tax. Subtotal:", subtotal, "Threshold:", taxThreshold);

            // Only apply tax if subtotal is at or above threshold
            var taxAmount = 0;
            if (subtotal >= taxThreshold) {
                taxAmount = (subtotal * taxPercentage) / 100;
                taxAmount = Math.round(taxAmount); // Round to whole number
                $('.tax-field').show();
                $('#total_label').html('<strong>Subtotal</strong>');
                console.log("Applied tax:", taxPercentage + "%. Amount:", taxAmount);
            } else {
                console.log("No tax applied - below threshold");
                $('.tax-field').hide();
                $('#total_label').html('<strong>Total</strong>');
            }

            // Calculate total with tax
            var totalWithTax = parseFloat(subtotal) + parseFloat(taxAmount);
            console.log("Total with tax:", totalWithTax);

            // Update the displayed values with comma formatting
            $('#tax_amount').val(numberWithCommas(taxAmount));
            $('#total_with_tax').val(numberWithCommas(Math.round(totalWithTax)));
        }

        // Recalculate tax when subtotal changes
        $('#total').on('change keyup', function() {
            if ($('#payment_mode').val() === 'Card') {
                var subtotal = parseFloat($(this).val().replace(/,/g, '')) || 0;
                if (subtotal >= taxThreshold) {
                    $('.tax-field').show();
                    $('#total_label').html('<strong>Subtotal</strong>');
                    calculateTaxAndTotal();
                } else {
                    $('.tax-field').hide();
                    $('#total_label').html('<strong>Total</strong>');
                }
            }
        });

        // Also recalculate when discount changes
        $('#discount').on('change keyup', function() {
            calculateTotal();
            if ($('#payment_mode').val() === 'Card') {
                calculateTaxAndTotal();
            }
        });

        // Department filter change handler
        $(document).on('change', '.department-filter', function() {
            const selectedDepartment = $(this).val();
            const serviceRow = $(this).closest('.service-row');
            const serviceSelect = serviceRow.find('.service-select');

            console.log('Department changed:', selectedDepartment);

            // Reset service selection
            serviceSelect.val('').trigger('change');

            if (selectedDepartment) {
                // Destroy the Select2 instance first
                if (serviceSelect.hasClass('select2-hidden-accessible')) {
                    serviceSelect.select2('destroy');
                }

                // Enable the service select
                serviceSelect.prop('disabled', false);

                // Reset all options first
                serviceSelect.find('option').hide();
                serviceSelect.find('option:first').text('Select Service').show();

                // Show options for the selected department
                const departmentOptions = serviceSelect.find('option[data-department="' + selectedDepartment + '"]');
                departmentOptions.show();

                console.log('Found ' + departmentOptions.length + ' options for department: ' + selectedDepartment);

                // Reinitialize Select2
                serviceSelect.select2({
                    width: '100%',
                    placeholder: 'Select Service',
                    dropdownParent: serviceSelect.parent(),
                    templateResult: function(data) {
                        // Skip hidden options
                        const $option = $(data.element);
                        if ($option.css('display') === 'none') {
                            return null;
                        }
                        return data.text;
                    }
                });
            } else {
                // If no department selected, disable service select
                if (serviceSelect.hasClass('select2-hidden-accessible')) {
                    serviceSelect.select2('destroy');
                }

                serviceSelect.prop('disabled', true);
                serviceSelect.find('option').hide();
                serviceSelect.find('option:first').text('Select Department First').show();

                // Reinitialize Select2
                serviceSelect.select2({
                    width: '100%',
                    placeholder: 'Select Department First',
                    dropdownParent: serviceSelect.parent()
                });
            }
        });

        // Service selection change handler
        $(document).on('change', '.service-select', function() {
            console.log('Service selection changed');
            $('.services').find('.text-danger').remove();

            const selectedOption = $(this).find('option:selected');
            const charges = selectedOption.data('charges');

            // Update charges - round to whole number and format with commas
            if (charges) {
                const formattedCharges = numberWithCommas(Math.round(charges));
                $(this).closest('.service-row').find('.service-charges').val(formattedCharges);
                console.log('Service charges updated:', formattedCharges);
            } else {
                // Clear the charges if no valid service selected
                $(this).closest('.service-row').find('.service-charges').val('');
            }

            // Check for duplicates
            const selectedValue = $(this).val();
            if (selectedValue !== '') {
                let duplicateFound = false;
                $('.service-select').not(this).each(function() {
                    if ($(this).val() === selectedValue) {
                        duplicateFound = true;
                        return false; // Break the loop
                    }
                });

                if (duplicateFound) {
                    const errorMsg = '<div class="text-danger">This service has already been added!</div>';
                    $(this).val('').trigger('change');
                    $(this).closest('.service-row').find('.service-charges').val('');
                    $(this).closest('.service-row').after(errorMsg);
                    console.log('Duplicate service detected');
                }
            }

            // Recalculate total
            calculateTotal();
        });

        // Doctor selection change handler for appointment charges
        $(document).on('change', '#doctor_id', function() {
            const selectedOption = $(this).find('option:selected');
            const charges = selectedOption.data('charges');
            $('#doctor_charges').val(numberWithCommas(Math.round(charges)));
            calculateTotal();
        });

        // Calculate total function
        function calculateTotal() {
            let total = 0;
            const $type = "{{ $type }}";
            if ($type === 'Service Charges') {
                $('.service-charges').each(function() {
                    // Remove commas before parsing
                    const charge = parseFloat($(this).val().replace(/,/g, '')) || 0;
                    total += charge;
                });
            } else if ($type === 'Appointment Charges') {
                total = parseFloat($('#doctor_charges').val().replace(/,/g, '')) || 0;
            }

            const discount = parseFloat($('#discount').val()) || 0;
            const discountedTotal = total - discount;
            const formattedTotal = numberWithCommas(discountedTotal > 0 ? discountedTotal : 0);
            $('#total').val(formattedTotal);

            // If Card payment, recalculate tax
            if ($('#payment_mode').val() === 'Card') {
                calculateTaxAndTotal();
            }
        }

        // Add new row button handler
        $('.add-row').on('click', function() {
            console.log('Add row button clicked');

            // Remove any error messages
            $('.services').find('.text-danger').remove();

            // Create a completely new row instead of cloning
            const rowCount = $('.service-row').length;
            const newDepartmentFilterId = 'department-filter-' + rowCount;
            const newServiceSelectId = 'service-select-' + rowCount;

            // HTML for the new row
            const newRowHtml = `
            <div class="service-row">
                <div class="row mb-3">
                    <div class="col-md-3">
                        <label class="form-label"><strong>Department *</strong></label>
                        <select id="${newDepartmentFilterId}" class="form-control department-filter" required>
                            <option value="">Select Department</option>
                            ${$('.department-filter').first().find('option').not(':first').map(function() {
                                return `<option value="${$(this).val()}">${$(this).text()}</option>`;
                            }).get().join('')}
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label"><strong>Service Type *</strong></label>
                        <select id="${newServiceSelectId}" name="services[]" class="form-control service-select" required disabled>
                            <option value="">Select Department First</option>
                            ${$('.service-select').first().find('option').not(':first').map(function() {
                                return `<option value="${$(this).val()}" 
                                    data-charges="${$(this).data('charges')}" 
                                    data-department="${$(this).data('department')}" 
                                    style="display: none;">${$(this).text()}</option>`;
                            }).get().join('')}
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label"><strong>Charges</strong></label>
                        <input type="text" name="charges[]" readonly class="form-control service-charges" value="">
                    </div>
                    <div class="col-md-2 d-flex align-items-end">
                        <button type="button" class="btn btn-danger remove-row">-</button>
                    </div>
                </div>
            </div>`;

            // Add the new row to the DOM
            $('.service-row').last().after(newRowHtml);

            // Initialize Select2 on the new department filter
            $('#' + newDepartmentFilterId).select2({
                width: '100%',
                placeholder: 'Select Department',
                dropdownParent: $('#' + newDepartmentFilterId).parent()
            });

            // Enable all remove buttons
            $('.remove-row').prop('disabled', false);

            console.log('New row added successfully');
        });

        // Remove row button handler
        $(document).on('click', '.remove-row', function() {
            console.log('Remove row button clicked');

            if ($('.service-row').length > 1) {
                // Properly destroy Select2 before removing row
                const row = $(this).closest('.service-row');

                if (row.find('.department-filter').hasClass('select2-hidden-accessible')) {
                    row.find('.department-filter').select2('destroy');
                }

                if (row.find('.service-select').hasClass('select2-hidden-accessible')) {
                    row.find('.service-select').select2('destroy');
                }

                // Remove the row
                row.remove();
                console.log('Row removed successfully');

                // Recalculate total
                calculateTotal();
            }

            // Update button state
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

        // Replace the form submit handler with this
        $('#paymentForm').on('submit', function(e) {
            e.preventDefault(); // Prevent default form submission

            var form = $(this);
            var formData = new FormData(this);

            $.ajax({
                url: form.attr('action'),
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response.success) {
                        // Open invoice in new tab
                        window.open(response.invoice_url, '_blank');

                        // Redirect current page to list
                        window.location.href = response.redirect_url;
                    }
                },
                error: function(xhr) {
                    console.error('Error:', xhr);
                    alert('An error occurred while processing your request.');
                }
            });
        });

        function numberWithCommas(number) {
            // Ensure the number is valid, otherwise return empty string
            if (number === undefined || number === null || isNaN(number)) {
                return '';
            }
            var parts = number.toString().split(".");
            parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            return parts.join(".");
        }
    });
</script>
@endsection