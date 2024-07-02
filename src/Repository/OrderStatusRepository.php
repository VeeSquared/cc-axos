<?php

namespace App\Repository;

use App\Entity\OrderStatus;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method OrderStatus|null find($id, $lockMode = null, $lockVersion = null)
 * @method OrderStatus|null findOneBy(array $criteria, array $orderBy = null)
 * @method OrderStatus[]    findAll()
 * @method OrderStatus[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OrderStatusRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, OrderStatus::class);
    }

    public function transform(OrderStatus $orderStatus)
    {
        return [
                'id'    => (int) $orderStatus->getId(),
                'status' => (string) $orderStatus->getStatus()
                ];
    }

    public function transformAll()
    {
        $orderStatus = $this->findAll();
        $orderStatusArray = [];

        foreach ($orderStatus as $status) {
            $orderStatusArray[] = $this->transform($status);
        }

        return $orderStatusArray;
    }
}
