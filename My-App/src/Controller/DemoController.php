<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/demo')]
class DemoController extends AbstractController
{
    #[Route('/hello')]
    public function hello() {
        $res = new Response();
        $res->setStatusCode(200);
        $res->setContent('<b>Hello</b>');

        return $res;
    }

    #[Route('/hello/{name}', requirements: ['name' => '[a-zA-Z]+'])]
    public function helloName($name) {
        $res = new Response();
        $res->setStatusCode(200);
        $res->setContent("<b>Hello $name</b>");

        return $res;
    }

    #[Route('/bonjour')]
    public function bonjour() {
        /* $res = new Response();
        $res->setStatusCode(200);
        $res->headers->set('Content-type', 'application/json');
        $res->setContent(json_encode(['msg' => 'Bonjour']));

        return $res; */

        /* return new JsonResponse(['msg' => 'Bonjour']); */
        return $this->json(['msg' => 'Bonjour']);
    }

    #[Route('/error')]
    public function error() {
        throw new \Exception('Montant négatif');
    }
}