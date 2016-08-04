<?php

namespace Tim\DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Configuration
 *
 * @ORM\Table(name="data_configuration")
 * @ORM\Entity(repositoryClass="Tim\DataBundle\Repository\ConfigurationRepository")
 */
class Configuration
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
