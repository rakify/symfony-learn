<?php

namespace App\Controller;

use App\Service\ProductService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ProductController extends AbstractController
{
    #[Route('/products', name: 'app_products')]
    public function showProducts(ProductService $dataService): Response
    {
        $products = $dataService->getProducts();

        return $this->render('product/index.html.twig', [
            'products' => $products,
        ]);
    }
}
