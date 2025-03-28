@extends('layouts.master')

@section('title') {{ $type }} @endsection

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
                        <!-- Patient Details Section -->
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
                                <span class="align-self-right">{{ $patient->fc_number }} {{ $patient->file_number ?? 'N/A' }}</span>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label"><strong>Department</strong></label>
                                <span>{{ $patient->department ?? 'N/A' }}</span>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label"><strong>Doctor's Name</strong></label>
                                <span>{{ $patient->doctor->name ?? 'N/A' }}</span>
                            </div>
                        </div>

                        <hr class="bg-dark border-2 border-top border-dark" />

                        <!-- Services and Charges Section -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                @if($type === 'Service Charges')     
                                <div class="services">
                                    <div class="service-row">
                                        <div class="row mb-3">
                                            <div class="col-md-5">
                                                <label class="form-label"><strong>Service Type</strong></label>
                                                <select name="services[]" class="form-control service-select" required>
                                                    @foreach($services as $service)
                                                        <option value="{{ $service->id }}" data-charges="{{ $service->charges }}">{{ $service->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-5">
                                                <label class="form-label"><strong>Charges</strong></label>
                                                <input type="number" name="charges[]" readonly class="form-control service-charges" value="1000">
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
                                            <input type="number" id="doctor_charges" name="doctor_charges" readonly class="form-control" value="{{ $patient->doctor->doctor_charges}}">
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
                                    <div class="mb-3">
                                        <label for="payment_mode" class="form-label">Payment Mode</label>
                                        <select name="payment_mode" class="form-control @error('payment_mode') is-invalid @enderror" required>
                                            <option value="Cash" {{ old('payment_mode') == 'Cash' ? 'selected' : '' }}>Cash</option>
                                            <option value="CC" {{ old('payment_mode') == 'CC' ? 'selected' : '' }}>CC</option>
                                            <option value="Online" {{ old('payment_mode') == 'Online' ? 'selected' : '' }}>Online</option>
                                        </select>
                                        @error('payment_mode')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">                            
                                    <label class="form-label"><strong>Remarks</strong></label>
                                    <textarea name="remarks" class="form-control" rows="3"></textarea>
                                </div>
                            </div>                            
                        </div>                        
                        <!-- Submit Button -->
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
    $(document).ready(function () {
        // Function to calculate the total charges
        function calculateTotal() {
            let total = 0;
            const $type = "{{ $type }}";
            if ($type === 'Service Charges')  {
                $('.service-charges').each(function () {
                    const charge = parseFloat($(this).val()) || 0;
                    total += charge;
                });
            } else if ($type === 'Appointment Charges')  {
                total = parseFloat($('#doctor_charges').val()) || 0;
            }
            
            // Apply discount
            const discount = parseFloat($('#discount').val()) || 0;
            const discountedTotal = total - discount;

            $('#total').val(discountedTotal > 0 ? discountedTotal : 0); // Ensure total does not go below zero
        }

        // Set charges based on the selected service
        $(document).on('change', '.service-select', function () {            
            $('.services').find('.text-danger').remove();
            const selectedOption = $(this).find('option:selected');
            const charges = selectedOption.data('charges');
            $(this).closest('.service-row').find('.service-charges').val(charges);

            // Check for duplicate services
            const selectedValue = $(this).val();
            let duplicateFound = false;
            $('.service-select').not(this).each(function () {
                if ($(this).val() === selectedValue) {
                    duplicateFound = true;
                }
            });

            if (duplicateFound) {
                const errorMsg = '<div class="text-danger">This service has already been added!</div>';
                $(this).val(''); // Reset the select box
                $(this).closest('.service-row').find('.service-charges').val('');
                $(this).closest('.service-row').after(errorMsg);
            }
            // Recalculate total charges
            calculateTotal();
        });

        // Add a new service row
        $('.add-row').on('click', function () {
            $('.services').find('.text-danger').remove();            
            // Remove rows without a selected service
            $('.service-select').each(function () {
                if (!$(this).val()) {
                    $(this).closest('.service-row').remove();
                }
            });

            // Clone the last service row
            const lastRow = $('.service-row').last();
            const newRow = lastRow.clone();

            // Clear values in the cloned row
            newRow.find('select').val('');
            newRow.find('.service-charges').val('');

            // Remove error messages from the cloned row
            newRow.find('.text-danger').remove();

            // Insert the new row before the + button
            $('.add-row').closest('.row').before(newRow);

            // Enable all remove buttons (since now there are at least two rows)
            $('.remove-row').prop('disabled', false);
        });

        // Remove a service row
        $(document).on('click', '.remove-row', function () {
            if ($('.service-row').length > 1) {
                $(this).closest('.service-row').remove();
            }

            // Recalculate total charges
            calculateTotal();

            // Disable the remove button if there's only one row left
            if ($('.service-row').length === 1) {
                $('.remove-row').prop('disabled', true);
            }
        });

        // Initially disable the remove button if there's only one row
        if ($('.service-row').length === 1) {
            $('.remove-row').prop('disabled', true);
        }

        // Recalculate total charges on page load (if needed)
        calculateTotal();

        // Recalculate total charges when the discount changes
        $(document).on('input', '#discount', function () {
            calculateTotal();
        });
    });
</script>
@endsection
