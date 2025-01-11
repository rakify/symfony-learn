<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class ProductService
{
    private $httpClient;

    public function __construct(HttpClientInterface $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    public function getProducts(): array
    {
        $response = $this->httpClient->request(
            'GET',
            'https://fakestoreapi.com/products'
        );

        $data = $response->getContent();

        return json_decode($data, true);
    }
}
