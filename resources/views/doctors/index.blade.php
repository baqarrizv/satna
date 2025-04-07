@extends('layouts.master')

@section('title') Doctors @endsection

@section('css')
    <!-- DataTables -->
    <link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Doctors</h4>
                @can('Create Doctor')
                    <a href="{{ route('doctors.create') }}" class="btn btn-primary">Add New Doctor</a>
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
                    <table class="table table-bordered dt-responsive nowrap w-100" id="doctors-table">
                        <thead>
                            <tr>
                                <th>Doctor ID</th>
                                <th>Name</th>
                                <th>Department</th>
                                <th>Specialization</th>
                                <th>Appointment Date</th>
                                <th>Charges</th>
                                <th>Contact Number</th>
                                <th>Status</th>
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
            var table = $('#doctors-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('doctors.index') }}",
                columns: [
                    {data: 'doctor_id', name: 'doctor_id'},
                    {data: 'name', name: 'name'},
                    {data: 'department.name', name: 'department.name', defaultContent: 'N/A'},
                    {data: 'specialist', name: 'specialist'},
                    {data: 'date_of_appointment', name: 'date_of_appointment'},
                    {data: 'doctor_charges', name: 'doctor_charges'},
                    {data: 'contact_number', name: 'contact_number', defaultContent: 'N/A'},
                    {data: 'status', name: 'status', orderable: false, searchable: false},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ],
                responsive: true,
                pageLength: 25,
                order: [[0, 'asc']]
            });
        });

        function toggleDoctorStatus(doctorId, isActive) {
            fetch(`{{ url('doctor') }}/${doctorId}/toggle-status`, {
                method: 'PATCH',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    is_active: isActive,
                }),
            })
            .then(response => response.json())
            .then(data => {
                let alertDiv = document.getElementById('status-alert');
                if (data.success) {
                    alertDiv.className = 'alert alert-success';
                    alertDiv.innerText = 'Doctor status updated successfully.';
                } else {
                    alertDiv.className = 'alert alert-danger';
                    alertDiv.innerText = 'Failed to update doctor status.';
                }
                alertDiv.classList.remove('d-none');
                
                // Auto-hide the alert after 3 seconds
                setTimeout(() => {
                    alertDiv.classList.add('d-none');
                }, 3000);
            })
            .catch(error => {
                console.error('Error:', error);
                let alertDiv = document.getElementById('status-alert');
                alertDiv.className = 'alert alert-danger';
                alertDiv.innerText = 'An error occurred while updating the status.';
                alertDiv.classList.remove('d-none');
                
                // Auto-hide the alert after 3 seconds
                setTimeout(() => {
                    alertDiv.classList.add('d-none');
                }, 3000);
            });
        }
    </script>
@endsection
