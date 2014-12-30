<?php

namespace AppBundle\Repository;

use AppBundle\Entity\Member;
use Doctrine\ORM\EntityRepository;

class MemberRepository extends EntityRepository
{
    public function getAllOrderedByPosition()
    {
        return $this
            ->getEntityManager()
            ->createQueryBuilder()
            ->select('m')
            ->from(Member::SHORTCUT_CLASS_NAME, 'm')
            ->orderBy('m.position', 'ASC')
            ->getQuery()
            ->getResult();
    }
}