@extends('layouts.master')

@section('title') Manage Notification Subscriptions @endsection

@section('content')
    <div class="container-fluid">
        <!-- Start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0">Manage Notification Subscriptions</h4>
                </div>
            </div>
        </div>
        <!-- End page title -->

        <!-- Display success message -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Subscription form for events -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('subscriptions.update') }}" method="POST">
                            @csrf
                            @method('PUT')

                            <h5 class="mt-4 mb-4">Select Events to Subscribe</h5>

                            <!-- Loop through events and show checkboxes -->
                            <div class="row">
                            @foreach($events as $event)
                                <div class="col-md-6">
                                    <div class="form-check form-switch">
                                        <!-- Main event checkbox -->
                                        <input class="form-check-input event-checkbox" type="checkbox" id="event_{{ $event->id }}" name="events[]" value="{{ $event->id }}" {{ isset($userSubscriptions[$event->id]) ? 'checked' : '' }} onchange="toggleGroup({{ $event->id }}, this.checked)">
                                        <label class="form-check-label" for="event_{{ $event->id }}">{{ $event->name }}</label>
                                    </div>

                                    <!-- Group of buttons for notification types -->
                                    <div class="btn-group btn-group-sm mt-2" role="group" id="group-{{ $event->id }}">
                                        <input type="checkbox" class="btn-check" name="database[{{ $event->id }}]" id="database-{{ $event->id }}" {{ isset($userSubscriptions[$event->id]['notify_via_database']) && $userSubscriptions[$event->id]['notify_via_database'] ? 'checked' : '' }}> 
                                        <label for="database-{{ $event->id }}" class="btn btn-primary btn-soft-primary waves-effect waves-light">
                                            Application
                                        </label>

                                        <input type="checkbox" class="btn-check" name="mail[{{ $event->id }}]" id="mail-{{ $event->id }}" {{ isset($userSubscriptions[$event->id]['notify_via_mail']) && $userSubscriptions[$event->id]['notify_via_mail'] ? 'checked' : '' }}>
                                        <label for="mail-{{ $event->id }}" class="btn btn-primary btn-soft-primary waves-effect waves-light">
                                            Mail
                                        </label>

                                        <input type="checkbox" class="btn-check" name="one_signal[{{ $event->id }}]" id="one_signal-{{ $event->id }}" {{ isset($userSubscriptions[$event->id]['notify_via_one_signal']) && $userSubscriptions[$event->id]['notify_via_one_signal'] ? 'checked' : '' }}>
                                        <label for="one_signal-{{ $event->id }}" class="btn btn-primary btn-soft-primary waves-effect waves-light">
                                            Push Notification
                                        </label>
                                    </div>                                        
                                </div>
                            @endforeach

                            </div>

                            <!-- Submit Button -->
                            <div class="row mt-4">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">Update Subscriptions</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript to handle group toggle -->
    <script>
        // Toggle all checkboxes inside the notification group for a specific event
        function toggleGroup(eventId, isChecked) {
            const group = document.getElementById('group-' + eventId);            
            const checkboxes = group.querySelectorAll('input[type="checkbox"]');
            
            checkboxes.forEach(checkbox => {
                checkbox.checked = isChecked;
            });
            
            if (isChecked) {
                group.style.display = 'block';  // Show the group div
            } else {
                group.style.display = 'none';   // Hide the group div
            }
        }

        // On page load, ensure the groups are correctly toggled based on the main event checkbox
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.event-checkbox').forEach(function(eventCheckbox) {
                const eventId = eventCheckbox.id.split('_')[1];
                toggleGroup(eventId, eventCheckbox.checked);
            });
        });
    </script>
@endsection
