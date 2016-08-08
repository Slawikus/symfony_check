<?php

namespace Test\InterviewBundle\Repositories;

use Doctrine\ODM\MongoDB\DocumentRepository;

/**
 * Class BiosRepository
 */
class BiosRepository extends DocumentRepository
{
    private function getQueryBuilder()
    {
        $dm = $this->getDocumentManager();

        $qb = $dm->getRepository('InterviewBundle:Bios')
            ->createQueryBuilder();

        return $qb;
    }

    public function findByFirstName($firstName)
    {
        $qb = $this->getQueryBuilder()
            ->field('name.first') //doesn't exist, need to be created virtual!
            ->equals($firstName);

        return $qb->getQuery()->execute();
    }

    public function findByContribution($contributionName)
    {
        $qb = $this->getQueryBuilder()
            ->field('contribs') // array! need to check how this works
            ->equals($contributionName);

        return $qb->getQuery()->execute();
    }

    public function findByDeadBefore($year)
    {
        $qb = $this->getQueryBuilder()
            ->field('death')
            ->lte($year);

        return $qb->getQuery()->execute();
    }
}
