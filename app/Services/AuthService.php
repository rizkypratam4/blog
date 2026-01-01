<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use App\Repositories\EloquentUserRepository;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Validation\ValidationException;


class AuthService
{
    public function __construct(private EloquentUserRepository $users, private Guard $auth){}

    public function register(array $data): User
    {
        $userData = [
            'name' => $data['name'],
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ];

        $user = $this->users->create($userData);

        $this->auth->login($user);

        $user->sendEmailVerificationNotification();

        return $user;
    }

    public function login(string $login, string $password, bool $remember = false): ?User
    {
        $field = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        $user = $this->users->findByEmail($login, $field);

        if (!$user || !Auth::attempt([$field => $login, 'password' => $password], $remember)) {
             throw ValidationException::withMessages([
                "login" => ['Usename/Email atau password anda salah']
            ]);
        }
        
        return $this->auth->user();
    }

    public function logout(): void
    {
        $this->auth->logout();
    }

    public function sendResetLinkPassword(array $email)
    {
        $status = Password::sendResetLink($email);
        return $status;
    }

    public function setNewPassword(array $data)
    {
        $status = Password::reset($data, function (User $user, string $password) {
            $user->forceFill([
                'password' => Hash::make($password)
            ])->setRememberToken(Str::random(60));

            $user->save();

            event(new PasswordReset($user));
        });

        return $status;
    }
}
