<?php

namespace App\Repository;

use App\Entity\Product;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Product|null find($id, $lockMode = null, $lockVersion = null)
 * @method Product|null findOneBy(array $criteria, array $orderBy = null)
 * @method Product[]    findAll()
 * @method Product[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProductRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Product::class);
    }
    
    /*
     * Count available products
     */
    public function countAvailableProducts()
    {
        return $this->createQueryBuilder('p')
            ->select('count(p.id)')
            ->andWhere('p.availability = true')
            ->getQuery()
            ->getSingleScalarResult();
    }
    
    /*
     * Select all unavailable products
     */
    public function selectUnavailableProducts()
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.availability is null or p.availability = false ')
            ->getQuery()
            ->getResult();
    }
    
    /*
     * Select products by name
     * 
     * Param:
     * string - searched product name
     */
    public function searchProductsByName($name)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('UPPER(p.name) LIKE :name')
            ->setParameter('name', '%'.mb_strtoupper($name).'%')
            ->getQuery()->getResult();
    }
}
