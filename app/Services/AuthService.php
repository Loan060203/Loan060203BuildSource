<?php

namespace App\Services;

use App\Repositories\AuthRepository;
use App\Repositories\CompanyBranch\CompanyBranchRepository;

class AuthService
{
    protected AuthRepository $authRepository;

    public function __construct(AuthRepository $authRepository)
    {
        $this->authRepository = $authRepository;
    }

    public function register(array $data)
    {
        return $this->authRepository->register($data);
    }
}
