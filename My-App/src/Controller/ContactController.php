<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use App\Manager\ContactManager;
use App\Repository\ContactRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/contacts', requirements: ['id' => '[1-9]\d*'])]
class ContactController extends AbstractController
{
//    protected ContactRepository $repository;
//
//    public function __construct(ContactRepository $repository)
//    {
//        $this->repository = $repository;
//    }

    public function __construct(protected ContactManager $manager)
    {
    }

    #[Route(methods: ['GET'])]
    public function index(): Response
    {

        // $this->container->get('App\Repository\ContactRepository')
        /** @var Contact[] $contacts */
        //$contacts = $this->repository->findBy([], limit: 100);
//        $contacts = [
//            (new Contact())->setId(1)->setName('John Doe')->setEmail('john@doe.com'),
//            (new Contact())->setId(2)->setName('Eric Martin')->setEmail('eric.martin@gmail.com'),
//        ];

        return $this->render('contact/index.html.twig', [
            'contacts' => $this->manager->getAll(),
        ]);
    }

    #[Route('/{id}', methods: ['GET'])]
    public function show(int $id): Response
    {
        //$repo = $this->getDoctrine()->getRepository(Contact::class);
        //$contact = $this->repository->find($id);
        // $contact = (new Contact())->setId($id)->setName('John Doe')->setEmail('john@doe.com');
        $contact = $this->manager->getById($id);

        return $this->render('contact/show.html.twig', [
            'contact' => $contact,
        ]);
    }

    #[Route('/add', methods: ['GET', 'POST'])]
    public function create(Request $request): Response
    {
        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $contact = $form->getData();

            $this->manager->save($contact);
            $this->addFlash('success', 'Contact cr????');

            return $this->redirectToRoute('app_contact_index');
        }

        return $this->renderForm('contact/create.html.twig', [
            'contactForm' => $form,
        ]);
    }

    #[Route('/{id}/delete', methods: ['GET', 'POST'])]
    public function delete(int $id, Request $request): Response
    {
        $contact = $this->manager->getById($id);

        if (!$contact) {
            throw $this->createNotFoundException('Contact not found');
        }

        if ($request->isMethod('post')) {
            if ($request->request->get('confirm') === 'oui') {
                $this->manager->delete($contact);
                $this->addFlash('success', 'Le contact ' . $contact->getName() . ' a ??t?? supprim??');
            }

            return $this->redirectToRoute('app_contact_index');
        }
        //$repo = $this->getDoctrine()->getRepository(Contact::class);

        // $contact = (new Contact())->setId($id)->setName('John Doe')->setEmail('john@doe.com');

        return $this->render('contact/delete.html.twig', [
            'contact' => $contact,
        ]);
    }

    #[Route('/{id}/update', methods: ['GET', 'POST'])]
    public function update(int $id, Request $request): Response
    {
        $contact = $this->manager->getById($id);
        $contactForm = $this->createForm(ContactType::class, $contact);
        $contactForm->handleRequest($request);

        if ($contactForm->isSubmitted() && $contactForm->isValid()) {
            $this->manager->save($contact);
            $this->addFlash('success', 'Le contact ' . $contact->getName() . ' a ??t?? modifi??');
            return $this->redirectToRoute('app_contact_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('contact/update.html.twig', [
            'contactForm' => $contactForm,
        ]);
    }
}
