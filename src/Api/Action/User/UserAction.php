<?php

declare(strict_types=1);

namespace App\Api\Action\User;

use App\Service\Request\RequestService;
use App\Service\User\UserRegisterService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class UserAction extends AbstractController
{
    private UserRegisterService $userRegisterService;

    public function __construct(UserRegisterService $userRegisterService )
    {
        $this->userRegisterService = $userRegisterService;
    }

    public function register(Request $request): JsonResponse
    {
        $user = $this->userRegisterService->create(
            RequestService::getField($request, 'name'),
            RequestService::getField($request, 'email'),
            RequestService::getField($request, 'password'),
        );

        return $this->json($user);
    }

    public function getAll()
    {
        $users = $this->userRegisterService->getAll();
        return $this->json($users);
    }
}
