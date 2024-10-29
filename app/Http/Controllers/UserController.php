<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateUserProfileRequest;
use App\Models\Plan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function update(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $request->user_id,
        ]);

        $user = User::find($request->user_id);
        $user->full_name = $request->name;
        $user->email = $request->email;
        if ($request->wallet_address) {
            $user->wallet_address = $request->wallet_address;
        }
        $user->suspended = $request->status;
        $user->save();

        // Handle other updates like transactions, wallet, etc.
        // ...

        // Redirect or show a success message
        return redirect()->back()->with('success', 'User updated successfully.');
    }
    public function index(Request $request)
    {

        $users = User::with('referredBy')
        ->with(['currentPlan' => function ($query) {
            $query->withDefault(); // This ensures that a default empty model is returned if no currentPlan exists
        }])
        ->withCount(['transactions as total_deposit' => function ($query) {
            $query->where('operation', 'Deposit')
            ->where('status', 'Completed')
            ->select(DB::raw('IFNULL(SUM(amount), 0)'));
        }])
        ->withCount(['withdrawals as total_withdrawal' => function ($query) {
            $query->where('status', 'Completed')
            ->select(DB::raw('IFNULL(SUM(amount), 0)'));
        }])
        ->where('is_admin', 0)
        ->paginate(10);

        $plans = Plan::all();
            // dd($users);

        return view('dashboard.admin.users.list', compact('users', 'plans'));
    }


    function profile()  {
        $user = Auth::user();
        return view('dashboard.admin.settings.profile', compact('user'));
    }

    function userProfile() {
        $user =User::where('id', Auth::user()->id)->with('referrals')->first();
        // dd($user);
        return view('dashboard.user.profile', compact('user'));
        
    }


    public function unlinkReferral(Request $request)
    {
        $userId = $request->input('user_id');

        // Find the user by ID and set the referred_by field to null
        $user = User::find($userId);
        if ($user) {
            $user->referred_by = null;
            $user->save();

            return response()->json(['message' => 'Referral unlinked successfully'], 200);
        } else {
            return response()->json(['message' => 'User not found'], 404);
        }
    }

    public function deleteUser(Request $request)
    {
        $userId = $request->input('id');

        // Find the user by ID and delete
        $user = User::find($userId);
        if ($user) {
            $user->delete();

            return redirect()->back()->with('message', 'User deleted successfully!');
        } else {
            return redirect()->back()->with('message', 'Failed to delete user.');
        }
    }

    public function updateProfile(UpdateUserProfileRequest $request, $id)
    {
        // Find the user by ID
        $user = User::findOrFail($id);

        // Update user information
        $user->full_name = $request->full_name;
        $user->email = $request->email;

        // Update password if provided
        if ($request->filled('password')) {
            $user->password = bcrypt($request->password); // Hash the password
        }

        // Save changes to the database
        $user->save();

        // Redirect or return a success response
        return redirect()->back()->with('success', 'Profile updated successfully.');
    }

    public function userUpdateProfile(Request $request)
    {
        // dd('here');
        // Find the user by ID
        $user = User::findOrFail($request->user_id);

        // Update user information
        if ($user) {
            $user->full_name = $request->full_name;
            $user->email = $request->email;
            $user->wallet_address = $request->address;
            $user->referral_code = $request->code;
            // Update password if provided
            if ($request->filled('password')) {
                $user->password = bcrypt($request->password); // Hash the password
            }

            // Save changes to the database
            $user->save();

            // Redirect or return a success response
            return redirect()->back()->with('success', 'Profile updated successfully.');
        }
        return redirect()->back()->with('error', 'Profile not updated.');

       
    }

    function admin()  {

        $admins = User::where('is_admin', 1)->paginate(5);
        return view('dashboard.admin.users.admin', compact('admins'));
        
        
    }
    function createAdmin(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|password|min:4'
        ]);

        $user = new User();

        // Update user information
        $user->full_name = $request->name;
        $user->email = $request->email;
        $user->is_admin = 1;


        // Update password if provided
        if ($request->filled('password')) {
            $user->password = bcrypt($request->password); // Hash the password
        }

        // Save changes to the database
        $user->save();
        return redirect()->back()->with('success', 'Profile updated successfully.');
    }
}