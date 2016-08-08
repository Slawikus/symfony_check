<?php

namespace Test\InterviewBundle\Services;

use Doctrine\ODM\MongoDB\DocumentManager;
use Symfony\Component\DependencyInjection\Container;


class BiosService
{
    protected  $dm;
    private $container;

    public function __construct(DocumentManager $documentManager, Container $container)
    {
        $this->dm = $documentManager;
        $this->container = $container;
    }

    public function getAllAwards()
    {
        $qb = $this->dm->createQueryBuilder();

        return $qb->field('awards')->getQuery()->execute();
    }

    public function getAllContributions()
    {
        $qb = $this->dm->createQueryBuilder();

        return $qb->field('contribs')->getQuery()->execute();
    }

    public function getAllBiosByContribution($contributionName)
    {
        $qb = $this->dm->createQueryBuilder();

        return $qb->field('contribs')
            ->equals($contributionName)
            ->getQuery()
            ->execute();
    }
}