<?php
/**
 * Created by PhpStorm.
 * User: tim
 * Date: 8/11/2016
 * Time: 9:51 PM
 */

namespace Tim\DataBundle\Handler;

use Doctrine\ORM\EntityManager;

class SliderInfoHandler
{
    /** @var EntityManager */
    protected $om;

    /** @var \Tim\DataBundle\Repository\SliderInfoRepository  */
    protected $repository;

    public function __construct($entityManager)
    {
        $this->om = $entityManager;

        $this->repository = $this->om->getRepository('TimDataBundle:SliderInfo');
    }

    public function getSliderInfo($limit = 3)
    {
        return $this->repository->getSliderInfoQuery($limit)->getQuery();
    }
}