<?php

namespace App\Repository;

use App\Classe\Search;
use App\Entity\Mission;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Mission|null find($id, $lockMode = null, $lockVersion = null)
 * @method Mission|null findOneBy(array $criteria, array $orderBy = null)
 * @method Mission[]    findAll()
 * @method Mission[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MissionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Mission::class);
    }

    /**
     * Requète qui permet de récupérer les missions en fonction de la recherche de l'utilisateur
     * @return Mission[]
     */
    public function findWithSearch(Search $search){
        $query = $this
            ->createQueryBuilder('p')
            ->select('c', 'p')
            ->join('p.category', 'c');

        if(!empty($search->categories)) {
            $query = $query
                ->andWhere('c.id IN (:categories)')
                ->setParameter('categories', $search->categories);
        }

        if(!empty($search->string)) {
            $query = $query
                ->andWhere('p.titre LIKE :string')
                ->setParameter('string', "%{$search->string}");
        }


        return $query->getQuery()->getResult();
    }

    // /**
    //  * @return Mission[] Returns an array of Mission objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Mission
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
