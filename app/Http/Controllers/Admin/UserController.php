<?php

namespace App\Http\Controllers\Admin;

use App\Models\ActivityLog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends AdminController
{
    public function index()
    {
        $users = User::latest()->paginate(20);
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'      => 'required|string|max:255',
            'email'     => 'required|email|unique:users',
            'phone'     => 'nullable|string|max:20',
            'user_type' => 'required|in:super_admin,staff_admin,content_manager',
            'password'  => 'required|string|min:8|confirmed',
            'is_active' => 'boolean',
        ]);

        $data['password']  = Hash::make($data['password']);
        $data['is_active'] = $request->boolean('is_active', true);
        $user = User::create($data);
        ActivityLog::record('create', "Created user: {$user->email}", $user);

        return redirect()->route('admin.users.index')->with('success', 'User created.');
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'name'      => 'required|string|max:255',
            'email'     => 'required|email|unique:users,email,' . $user->id,
            'phone'     => 'nullable|string|max:20',
            'user_type' => 'required|in:super_admin,staff_admin,content_manager',
            'password'  => 'nullable|string|min:8|confirmed',
            'is_active' => 'boolean',
        ]);

        $data['is_active'] = $request->boolean('is_active', true);

        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }

        $user->update($data);
        ActivityLog::record('update', "Updated user: {$user->email}", $user);

        return redirect()->route('admin.users.index')->with('success', 'User updated.');
    }

    public function destroy(User $user)
    {
        if ($user->id === auth()->id()) {
            return back()->with('error', 'Cannot delete yourself.');
        }
        ActivityLog::record('delete', "Deleted user: {$user->email}", $user);
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'User deleted.');
    }

    public function activityLogs()
    {
        $logs = ActivityLog::with('user')->latest()->paginate(50);
        return view('admin.users.activity-logs', compact('logs'));
    }
}
