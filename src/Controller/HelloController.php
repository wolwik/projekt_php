<?php
/**
 * Hello Controller
 */

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

class HelloController {
    #[Route(
        '/hello/{name}',
        name: 'hello_index',
        requirements: ['name' => '[a-zA-Z]+'],
        defaults: ['name' => 'World'],
        methods: ['GET']
)]
public function index(string $name): Response {
        return new Response('Hello ' . $name . '!');
    }
}




