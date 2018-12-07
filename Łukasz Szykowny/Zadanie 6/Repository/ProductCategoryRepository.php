<?php

namespace App\Repository;

use App\Entity\ProductCategory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ProductCategory|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProductCategory|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProductCategory[]    findAll()
 * @method ProductCategory[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProductCategoryRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ProductCategory::class);
    }
    
    /*
     * Count products in category
     */
    public function countProductsByCategory($categoryId)
    {
        return $this->createQueryBuilder('p')
            ->select('count(p.id)')
            ->leftJoin('p.products', 'pr')
            ->where('p.id = :categoryId')
            ->setParameter('categoryId', $categoryId)
            ->getQuery()
            ->getSingleScalarResult();
    }
    
    /*
     * Select products in category
     */
    public function selectProductsByCategory($categoryId)
    {
        return $this->createQueryBuilder('p')
            ->leftJoin('p.products', 'pr')
            ->where('p.id = :categoryId')
            ->setParameter('categoryId', $categoryId)
            ->orderBy('pr.name', 'ASC')
            ->getQuery()
            ->getOneOrNullResult();
        
    }
}
