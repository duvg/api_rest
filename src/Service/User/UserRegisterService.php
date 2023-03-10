<?php

declare(strict_types=1);

namespace App\Service\User;

use App\Entity\User;
use App\Exception\User\UserAlreadyExistException;
use App\Repository\UserRepository;
use App\Service\Password\EncoderService;
use Doctrine\DBAL\Exception;

class UserRegisterService
{
    private UserRepository $userRepository;
    private EncoderService $encoderService;

    public function __construct(
        UserRepository $userRepository,
        EncoderService $encoderService
    )
    {
        $this->userRepository = $userRepository;
        $this->encoderService = $encoderService;
    }

    public function create(string $name, string $email, string $password): User
    {
        $user = new User($name, $email);
        $user->setPassword($this->encoderService->generateEncodedPassword($user, $password));

        try {
            $this->userRepository->save($user);

        } catch (Exception $exception) {
            throw UserAlreadyExistException::fromEmail($email);
        }

        return $user;
    }
}
