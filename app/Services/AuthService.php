<?php
declare(strict_types=1);
namespace App\Services;
use App\Models\User;
use App\Repositories\AuthInterface;
class AuthService
{
    protected AuthInterface $authRepository;
    public function __construct(AuthInterface $authRepository)
    {
        $this->authRepository = $authRepository;
    }

    public function register(array $data): User
    {
        return $this->authRepository->register($data);
    }

}
