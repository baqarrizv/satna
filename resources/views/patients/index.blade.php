@extends('layouts.master')

@section('title') Patients @endsection

@section('css')
    <!-- DataTables -->
    <link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Patients</h4>
                @can('Create Patients')
                    <a href="{{ route('patients.create') }}" class="btn btn-primary">Add New Patient</a>
                @endcan
            </div>
        </div>
    </div>

    <!-- Placeholder for dynamic alert messages -->
    <div id="status-alert" class="alert d-none" role="alert"></div>
    
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered dt-responsive nowrap w-100" id="patients-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>ID</th>
                                <th>FC-File</th>
                                <th>Name</th>
                                <th>Contact Number</th>
                                <th>Type</th>
                                <th>Doctor Coordinator</th>
                                <th>Doctor</th>
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
            var table = $('#patients-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('patients.index') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                    {data: 'id', name: 'id'},
                    {data: 'fc_file', name: 'fc_file'},
                    {data: 'patient_name', name: 'patient_name'},
                    {data: 'patient_contact', name: 'patient_contact'},
                    {data: 'type', name: 'type'},
                    {data: 'doctor_coordinator.name', name: 'doctorCoordinator.name'},
                    {data: 'doctor.name', name: 'doctor.name', defaultContent: 'N/A'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ],
                responsive: true,
                pageLength: 25,
                order: [[1, 'desc']]
            });
        });
    </script>
@endsection
