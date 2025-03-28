@extends('layouts.master')

@section('title') Create Role @endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Create Role</h4>
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
                    <form action="{{ route('roles.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Role Name</label>
                                    <input type="text" name="name" required class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="permissions" class="form-label">Assign Permissions</label>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="btn-group btn-group-sm mt-2" role="group">
                                                @foreach($permissions as $index => $permission)
                                                <input type="checkbox" class="btn-check" name="permissions[]" value="{{ $permission->id }}" id="perm-{{ $permission->id }}">
                                                <label for="perm-{{ $permission->id }}" class="btn btn-primary btn-soft-primary waves-effect waves-light">
                                                    {{ $permission->name }}
                                                </label>
                                                @if (($index + 1) % 4 == 0)
                                                    </div> <div class="btn-group btn-group-sm mt-2" role="group">
                                                @endif
                                                @endforeach
                                            </div>
                                            @error('permissions')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Create Role</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
