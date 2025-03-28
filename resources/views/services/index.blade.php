@extends('layouts.master')

@section('title') Services @endsection

@section('css')
    <!-- DataTables -->
    <link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Services</h4>
                @can('Create Service')
                    <a href="{{ route('services.create') }}" class="btn btn-primary">Create New Service</a>
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
                    <table class="table table-bordered dt-responsive nowrap w-100" id="services-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Department</th>
                                <th>Charges</th>
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
            var table = $('#services-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('services.index') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                    {data: 'name', name: 'name'},
                    {data: 'department.name', name: 'department.name'},
                    {data: 'charges', name: 'charges'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ],
                responsive: true,
                pageLength: 25,
                order: [[1, 'asc']]
            });
        });
    </script>
@endsection
