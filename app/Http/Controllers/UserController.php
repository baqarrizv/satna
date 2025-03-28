<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use App\Services\EventNotificationService;
use Spatie\Activitylog\Models\Activity;
use App\Services\FileUploadService;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    protected $fileUploadService;

    /**
     * Constructor to inject the FileUploadService.
     *
     * @param FileUploadService $fileUploadService
     */
    public function __construct(FileUploadService $fileUploadService)
    {
        // Injecting FileUploadService for handling file uploads.
        $this->fileUploadService = $fileUploadService;
    }
    
    /**
     * Display a listing of users.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Eager load the roles to reduce queries
        $users = User::with('roles')->get();

        // Return the view to display the list of users
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new user.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Retrieve all roles from the database
        $roles = Role::all();

        // Return the view to show the create user form
        return view('users.create', compact('roles'));
    }

    /**
     * Store a newly created user in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the request inputs, including the role, to ensure the data is correct
        $request->validate([
            'name' => 'required|max:255', // Name is required and should not exceed 255 characters
            'email' => 'required|email|unique:users', // Email must be unique in the users table
            'password' => 'required|min:6|confirmed', // Password must be at least 6 characters and confirmed
            'role' => 'required|string|exists:roles,name', // Ensure a valid role name exists in the roles table
        ]);

        // Create a new user instance and hash the password
        $user = User::create([
            'name' => $request->name, 
            'email' => $request->email, 
            'password' => Hash::make($request->password), // Securely hash the password
        ]);

        // Sync the role to ensure only one role is assigned, replacing any previous roles
        $user->syncRoles([$request->role]);
        
        // Trigger notification for the "New User Created" event
        EventNotificationService::notifyEventByName('New User Created');

        // Redirect back to the user list with a success message
        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    /**
     * Show the form for editing the specified user.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        // Retrieve all roles to display in the form
        $roles = Role::all();

        // Get the first role assigned to the user, or an empty string if no role exists
        $userRole = $user->roles->first()->name ?? '';

        // Return the view with the user data and roles to edit
        return view('users.edit', compact('user', 'roles', 'userRole'));
    }

    /**
     * Update the specified user in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        // Validate the updated user data
        $request->validate([
            'name' => 'required|max:255', // Name is required and should not exceed 255 characters
            'email' => 'required|email|unique:users,email,' . $user->id, // Email must be unique, ignoring the current user
            'role' => 'required|string|exists:roles,name', // Ensure the role exists in the roles table
        ]);

        // Update the user's name and email
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        // Check if the password field is filled, and if so, validate and update it
        if ($request->filled('password')) {
            $request->validate([
                'password' => 'required|min:6|confirmed', // Password must be at least 6 characters and confirmed
            ]);

            // Update the user's password after hashing it
            $user->update(['password' => Hash::make($request->password)]);
        }

        // Sync the role to ensure only the selected role is assigned, replacing any previous roles
        $user->syncRoles([$request->role]);

        // Trigger notification for the "User Modified" event
        EventNotificationService::notifyEventByName('User Modified');

        // Redirect back to the user list with a success message
        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    /**
     * Remove the specified user from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        // Delete the user from the database
        $user->delete();

        // Redirect back to the user list with a success message
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }

    /**
     * Toggle the active status of the specified user.
     *
     * @param  \Illuminate\Http\Request  $request  The incoming HTTP request containing the 'is_active' status
     * @param  \App\Models\User  $user  The user instance whose status will be toggled
     * @return \Illuminate\Http\JsonResponse  A JSON response with a 'success' status indicating the result of the update
     */
    public function toggleStatus(Request $request, User $user)
    {
        // Validate the incoming request to ensure 'is_active' is present and boolean
        $request->validate([
            'is_active' => 'required|boolean',
        ]);

        // Update the user's active status with the passed value
        $user->update(['is_active' => $request->is_active]);

        // Return a JSON response with success status
        return response()->json(['success' => true]);
    }

    /**
     * Display the profile page for the currently authenticated user.
     *
     * @return \Illuminate\View\View  The profile view showing user information
     */
    public function showProfile()
    {
        // Optionally, you can pass user data to the view
        $user = auth()->user();
        $user->image = isset($user->image) ? Storage::url($user->image) : null;
        
        $notificationsList = $user->notifications()->get();
        $activities = Activity::where('causer_id', $user->id)->latest()->paginate(10);

        // Return the view for the profile page
        return view('users.profile', compact('user','notificationsList','activities'));
    }

     /**
     * Update the user profile.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function updateProfile(Request $request, User $user)
    {
        // Validate the updated user data
        $request->validate([
            'name' => 'required|max:255', // Name is required and should not exceed 255 characters
            'email' => 'required|email|unique:users,email,' . $user->id, 
            'image' => 'nullable|string|max:255',// Email must be unique, ignoring the current user
        ]);

        $newimage = $this->fileUploadService->handleFileUpdate($request->image, $user->image, 'user');

        // Update the user's name and email
        $res = $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'image' => $newimage,
        ]);

        // Check if the password field is filled, and if so, validate and update it
        if ($request->filled('password')) {
            $request->validate([
                'password' => 'required|min:6|confirmed', // Password must be at least 6 characters and confirmed
            ]);

            // Update the user's password after hashing it
            $user->update(['password' => Hash::make($request->password)]);
        }

        // Trigger notification for the "User Modified" event
        EventNotificationService::notifyEventByName('User Modified');

        // Redirect back to the user list with a success message
        return redirect()->route('profile')->with('success', 'Profile updated successfully.');
    }

    public function storeFcmToken(Request $request)
    {
        $request->validate(['token' => 'required|string']);
        
        $user = auth()->user();
        $user->fcm_token = $request->token;
        $user->save();

        return response()->json(['message' => 'Token stored successfully.']);
    }
    
    /**
     * Remove the FCM token for the authenticated user.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function removeFcmToken(Request $request)
    {
        // Validate the request to ensure the token is provided
        $request->validate([
            'token' => 'required|string',
        ]);

        // Assuming you want to remove the token for the authenticated user
        $user = Auth::user();

        // Remove the FCM token from the user
        if ($user && $user->fcm_token === $request->token) {
            $user->fcm_token = null;
            $user->save();

            return response()->json(['message' => 'FCM token removed successfully.'], 200);
        }

        return response()->json(['error' => 'Token not found or does not belong to the user.'], 404);
    }
}
