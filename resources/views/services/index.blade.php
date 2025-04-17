@extends('layouts.master')

@section('title') Services @endsection

@section('css')
    <!-- DataTables -->
    <link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Select2 CSS -->
    <link href="{{ URL::asset('/assets/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
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

    <div class="row mb-4">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-4">Filter Services</h5>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="departmentFilter" class="form-label">Department</label>
                                <select id="departmentFilter" class="form-control select2">
                                    <option value="">All Departments</option>
                                    @foreach(\App\Models\Department::all() as $department)
                                    <option value="{{ $department->id }}">{{ $department->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered dt-responsive nowrap w-100" id="services-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Department</th>
                                <th>Name</th>
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
    <!-- Select2 -->
    <script src="{{ URL::asset('/assets/libs/select2/select2.min.js') }}"></script>

    <script type="text/javascript">
        $(function () {
            // Initialize select2
            $('.select2').select2();
            
            var table = $('#services-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('services.index') }}",
                    data: function(d) {
                        d.department_id = $('#departmentFilter').val();
                    }
                },
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                    {data: 'department.name', name: 'department.name', defaultContent: 'N/A'},
                    {data: 'name', name: 'name', defaultContent: 'N/A'},
                    {data: 'charges', name: 'charges'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ],
                responsive: true,
                pageLength: 25,
                order: [[1, 'asc']]
            });
            
            // Apply filter when department selection changes
            $('#departmentFilter').change(function() {
                table.draw();
            });
        });
    </script>
@endsection
