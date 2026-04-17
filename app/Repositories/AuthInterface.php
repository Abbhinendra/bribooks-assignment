<?php
declare(strict_types=1);
namespace App\Repositories;
use App\Models\User;
interface AuthInterface
{
    public function register(array $data): User;
}
