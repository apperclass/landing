<?php

namespace AppBundle\Repository;

use AppBundle\Entity\ManifestoPoint;
use Doctrine\ORM\EntityRepository;

class ManifestoPointRepository extends EntityRepository
{
    public function getAllByLocaleOrderedByPosition($locale)
    {
        return $this
            ->getEntityManager()
            ->createQueryBuilder()
            ->select('m')
            ->from(ManifestoPoint::SHORTCUT_CLASS_NAME, 'm')
            ->where('m.locale = :locale')
            ->setParameter('locale', $locale)
            ->orderBy('m.position', 'ASC')
            ->getQuery()
            ->getResult();
    }
}