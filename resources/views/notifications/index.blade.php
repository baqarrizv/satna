@extends('layouts.master')

@section('title') Your Notifications @endsection

@section('content')
    <div class="container-fluid">
        <!-- Start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0">Your Notifications</h4>
                </div>
            </div>
        </div>
        <!-- End page title -->

        <!-- List of notifications -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="mb-4">Notifications</h5>
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
            </div>
        </div>
    </div>
@endsection
