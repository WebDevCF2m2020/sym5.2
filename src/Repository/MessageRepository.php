<?php


namespace App\Repository;

use App\Entity\Message;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class MessageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Message::class);
    }
    /**
     * @return Message[]
     */
    public function findAllMessagesBySection(int $idsection): array
    {
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            'SELECT m
            FROM App\Entity\Message m
            JOIN App\Entity\Section s
            WHERE m.sectionIdsection = s.idsection 
                and s.idsection = :section
            ORDER BY m.messagedate DESC'
        )->setParameter('section', $idsection);

        // returns an array of Product objects
        return $query->getResult();
    }
}