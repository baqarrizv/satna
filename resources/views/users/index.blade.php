@extends('layouts.master')

@section('title') User Management @endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">User Management</h4>
                <a href="{{ route('users.create') }}" class="btn btn-primary">Add New User</a>
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
                    <table class="table data-table table-bordered dt-responsive nowrap"
                           style="border-collapse: collapse; border-spacing: 0; width: 100%;">                    
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role(s)</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->roles->pluck('name')->join(', ') }}</td>
                                <td>  
                                    @php
                                        // Check if the user has the 'Modify User Status' permission
                                        $canModifyStatus = auth()->user()->can('Modify User Status');
                                    @endphp                            
                                    <!-- Status toggle switch with user ID as parameter -->
                                    <input type="checkbox" id="switch-{{ $user->id }}" switch="bool" 
                                        {{ $user->is_active ? 'checked' : '' }} 
                                        {{ $canModifyStatus ? '' : 'disabled' }}
                                        onchange="toggleUserStatus({{ $user->id }}, this.checked)">
                                    <label for="switch-{{ $user->id }}" data-on-label="Active" data-off-label="Inactive"></label>
                                </td>                               
                                <td>
                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-outline-secondary btn-sm">                                            
                                        <i class="uil-pen"></i>
                                    </a>
                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-secondary btn-sm" onclick="return confirm('Are you sure?')">
                                            <i class="uil-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center">No users found</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


@section('scripts')
<script>
    function toggleUserStatus(userId, isActive) {
        // Send an AJAX request to toggle the user status
        fetch(`{{ url('users') }}/${userId}/toggle-status`, {
            method: 'PATCH',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                is_active: isActive,  // Pass the new status
            }),
        })
        .then(response => response.json())
        .then(data => {
            let alertDiv = document.getElementById('status-alert');
            if (data.success) {
                // Set alert message and class for success
                alertDiv.className = 'alert alert-success';
                alertDiv.innerText = 'User status updated successfully.';
            } else {
                // Set alert message and class for error
                alertDiv.className = 'alert alert-danger';
                alertDiv.innerText = 'Failed to update user status.';
            }
            alertDiv.classList.remove('d-none');  // Show the alert
        })
        .catch(error => {
            console.error('Error:', error);
            let alertDiv = document.getElementById('status-alert');
            // Set alert message and class for error
            alertDiv.className = 'alert alert-danger';
            alertDiv.innerText = 'An error occurred while updating the status.';
            alertDiv.classList.remove('d-none');  // Show the alert
        });
    }
</script>
@endsection
