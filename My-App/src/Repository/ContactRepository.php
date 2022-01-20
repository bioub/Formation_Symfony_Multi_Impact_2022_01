<?php

namespace App\Repository;

use App\Entity\Contact;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query;
use Doctrine\ORM\Query\Expr\Join;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Contact|null find($id, $lockMode = null, $lockVersion = null)
 * @method Contact|null findOneBy(array $criteria, array $orderBy = null)
 * @method Contact[]    findAll()
 * @method Contact[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ContactRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Contact::class);
    }

//    public function findWithSociete(int|string $id)
//    {
//        return $this->createQueryBuilder('c')
//            ->select('c, s, g')
//            ->leftJoin('c.societe', 's')
//            ->leftJoin('c.groupes', 'g')
//            ->where('c.id = :id')
//            ->setParameter('id', $id)
//            ->getQuery()
//            ->getSingleResult(Query::HYDRATE_OBJECT);
//    }

    public function findWithSociete(int|string $id)
    {
        $dql = 'SELECT c, s, g FROM App\Entity\Contact c LEFT JOIN c.societe s LEFT JOIN c.groupes g WHERE c.id = :id';

        return $this->_em->createQuery($dql)->setParameter('id', $id)
            ->getSingleResult();
    }

    // /**
    //  * @return Camion[] Returns an array of Camion objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Camion
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
