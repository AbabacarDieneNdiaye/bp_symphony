<?php

namespace App\Repository;

use App\Entity\ClientPhysique;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Query\Expr;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ClientPhysique|null find($id, $lockMode = null, $lockVersion = null)
 * @method ClientPhysique|null findOneBy(array $criteria, array $orderBy = null)
 * @method ClientPhysique[]    findAll()
 * @method ClientPhysique[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ClientPhysiqueRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ClientPhysique::class);
    }

   
    /**
    * @return ClientPhysique[]
    */
    public function findByCNI($str, EntityManagerInterface $entityManager){
        return $this->$entityManager()
                    ->createQuery(
                        'SELECT c
                        FROM client_physique c
                        WHERE c.cni LIKE :str'
            )
            ->setParameter('str', '%'.$str.'%')
            ->getResult();
    }

}
