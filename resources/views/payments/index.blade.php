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
                ajax: "{{ route('payments.index') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                    {data: 'id', name: 'id'},
                    {data: 'patient_id', name: 'patient_id'},
                    {data: 'patient.patient_name', name: 'patient.patient_name'},
                    {data: 'fc_file', name: 'fc_file'},
                    {data: 'doctor_name', name: 'doctor_name'},
                    {data: 'total', name: 'total'},
                    {data: 'payment_mode', name: 'payment_mode'},
                    {data: 'invoice', name: 'invoice', orderable: false, searchable: false},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ],
                responsive: true,
                pageLength: 25,
                order: [[1, 'desc']]
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
