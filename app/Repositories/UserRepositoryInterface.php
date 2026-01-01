<?php

namespace App\Repositories;

use App\Models\User;

interface UserRepositoryInterface
{
   public function findById(int $id): ?User;

   public function findByEmail(string $login, string $field): ?User;

   public function create(array $data): User;

}