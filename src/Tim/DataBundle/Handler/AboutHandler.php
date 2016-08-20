<?php
/**
 * Created by PhpStorm.
 * User: tim
 * Date: 8/20/2016
 * Time: 5:29 PM
 */

namespace Tim\DataBundle\Handler;

use Doctrine\ORM\EntityManager;

class AboutHandler
{
    /** @var EntityManager */
    protected $om;

    /** @var \Tim\DataBundle\Repository\AboutRepository  */
    protected $repository;

    public function __construct($entityManager)
    {
        $this->om = $entityManager;

        $this->repository = $this->om->getRepository('TimDataBundle:About');
    }

    public function getAboutBlocks($limit = 2)
    {
        $abouts = $this->repository->getListQuery()->getQuery()->getArrayResult();
        if (count($abouts) > ($limit - 1)) {
            return array_slice($abouts, 0, $limit);
        }
    }
}