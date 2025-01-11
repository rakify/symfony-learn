<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class UserService
{
    private $httpClient;

    public function __construct(HttpClientInterface $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    public function getUsers(): array
    {
        $response = $this->httpClient->request(
            'GET',
            'https://jsonplaceholder.typicode.com/users'
        );

        $data = $response->getContent();

        return json_decode($data, true);
    }
}
