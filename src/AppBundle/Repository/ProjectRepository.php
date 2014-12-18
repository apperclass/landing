<?php

namespace AppBundle\Repository;

use AppBundle\Entity\Project;
use Doctrine\ORM\EntityRepository;

class ProjectRepository extends EntityRepository
{

    public function getAllByLocaleOrderedByPosition($locale)
    {
        return $this
            ->getEntityManager()
            ->createQueryBuilder()
            ->select('p')
            ->from(Project::SHORTCUT_CLASS_NAME, 'p')
            ->where('p.locale = :locale')
            ->setParameter('locale', $locale)
            ->orderBy('p.position', 'ASC')
            ->getQuery()
            ->getResult();
    }
}