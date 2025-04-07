@extends('layouts.master')

@section('title') Payments @endsection

@section('css')
    <!-- DataTables -->
    <link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Payments</h4>
                @can('Add Charges')
                    <a href="{{ route('payments.addCharges') }}" class="btn btn-primary">Add Charges</a>
                @endcan
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
                    <!-- Filters -->
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <label for="payment_mode_filter" class="form-label">Payment Mode</label>
                            <select class="form-control" id="payment_mode_filter">
                                <option value="">All</option>
                                <option value="Cash">Cash</option>
                                <option value="CC">CC</option>
                                <option value="Online">Online</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="doctor_filter" class="form-label">Doctor</label>
                            <select class="form-control" id="doctor_filter">
                                <option value="">All</option>
                                @foreach($doctors as $doctor)
                                    <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="service_filter" class="form-label">Service</label>
                            <select class="form-control" id="service_filter">
                                <option value="">All</option>
                                @foreach($services as $service)
                                    <option value="{{ $service->id }}">{{ $service->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="date_filter" class="form-label">Payment Date</label>
                            <input type="date" class="form-control" id="date_filter">
                        </div>
                    </div>

                    <table class="table table-bordered dt-responsive nowrap w-100" id="payments-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Payment ID</th>
                                <th>Patient ID</th>
                                <th>Patient Name</th>
                                <th>FC-File</th>
                                <th>Doctor</th>
                                <th>Total</th>
                                <th>Mode</th>
                                <th>Date</th>
                                <th>Invoice</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <!-- Required datatable js -->
    <script src="{{ URL::asset('/assets/libs/datatables/datatables.min.js') }}"></script>

    <script type="text/javascript">
        $(function () {
            var table = $('#payments-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('payments.index') }}",
                    data: function(d) {
                        d.payment_mode = $('#payment_mode_filter').val();
                        d.doctor_id = $('#doctor_filter').val();
                        d.service_id = $('#service_filter').val();
                        d.payment_date = $('#date_filter').val();
                    }
                },
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                    {data: 'id', name: 'id'},
                    {data: 'patient_id', name: 'patient_id'},
                    {data: 'patient.patient_name', name: 'patient.patient_name'},
                    {
                        data: 'fc_file',
                        name: 'fc_file',
                        render: function(data, type, row) {
                            var fcNumber = row.fc_number || 'N/A';
                            var fileNumber = row.file_number || 'N/A';
                            return fcNumber + ' - ' + fileNumber;
                        }
                    },
                    {data: 'doctor_name', name: 'doctor_name'},
                    {data: 'total', name: 'total'},
                    {data: 'payment_mode', name: 'payment_mode'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'invoice', name: 'invoice', orderable: false, searchable: false},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ],
                responsive: true,
                pageLength: 25,
                order: [[1, 'desc']]
            });

            // Handle filter changes
            $('#payment_mode_filter, #doctor_filter, #service_filter, #date_filter').on('change', function() {
                table.ajax.reload();
            });
        });
    </script>
@endsection

@if (session('invoice_url'))
<script>
    window.addEventListener('load', function() {
        const invoiceUrl = "{{ session('invoice_url') }}";
        const newWindow = window.open(invoiceUrl, '_blank');
        if (newWindow) {
            newWindow.onload = function() {
                newWindow.print();
            };
        }
    });
</script>        
@endif
