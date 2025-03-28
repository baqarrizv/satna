@extends('layouts.master')

@section('title') Daily Closing @endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Daily Closing</h4>
                <a href="{{ route('payments.index') }}" class="btn btn-secondary">Back to Payments</a>
            </div>
        </div>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row justify-content-center">
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('payments.dailyClosing') }}" method="POST">
                        @csrf                     
                        <div class="row">                        
                            <div class="col-md-12">
                                <div class="mb-3">                                
                                    <label for="date" class="form-label">Date</label>
                                    <input type="date" id="date" name="date" required class="form-control @error('date') is-invalid @enderror" value="{{ old('date', date('Y-m-d')) }}">
                                </div>
                                @error('date')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection