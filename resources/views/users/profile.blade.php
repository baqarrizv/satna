@extends('layouts.master')

@section('title') Profile @endsection

@section('content')
<div class="row mb-4">
    <div class="col-xl-4">
        <div class="card h-100">
            <div class="card-body">
                <div class="text-center">
                    <div class="dropdown float-end">
                        <a class="text-body font-size-18" href="#" role="button" onClick="toggleInput(this)">
                            <i class="uil uil-pen"></i>
                        </a>
                    </div>
                    <div class="clearfix"></div>
                    <div>
                        <img src="{{ $user->image ? asset($user->image) : asset('/assets/images/users/avatar-4.jpg') }}" alt="" class="avatar-lg rounded-circle img-thumbnail">
                    </div>
                    <h5 class="mt-3 mb-1">{{ $user->name }}</h5>
                    <p class="text-muted">{{ $user->roles->pluck('name')->first() }}</p>
                </div>

                <hr class="my-4">

                <div class="text-muted display">
                    <div class="table-responsive mt-4">
                        <div>
                            <p class="mb-1">Name :</p>
                            <h5 class="font-size-16">{{ $user->name }}</h5>
                        </div>
                        <div class="mt-4">
                            <p class="mb-1">E- mail :</p>
                            <h5 class="font-size-16">{{ $user->email }}</h5>
                        </div>
                    </div>
                </div>

                <div class="text-muted input" style="display: none;">
                    <form action="{{ route('profile.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="table-responsive mt-4">
                            <div class="mb-3">
                                <label for="name" class="form-label">Profile Picture</label>
                                @component('common-components.dropzone', [
                                    'inputName' => 'image',
                                    'existingFiles' => $user->image ? [asset($user->image)] : [],
                                    'acceptedFiles' => 'image/*',
                                    'maxFiles' => 1,
                                    'maxFileSize' => 2
                                ]) @endcomponent
                            </div>    
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="name" required class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $user->name) }}">
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" required class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $user->email) }}">
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
                                <small class="text-muted">Leave blank to keep current password.</small>
                                @error('password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">Confirm Password</label>
                                <input type="password_confirmation" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror">
                                <small class="text-muted">Leave blank to keep current password.</small>
                                @error('password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Update Profile</button>                            
                        </div>
                    </form>    
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-8">
        <div class="card mb-0">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-bs-toggle="tab" href="#notification" role="tab">
                        <i class="uil uil-user-circle font-size-20"></i>
                        <span class="d-none d-sm-block">Notifications</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#logs" role="tab">
                        <i class="uil uil-clipboard-notes font-size-20"></i>
                        <span class="d-none d-sm-block">Activity log</span>
                    </a>
                </li>
            </ul>
            <!-- Tab content -->
            <div class="tab-content p-4">
                <div class="tab-pane active" id="notification" role="tabpanel">
                    <div>
                        <h5 class="font-size-16 mb-4">Notifications</h5>
                        @foreach ($notificationsList as $notification)
                            <a href="{{ $notification->data['url'] ?? route('notifications.index') }}" class="text-dark notification-item">
                                <div class="d-flex align-items-start justify-content-between">
                                    <div class="d-flex align-items-start">
                                        <div class="flex-shrink-0 me-3">
                                            <div class="avatar-xs">
                                                <span class="avatar-title bg-primary rounded-circle font-size-16">
                                                    <i class="uil-comment-info"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mt-0 mb-1">{{ $notification->data['title'] }}</h6>
                                            <div class="font-size-12 text-muted">
                                                <p class="mb-1">{{ $notification->data['message'] }}</p>
                                                <p class="mb-0"><i class="mdi mdi-clock-outline"></i> {{ $notification->created_at->diffForHumans() }}</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="ms-auto align-self-center">
                                        @if($notification->read_at)
                                            <span class="badge bg-success">Read</span>
                                        @else
                                            <a href="{{ route('notifications.read', $notification->id) }}" class="btn btn-sm btn-primary">Mark as Read</a>
                                        @endif
                                    </div>
                                </div>
                            </a>                             
                        @endforeach
                    </div>
                </div>
                <div class="tab-pane" id="logs" role="tabpanel">
                    <div>
                        <h5 class="font-size-16 mb-3">Activity log</h5>
                        <div class="infinite-scroll">
                            <ul class="verti-timeline list-unstyled" id="activity-logs">
                                @include('activity_logs.partials.logs', ['activities' => $activities])
                            </ul>

                            <div class="text-center my-3" id="loading-spinner" style="display: none;">
                                <div class="spinner-border text-primary" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end row -->
@endsection

@section('scripts')
<script>
    var page = 1;
    $(window).scroll(function() {
        // Check if we're near the bottom of the page and fetch new logs
        if($(window).scrollTop() + $(window).height() >= $(document).height() - 200) {
            page++;
            loadMoreData(page);
        }
    });

    function loadMoreData(page) {
        var baseUrl = "{{ config('app.url') }}";
        $.ajax({
            url: baseUrl + '/activity-logs?page=' + page,
            type: "get",
            beforeSend: function() {
                $('#loading-spinner').show();
            }
        })
        .done(function(data) {
            if (data.trim().length == 0) {
                $('#loading-spinner').html("No more logs to load.");
                return;
            }
            $('#loading-spinner').hide();
            $('#activity-logs').append(data);
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log('Something went wrong while loading logs.');
        });
    }
    
    document.addEventListener("DOMContentLoaded", function() {
        // Check if any element with the 'text-danger' class exists
        var errorElements = document.querySelectorAll('.text-danger');
        
        if (errorElements.length > 0) {
            // Assuming toggleInput requires the button element, 
            // find the button (the pen icon or relevant element)
            var penButton = document.querySelector('.text-body.font-size-18');
            
            // Call toggleInput if the button is found
            if (penButton) {
                toggleInput(penButton);
            }
        }
    });
    
    function toggleInput(button) {
        event.preventDefault();

        // Find the closest parent card (or specific section) that contains the display and input fields
        var card = button.closest('.card-body');
        
        // Select the display and input elements within that specific card
        var displayElement = card.querySelector('.display');
        var inputElement = card.querySelector('.input');

        // Toggle visibility
        displayElement.style.display = displayElement.style.display === 'none' ? 'block' : 'none';
        inputElement.style.display = inputElement.style.display === 'none' ? 'block' : 'none';
    }

</script>
@endsection