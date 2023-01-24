<?php

declare(strict_types=1);

namespace App\Service\User;

use App\Repository\UserRepository;
use App\Service\Password\EncoderService;

class UserReadService
{
    private UserRepository $userRepository;
    private EncoderService $encoderService;

    public function __construct(
        UserRepository $userRepository,
        EncoderService $encoderService
    ) {
        $this->userRepository = $userRepository;
        $this->encoderService = $encoderService;
    }

    public  function getAll(): array
    {
        return $this->userRepository->getAll();
    }
}