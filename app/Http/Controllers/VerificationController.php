<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use SweetAlert2\Laravel\Swal;

class VerificationController extends Controller
{
    public function notice(): View
    {
        return view('auth.verify');
    }

    public function getAlertMessage($title, $text){
        Swal::toastSuccess([
            'title' => $title,
            'text' => $text,
        ]);
    }

    public function verify(EmailVerificationRequest $request): RedirectResponse
    {
        $request->fulfill();
        Auth::logout();
        $request->session()->regenerateToken();
        $this->getAlertMessage('Notifikasi',
        'Email Anda sudah terverifikasi. Silahkan login');
        return redirect()->route('home');
    }

    public function resend(Request $request): RedirectResponse
    {
        $request->user()->sendEmailVerificationNotification();
        return back()->with('success', 'Link verifikasi baru telah dikirimkan ke email Anda.');
    }
}
