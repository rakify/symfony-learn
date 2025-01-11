<?php

namespace App\Controller;

use App\Service\UserService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class UserController extends AbstractController
{
    #[Route('/users', name: 'app_users')]
    public function index(UserService $dataService): Response
    {
        $users = $dataService->getUsers();

        return $this->render('user/index.html.twig', [
            'users' => $users,
        ]);
    }
}
