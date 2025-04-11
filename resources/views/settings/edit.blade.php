@extends('layouts.master')

@section('title') Edit Settings @endsection

@section('content')
<div class="container-fluid">
    <!-- Start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Edit Settings</h4>
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

    <!-- Edit form for settings -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('settings.update') }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Site Settings Section -->
                        <h5 class="mt-4 mb-4">Site Settings</h5>
                        <div class="row">
                            <!-- Title -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $setting->title) }}" maxlength="255">
                                    @error('title')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Description -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3">{{ old('description', $setting->description) }}</textarea>
                                    @error('description')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!-- Logo Light -->
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="logo_light" class="form-label">Logo Light</label>
                                    @component('common-components.dropzone', [
                                    'inputName' => 'logo_light',
                                    'existingFiles' => $setting->logo_light ? [asset($setting->logo_light)] : [],
                                    'acceptedFiles' => 'image/*',
                                    'maxFiles' => 1,
                                    'maxFileSize' => 2
                                    ]) @endcomponent
                                    @error('logo_light')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Logo Dark -->
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="logo_dark" class="form-label">Logo Dark</label>
                                    @component('common-components.dropzone', [
                                    'inputName' => 'logo_dark',
                                    'existingFiles' => $setting->logo_dark ? [asset($setting->logo_dark)] : [],
                                    'acceptedFiles' => 'image/*',
                                    'maxFiles' => 1,
                                    'maxFileSize' => 2
                                    ]) @endcomponent
                                    @error('logo_dark')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Fav Icon -->
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="fav_icon" class="form-label">Fav Icon</label>
                                    @component('common-components.dropzone', [
                                    'inputName' => 'fav_icon',
                                    'existingFiles' => $setting->fav_icon ? [asset($setting->fav_icon)] : [],
                                    'acceptedFiles' => 'image/*',
                                    'maxFiles' => 1,
                                    'maxFileSize' => 2
                                    ]) @endcomponent
                                    @error('fav_icon')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!-- Phone -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="phone" class="form-label">Phone</label>
                                    <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone', $setting->phone) }}" maxlength="255">
                                    @error('phone')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Email -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $setting->email) }}" maxlength="255">
                                    @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                           
                        </div>
                        <!-- Tax Settings Section -->
                        <h5 class="mt-4 mb-4">Tax Settings</h5>
                        <div class="row">
                             <!-- Tax Threshold -->
                             <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="tax_threshold" class="form-label">Apply Tax If Amount Exceeds</label>
                                    <input type="text" class="form-control @error('tax_threshold') is-invalid @enderror" id="tax_threshold" name="tax_threshold" value="{{ old('tax_threshold', $setting->tax_threshold) }}">
                                </div>
                                @error('tax_threshold')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <!-- Tax Percentage -->
                             <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="tax_percentage" class="form-label">Tax Percentage (%)</label>
                                    <input type="text" class="form-control @error('tax_percentage') is-invalid @enderror" id="tax_percentage" name="tax_percentage" value="{{ old('tax_percentage', $setting->tax_percentage) }}">
                                </div>
                                @error('tax_percentage')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            
                           
                        </div>

                        <!-- Email Settings Section -->
                        <h5 class="mt-4 mb-4">Email Settings</h5>

                        <div class="row">
                            <!-- SMTP Email -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="smtp_email" class="form-label">SMTP Email</label>
                                    <input type="email" class="form-control @error('smtp_email') is-invalid @enderror" id="smtp_email" name="smtp_email" value="{{ old('smtp_email', $setting->smtp_email) }}" maxlength="255">
                                    @error('smtp_email')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- SMTP Host -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="smtp_host" class="form-label">SMTP Host</label>
                                    <input type="text" class="form-control @error('smtp_host') is-invalid @enderror" id="smtp_host" name="smtp_host" value="{{ old('smtp_host', $setting->smtp_host) }}" maxlength="255">
                                    @error('smtp_host')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!-- SMTP Password -->
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="smtp_password" class="form-label">SMTP Password</label>
                                    <input type="password" class="form-control @error('smtp_password') is-invalid @enderror" id="smtp_password" name="smtp_password" placeholder="Leave blank to keep current password">
                                    @error('smtp_password')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- SMTP Port -->
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="smtp_port" class="form-label">SMTP Port</label>
                                    <input type="number" class="form-control @error('smtp_port') is-invalid @enderror" id="smtp_port" name="smtp_port" value="{{ old('smtp_port', $setting->smtp_port) }}">
                                    @error('smtp_port')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Encryption -->
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="encryption" class="form-label">Encryption</label>
                                    <select class="form-control @error('encryption') is-invalid @enderror" id="encryption" name="encryption">
                                        <option value="None" {{ old('encryption', $setting->encryption) == 'None' ? 'selected' : '' }}>None</option>
                                        <option value="SSL" {{ old('encryption', $setting->encryption) == 'SSL' ? 'selected' : '' }}>SSL</option>
                                        <option value="TLS" {{ old('encryption', $setting->encryption) == 'TLS' ? 'selected' : '' }}>TLS</option>
                                    </select>
                                    @error('encryption')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Notification Settings -->
                        <h5 class="mt-4 mb-4">Notification Settings</h5>
                        <div class="row">
                            <!-- Enable Push Notifications -->
                            <div class="col-md-6 ">
                                <div class="mb-3">
                                    <label for="enable_push_notifications" class="form-label">Enable Push Notifications</label>
                                    <div class="form-check form-switch">
                                        <input class="form-input" type="checkbox" id="enable_push_notifications" name="enable_push_notifications" value="1" onchange="toggleOnesignal(this)" {{ old('enable_push_notifications', $setting->enable_push_notifications) ? 'checked' : '' }}>
                                        <label class="form-label" for="enable_push_notifications">Enable Push Notifications</label>
                                    </div>
                                    @error('enable_push_notifications')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Enable Email Notifications -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="enable_email_notifications" class="form-label">Enable Email Notifications</label>
                                    <div class="form-check form-switch">
                                        <input class="form-input" type="checkbox" id="enable_email_notifications" value="1" name="enable_email_notifications" {{ old('enable_email_notifications', $setting->enable_email_notifications) ? 'checked' : '' }}>
                                        <label class="form-label" for="enable_email_notifications">Enable Email Notifications</label>
                                    </div>
                                    @error('enable_email_notifications')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                        </div>

                        <div class="row" id="onesignal_config" style="display: none;">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="onesignal_app_id" class="form-label">OneSignal APP ID</label>
                                    <input type="text" class="form-control @error('onesignal_app_id') is-invalid @enderror" id="onesignal_app_id" name="onesignal_app_id" value="{{ old('onesignal_app_id', $setting->onesignal_app_id) }}" maxlength="255">
                                    @error('onesignal_app_id')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="onesignal_api_key" class="form-label">OneSignal API Key</label>
                                    <input type="text" class="form-control @error('onesignal_api_key') is-invalid @enderror" id="onesignal_api_key" name="onesignal_api_key" value="{{ old('onesignal_api_key', $setting->onesignal_api_key) }}" maxlength="255">
                                    @error('onesignal_api_key')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Security Settings -->
                        <h5 class="mt-4 mb-4">Security Settings</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="enable_2fa" class="form-label">Enable Two-Factor Authentication (2FA)</label>
                                    <div class="form-check form-switch">
                                        <input class="form-input" type="checkbox" id="enable_2fa" name="enable_2fa" value="1"
                                            onchange="toggleTwoFa(this)"
                                            {{ old('enable_2fa', $setting->enable_2fa) ? 'checked' : '' }}>
                                        <label class="form-label" for="enable_2fa">Enable 2FA</label>
                                    </div>
                                    @error('enable_2fa')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6" id="2fa_for_users" style="display: none;">
                                <div class="mb-3">
                                    <label for="require_2fa_for_users" class="form-label">Require 2FA for All Users</label>
                                    <div class="form-check form-switch">
                                        <input class="form-input" type="checkbox" id="require_2fa_for_users" name="require_2fa_for_users" value="1"
                                            {{ old('require_2fa_for_users', $setting->require_2fa_for_users) ? 'checked' : '' }}>
                                        <label class="form-label" for="require_2fa_for_users">Mandatory for All Users</label>
                                    </div>
                                    @error('require_2fa_for_users')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Update Settings</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Function to toggle div based on checkbox state
    function toggleOnesignal(checkbox) {
        const onesignal_config = document.getElementById('onesignal_config');
        if (checkbox.checked) {
            onesignal_config.style.display = 'flex'; // Show div
        } else {
            onesignal_config.style.display = 'none'; // Hide div
        }
    }

    // Function to toggle div based on checkbox state
    function toggleTwoFa(checkbox) {
        const two_fa_for_users = document.getElementById('2fa_for_users');
        if (checkbox.checked) {
            two_fa_for_users.style.display = 'flex'; // Show div
        } else {
            two_fa_for_users.style.display = 'none'; // Hide div
        }
    }

    // On page load, check if the checkbox is checked and toggle div accordingly
    window.onload = function() {
        const toggleonesignal = document.getElementById('enable_push_notifications');
        toggleOnesignal(toggleonesignal); // Check the initial state of the checkbox

        const enable2faCheckbox = document.getElementById('enable_2fa');
        toggleTwoFa(enable2faCheckbox);
    };

    //Function to validate the tax percentage
    document.addEventListener('DOMContentLoaded', function() {
        const taxInput = document.getElementById('tax_percentage');

        taxInput.addEventListener('input', function() {
            let value = this.value.trim();

            if (value === '') return; // Allow empty while typing

            let num = parseFloat(value);

            if (!isNaN(num)) {
                if (num < 0) {
                    this.value = 0;
                } else if (num > 100) {
                    this.value = 100;
                }
            }
        });
    });
</script>
@endsection