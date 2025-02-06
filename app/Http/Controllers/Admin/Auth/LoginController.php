<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminLoginRequest;
use App\Models\User;

class LoginController extends Controller
{
    public function index()
    {
        return view('admin.auth.login');
    }

    public function store(AdminLoginRequest $request)
    {

        $request->validated();

        if (! auth()->attempt($request->only('email', 'password'))) {
            return back()->with('error', 'Invalid login details');
        }

        return redirect()->route('admin.dashboard');
    }

    public function destroy()
    {
        auth()->logout();

        session()->regenerate();
        session()->regenerateToken();
        session()->flush();

        return redirect()->route('admin.login');
    }

    public function createTestAdmin()
    {
        if (User::query()->where('email', 'admin@admin.com')->first()) {
            return redirect()->route('admin.login');
        }

        User::query()->create([
            'name' => 'AdminTest',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);

        return response('Test admin created', 201);
    }
}
