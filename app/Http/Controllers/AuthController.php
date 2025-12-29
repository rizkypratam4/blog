<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Services\AuthService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;

class AuthController extends Controller
{
    public function __construct(private AuthService $authService){}

    public function register(RegisterRequest $request): RedirectResponse
    {
        $this->authService->register($request->validated());
        return redirect()->route('verification.notice')
                         ->with('success', 'Registrasi berhasil. Silahkan verifikasi email anda')
                         ->with('email', $request->input('email'));
    }

    public function login(LoginRequest $request): RedirectResponse
    {
        $login = $request->input('email');
        $password = $request->password;
        $this->authService->login($login, $password, $request->validated(), (bool) $request->boolean('remember'));
        return redirect()->intended(route('home'))->with('success', 'login berhasil');
    }

    public function logout()
    {
        $this->authService->logout();
        return redirect()->intended(route('home'))->with('success', 'anda telah logout');
    }
}
