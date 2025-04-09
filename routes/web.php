<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LockScreenController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\TempFileUploadController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EventSubscriptionController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ActivityLogController;
use App\Http\Controllers\TwoFactorController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ReportController;
use App\Services\FileUploadService;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes(); // Auth routes for login, registration, password reset, etc.

Route::group(['middleware' => ['auth', 'enforce2fa']], function () {       
    // Route for the home page, handled by HomeController's index method 
    Route::get('/', [HomeController::class, 'index'])->name('home');
    
    // Route for viewing notifications, handled by NotificationController's index method
    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');

    // Route to lock the user session and redirect to lock screen
    Route::get('/lock', function () {
        session(['is_locked' => true]); // Set session as locked
        return redirect()->route('lock-screen'); // Redirect to lock screen
    })->name('lock');

    // Route to display the lock screen, handled by LockScreenController
    Route::get('/lock-screen', [LockScreenController::class, 'showLockScreen'])->name('lock-screen');

    // Route to unlock the session after user authentication
    Route::post('/unlock', [LockScreenController::class, 'unlock'])->name('unlock');

    // Route for editing settings, with permission check for 'Modify Settings'
    Route::get('/settings/edit', [SettingController::class, 'edit'])
        ->name('settings.edit')
        ->middleware('can:Modify Settings'); // Ensure user has 'Modify Settings' permission

    // Route for updating settings, with permission check for 'Modify Settings'
    Route::put('/settings/update', [SettingController::class, 'update'])
        ->name('settings.update')
        ->middleware('can:Modify Settings'); // Ensure user has 'Modify Settings' permission

    // Route for temporary file uploads, no specific permission check required
    Route::post('/temp-upload', [TempFileUploadController::class, 'uploadFiles'])->name('temp-upload');

    // Resourceful routes for viewing roles (index and show), with 'View Roles' permission
    Route::resource('roles', RoleController::class)
        ->only(['index', 'create'])
        ->middleware('can:View Roles');

    // Resourceful routes for managing roles (create, store, edit, update, destroy), with 'Modify Roles' permission
    Route::resource('roles', RoleController::class)
        ->only(['create', 'store', 'edit', 'update', 'destroy'])
        ->middleware('can:Modify Roles');

    // Resourceful routes for viewing users (index), with 'View Users' permission
    Route::resource('users', UserController::class)
        ->only(['index'])
        ->middleware('can:View Users');

    // Resourceful routes for managing users (create, store, edit, update, destroy), with 'Modify Users' permission
    Route::resource('users', UserController::class)
        ->only(['create', 'store', 'edit', 'update', 'destroy'])
        ->middleware('can:Modify Users');

    // Route to toggle a user's status, requires 'Modify User Status' permission
    Route::patch('users/{user}/toggle-status', [UserController::class, 'toggleStatus'])
        ->name('users.toggleStatus')
        ->middleware('can:Modify User Status'); // Ensure user has 'Modify User Status' permission

    // Route to display activity logs, no permission check required
    Route::get('/activity-logs', [ActivityLogController::class, 'index'])->name('activity.logs.index');

    // Route to show the current user's profile
    Route::get('profile', [UserController::class, 'showProfile'])->name('profile');
    // Route to update the current user's profile
    Route::put('profile/{user}', [UserController::class, 'updateProfile'])->name('profile.update');

    // Route to store Firebase Cloud Messaging (FCM) token for notifications
    Route::post('/user/store-fcm-token', [UserController::class, 'storeFcmToken'])->name('user.store.fcm.token');
    
    // Route to remove FCM token for notifications
    Route::post('/remove-fcm-token', [UserController::class, 'removeFcmToken'])->name('user.remove.fcm.token');

    // Routes for event subscription management
    Route::get('/subscriptions', [EventSubscriptionController::class, 'show'])->name('subscriptions.show');
    Route::put('/subscriptions', [EventSubscriptionController::class, 'update'])->name('subscriptions.update');

    // Routes for notification management: marking a single notification as read or all notifications
    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');
    Route::get('/notifications/read/{id}', [NotificationController::class, 'markAsRead'])->name('notifications.read');
    Route::get('/notifications/mark-all-as-read', [NotificationController::class, 'markAllAsRead'])->name('notifications.markAllAsRead');
    
    Route::resource('departments', DepartmentController::class)    
    ->only(['index'])
    ->middleware('can:View Department');

    Route::resource('departments', DepartmentController::class)    
    ->only(['create', 'store'])
    ->middleware('can:Create Department');
    
    Route::resource('departments', DepartmentController::class)    
    ->only(['edit', 'update'])
    ->middleware('can:Edit Department');
    
    Route::resource('departments', DepartmentController::class)    
    ->only(['destroy'])
    ->middleware('can:Delete Department');

    // View Services
    Route::resource('services', ServiceController::class)
        ->only(['index'])
        ->middleware('can:View Service');

    // Create Services
    Route::resource('services', ServiceController::class)
        ->only(['create', 'store'])
        ->middleware('can:Create Service');

    // Edit Services
    Route::resource('services', ServiceController::class)
        ->only(['edit', 'update'])
        ->middleware('can:Edit Service');

    // Delete Services
    Route::resource('services', ServiceController::class)
        ->only(['destroy'])
        ->middleware('can:Delete Service');

    Route::resource('doctors', DoctorController::class)
        ->only(['index'])
        ->middleware('can:View Doctor');

    Route::resource('doctors', DoctorController::class)
        ->only(['create', 'store'])
        ->middleware('can:Create Doctor');

    Route::resource('doctors', DoctorController::class)
        ->only(['edit', 'update'])
        ->middleware('can:Edit Doctor');

    Route::resource('doctors', DoctorController::class)
        ->only(['destroy'])
        ->middleware('can:Delete Doctor');

    Route::patch('doctor/{doctor}/toggle-status', [DoctorController::class, 'toggleStatus'])
        ->name('doctors.toggleStatus')
        ->middleware('can:Modify Doctor Status'); 

    Route::resource('patients', PatientController::class)
        ->only(['index'])
        ->middleware('can:View Patients');

    Route::resource('patients', PatientController::class)
        ->only(['create', 'store'])
        ->middleware('can:Create Patients');

    Route::resource('patients', PatientController::class)
        ->only(['edit', 'update'])
        ->middleware('can:Edit Patients');

    Route::resource('patients', PatientController::class)
        ->only(['destroy'])
        ->middleware('can:Delete Patients');

    Route::resource('payments', PaymentController::class)
        ->only(['index'])
        ->middleware('can:View Payments');

    Route::match(['get', 'post'], 'payments/addCharges', [PaymentController::class, 'addCharges'])
        ->name('payments.addCharges')
        ->middleware('can:Add Charges'); 

    Route::match(['get', 'post'], 'payments/applyCharges', [PaymentController::class, 'applyCharges'])
        ->name('payments.applyCharges')
        ->middleware('can:Add Charges');    
        
    Route::match(['get', 'post'], 'payments/dailyClosing', [PaymentController::class, 'dailyClosing'])
        ->name('payments.dailyClosing')
        ->middleware('can:Daily Closing');    
    
    Route::put('payments/{payment}/refund', [PaymentController::class, 'refund'])
        ->name('payments.refund')
        ->middleware('can:Refund Payments');  

    Route::get('payments/{payment}/invoice', [PaymentController::class, 'generateInvoice'])
        ->name('payments.invoice')
        ->middleware('can:View Payments');

    Route::get('/services/by-department/{department}', [PaymentController::class, 'getServicesByDepartment'])
        ->name('services.byDepartment')
        ->middleware('can:View Service');
    
    Route::get('reports/daily-collection', [ReportController::class, 'dailyCollectionReportForm'])
        ->name('reports.dailyCollection')
        ->middleware('can:View Reports');

    Route::get('reports/daily-collection/generate', [ReportController::class, 'generateDailyCollectionReport'])
        ->name('reports.dailyCollection.generate')
        ->middleware('can:View Reports');

    Route::get('/reports/doctor-daily', [ReportController::class, 'doctorDailyReportForm'])
        ->name('reports.doctorDaily')
        ->middleware('can:View Doctor Daily Report');

    Route::get('/reports/doctor-daily/generate', [ReportController::class, 'generateDoctorDailyReport'])
        ->name('reports.doctorDaily.generate')
        ->middleware('can:View Doctor Daily Report');
});

// Route for the offline page (PWA related), no authentication required
Route::get('/offline', function () {
    return view('modules/laravelpwa/offline');
});

// Group routes that require user authentication
Route::middleware('auth')->group(function () {

     // Routes for setting up two-factor authentication (2FA)
     Route::get('/2fa/setup', [TwoFactorController::class, 'showSetupForm'])->name('2fa.setup');
     Route::post('/2fa/enable', [TwoFactorController::class, 'enableGoogle2FA'])->name('2fa.enable');
     Route::post('/2fa/disable', [TwoFactorController::class, 'disableGoogle2FA'])->name('2fa.disable');
     Route::post('/2fa/email/enable', [TwoFactorController::class, 'enableEmail2FA'])->name('2fa.email.enable');
     Route::post('/2fa/email/disable', [TwoFactorController::class, 'disableEmail2FA'])->name('2fa.email.disable');
 
     // Route for 2FA challenge after login
     Route::get('/2fa/challenge', [TwoFactorController::class, 'showChallengeForm'])->name('2fa.challenge');
     Route::post('/2fa/verify', [TwoFactorController::class, 'verify2FA'])->name('2fa.verify');
});
// Test route for file upload service - REMOVE AFTER TESTING
Route::get('/test-file-upload-service', function (FileUploadService $fileUploadService) {
    // Test with null and empty values
    $result1 = $fileUploadService->handleFileUpdate(null, 'assets/uploads/test/test.jpg', 'test');
    $result2 = $fileUploadService->handleFileUpdate('', 'assets/uploads/test/test2.jpg', 'test');
    $result3 = $fileUploadService->handleFileUpdate('null', 'assets/uploads/test/test3.jpg', 'test');
    
    return [
        'result1' => $result1,
        'result2' => $result2,
        'result3' => $result3,
    ];
});

