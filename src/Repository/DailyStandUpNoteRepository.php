<?php

namespace App\Repository;

use App\Entity\DailyStandUpNote;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @extends ServiceEntityRepository<DailyStandUpNote>
 *
 * @method DailyStandUpNote|null find($id, $lockMode = null, $lockVersion = null)
 * @method DailyStandUpNote|null findOneBy(array $criteria, array $orderBy = null)
 * @method DailyStandUpNote[]    findAll()
 * @method DailyStandUpNote[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DailyStandUpNoteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DailyStandUpNote::class);
    }

    public function findAllByUser(UserInterface $user): array
    {
        $qb = $this->createQueryBuilder('dsn');
        $qb->andWhere('dsn.createdBy = :createdBy')
            ->setParameter('createdBy', $user);

        return $qb->getQuery()->getResult();
    }

    public function save(DailyStandUpNote $dailyStandUpNote): void
    {
        $this->_em->persist($dailyStandUpNote);
        $this->_em->flush();
    }
}
