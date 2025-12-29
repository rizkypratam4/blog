<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Hash;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Validation\ValidationException;


class AuthService
{
    public function __construct(private UserRepositoryInterface $users, private Guard $auth){}

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

    public function login(string $login, string $password, array $credentials, bool $remember = false): ?User
    {
        $type = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        $credentials = [
            $type => $login,
            'password' => $password
        ];

        if ($this->auth->attempt($credentials, $remember)) {
            return $this->auth->user();
        }

        throw ValidationException::withMessages([
            "email" => ['Email atau password anda salah']
        ]);
    }

    public function logout(): void
    {
        $this->auth->logout();
    }
}
