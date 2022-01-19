<?php

namespace App\Controller;

use App\Entity\Societe;
use App\Form\SocieteType;
use App\Manager\SocieteManager;
use App\Repository\SocieteRepository;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/societes')]
class SocieteController extends AbstractController
{


    #[Route('/', name: 'societe_index', methods: ['GET'])]
    public function index(SocieteManager $manager): Response
    {
        return $this->render('societe/index.html.twig', [
            'societes' => $manager->getAll(),
        ]);
    }

    #[Route('/new', name: 'societe_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $societe = new Societe();
        $form = $this->createForm(SocieteType::class, $societe);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($societe);
            $entityManager->flush();

            return $this->redirectToRoute('societe_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('societe/new.html.twig', [
            'societe' => $societe,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'societe_show', methods: ['GET'])]
    public function show(int $id, SocieteManager $manager): Response
    {
        return $this->render('societe/show.html.twig', [
            'societe' => $manager->getById($id),
        ]);
    }

    #[Route('/{id}/edit', name: 'societe_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Societe $societe, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(SocieteType::class, $societe);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('societe_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('societe/edit.html.twig', [
            'societe' => $societe,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'societe_delete', methods: ['POST'])]
    public function delete(Request $request, Societe $societe, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$societe->getId(), $request->request->get('_token'))) {
            $entityManager->remove($societe);
            $entityManager->flush();
        }

        return $this->redirectToRoute('societe_index', [], Response::HTTP_SEE_OTHER);
    }
}
