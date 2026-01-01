<?php

namespace App\Http\Controllers;

use App\Services\AuthService;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Password;
use App\Http\Requests\ResetPasswordRequest;
use App\Http\Requests\ForgotPasswordRequest;
use Illuminate\View\View;
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
        $this->authService->login($request->login, $request->password, (bool) $request->boolean('remember'));
        return redirect()->intended(route('home'))->with('success', 'login berhasil');
    }

    public function logout()
    {
        $this->authService->logout();
        return redirect()->intended(route('home'))->with('success', 'anda telah logout');
    }

    public function forgotPassword()
    {
        return view('auth.forgot-password');
    }

    public function sendResetLinkPassword(ForgotPasswordRequest $request)
    {
        $email = $request->only('email');
        $status = $this->authService->sendResetLinkPassword($email);

        return $status === Password::ResetLinkSent
            ? back()->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    }

    public function resetPassword($token): View
    {
        return view('auth.reset-password', ['token' => $token]);
    }

    public function setNewPassword(ResetPasswordRequest $request)
    {
        $data = $request->only('email', 'password', 'password_confirmation', 'token');
        $status = $this->authService->setNewPassword($data);

        return $status === Password::PasswordReset
            ? redirect()->route('home')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }
}
