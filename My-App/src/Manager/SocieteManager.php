<?php

namespace App\Manager;

use App\Repository\SocieteRepository;
use Psr\Log\LoggerInterface;

class SocieteManager
{

    public function __construct(
        protected SocieteRepository $repository,
        protected LoggerInterface $logger,
    ) {}

//    protected SocieteRepository $repository;
//    protected LoggerInterface $logger;
//
//    public function __construct(SocieteRepository $repository, )
//    {
//        $this->repository = $repository;
//    }

    public function getAll()
    {
        $this->logger->debug('call SocieteManager::getAll');
        return $this->repository->findBy([], limit: 100);
    }

    public function getById(int|string $id)
    {
        $this->logger->debug('call SocieteManager::getById');
        return $this->repository->find($id);
    }

}