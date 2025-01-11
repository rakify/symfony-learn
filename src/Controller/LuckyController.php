<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class LuckyController extends AbstractController
{
    // #[Route('/')]
    // public function index(): Response
    // {
    //     $contents = $this->renderView('home/index.html.twig');
    //     return new Response(
    //         $contents
    //     );
    // }

    #[Route('/test1')]
    public function test1(): Response
    {
        return $this->render('home/index.html.twig');
    }

    #[Route('/lucky/number')]
    public function number(): Response
    {
        $lucky = 1;
        return new Response(
            '<html><body>Lucky number ' . $lucky . '</body></html>'
        );
    }
}