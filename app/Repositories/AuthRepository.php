<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Repositories\AuthInterface;
use App\Models\User;

class AuthRepository implements AuthInterface
{
    public function register(array $data): User
    {   // Note: Password hashing is handled by the User model using the 'hashed' cast
        // to ensure consistent and secure hashing across the application.
        return User::create($data);
    }

}
