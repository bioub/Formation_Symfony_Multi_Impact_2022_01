<?php

namespace App\Controller;

use App\Entity\Contact;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/contacts', requirements: ['id' => '[1-9]\d*'])]
class ContactController extends AbstractController
{
    #[Route(methods: ['GET'])]
    public function index(): Response
    {
        /** @var Contact[] $contacts */
        $contacts = [
            (new Contact())->setId(1)->setName('John Doe')->setEmail('john@doe.com'),
            (new Contact())->setId(2)->setName('Eric Martin')->setEmail('eric.martin@gmail.com'),
        ];

        return $this->render('contact/index.html.twig', [
            'contacts' => $contacts,
        ]);
    }

    #[Route('/{id}', methods: ['GET'])]
    public function show(int $id): Response
    {
        $contact = (new Contact())->setId($id)->setName('John Doe')->setEmail('john@doe.com');

        return $this->render('contact/show.html.twig', [
            'contact' => $contact,
        ]);
    }

    #[Route('/add', methods: ['GET', 'POST'])]
    public function create(): Response
    {
        return $this->render('contact/create.html.twig', [
            'controller_name' => 'ContactController',
        ]);
    }

    #[Route('/{id}/delete', methods: ['GET', 'POST'])]
    public function delete(int $id): Response
    {
        $contact = (new Contact())->setId($id)->setName('John Doe')->setEmail('john@doe.com');

        return $this->render('contact/delete.html.twig', [
            'contact' => $contact,
        ]);
    }

    #[Route('/{id}/update', methods: ['GET', 'POST'])]
    public function update(int $id): Response
    {
        return $this->render('contact/update.html.twig', [
            'controller_name' => 'ContactController',
        ]);
    }
}
