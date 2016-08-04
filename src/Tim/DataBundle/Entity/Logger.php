<?php

namespace Tim\DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Logger
 *
 * @ORM\Table(name="data_logger")
 * @ORM\Entity(repositoryClass="Tim\DataBundle\Repository\LoggerRepository")
 */
class Logger
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
}
