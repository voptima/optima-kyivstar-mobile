<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\LoginLog;

class UsersController extends Controller
{
    public function index(Request $request)
    {
        $query = User::query();
        if ($s = $request->input('s')) {
            $query->where(function($q) use ($s) {
                $q->where('surname', 'like', "%$s%")
                  ->orWhere('name', 'like', "%$s%")
                  ->orWhere('patronymic', 'like', "%$s%")
                  ->orWhere('phone', 'like', "%$s%");
            });
        }
        $users = $query->paginate(20);
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.form');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'surname' => 'required',
            'name' => 'required',
            'patronymic' => 'nullable',
            'phone' => 'required|unique:users',
            'class' => 'nullable',
        ]);
        User::create($data + ['active' => true, 'session_expires_at' => now()->addYear()]);
        return redirect()->route('users.index');
    }

    public function edit(User $user)
    {
        return view('admin.users.form', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'surname' => 'required',
            'name' => 'required',
            'patronymic' => 'nullable',
            'phone' => 'required|unique:users,phone,' . $user->id,
            'class' => 'nullable',
            'active' => 'boolean'
        ]);
        $user->update($data);
        return redirect()->route('users.index');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index');
    }

    public function logs(Request $request)
    {
        $logs = LoginLog::with(['user', 'admin'])
            ->when($request->filled('successful'), function($q) use ($request) {
                $q->where('successful', $request->successful);
            })
            ->when($request->filled('user_id'), function($q) use ($request) {
                $q->where('user_id', $request->user_id);
            })
            ->when($request->filled('admin_id'), function($q) use ($request) {
                $q->where('admin_id', $request->admin_id);
            })
            ->when($request->filled('date'), function($q) use ($request) {
                $q->whereDate('created_at', $request->date);
            })
            ->paginate(20);
        return view('admin.users.logs', compact('logs'));
    }
}
