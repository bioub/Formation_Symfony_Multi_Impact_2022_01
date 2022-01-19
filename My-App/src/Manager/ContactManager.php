<?php

namespace App\Manager;

use App\Entity\Contact;
use App\Repository\ContactRepository;
use Doctrine\ORM\EntityManagerInterface;

class ContactManager
{
    protected ContactRepository $repository;
    protected EntityManagerInterface $manager;

    public function __construct(ContactRepository $repository, EntityManagerInterface $manager)
    {
        $this->repository = $repository;
        $this->manager = $manager;
    }

    public function getAll()
    {
        return $this->repository->findBy([], limit: 100);
    }

    public function getById(int|string $id)
    {
        return $this->repository->find($id);
    }

    public function delete(Contact $contact)
    {
        $this->manager->remove($contact);
        $this->manager->flush();
    }
}