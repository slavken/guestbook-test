<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LoginRequest;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        $group = 'admin';

        if (!Auth::attempt($request->validated()))
            return back()
                ->withErrors('Неверный email или пароль');

        if (!Gate::allows($group)) {
            Auth::logout();

            return back()
                ->withErrors('Пользователь не входит в группу: ' . $group);
        }

        return redirect()
            ->route('admin.home');
    }

    public function logout(Request $request, UserService $service)
    {
        $service->logout($request);

        return redirect()
            ->route('home');
    }
}
