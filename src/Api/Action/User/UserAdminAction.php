<?php

declare(strict_types=1);

namespace App\Api\Action\User;

use App\Service\Request\RequestService;
use App\Service\User\ReadUserService;
use App\Service\User\UserReadService;
use App\Service\User\UserRegisterService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/users")
 */
class UserAdminAction extends AbstractController
{
    private UserRegisterService $userRegisterService;
    private UserReadService $userReadService;

    public function __construct(UserRegisterService $userRegisterService, UserReadService $userReadService)
    {
        $this->userRegisterService = $userRegisterService;
        $this->userReadService = $userReadService;
    }

    /**
     * @param Request $request
     * @Route(path="/register", name="register", methods={"POST"})
     */
    public function register(Request $request): JsonResponse
    {
        $user = $this->userRegisterService->create(
            RequestService::getField($request, 'name'),
            RequestService::getField($request, 'email'),
            RequestService::getField($request, 'password'),
        );

        return $this->json($user);
    }

    /**
     * @Route(path="/list", name="list", methods={"GET"})
     */
    public function getAll()
    {
        $users = $this->userReadService->getAll();
        return $this->json($users);
    }
}
