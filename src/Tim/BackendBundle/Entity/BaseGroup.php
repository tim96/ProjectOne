<?php

namespace Tim\BackendBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * BaseGroup
 *
 * @ORM\Table(name="fos_group")
 * @ORM\Entity(repositoryClass="Tim\BackendBundle\Repository\BaseGroupRepository")
 */
class BaseGroup extends \Sonata\UserBundle\Entity\BaseGroup
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToMany(targetEntity="Tim\BackendBundle\Entity\User", mappedBy="groups")
     **/
    protected $users;

    public function __construct($name, $roles = array())
    {
        parent::__construct($name, $roles);

        $this->users = new ArrayCollection();
    }

    public function __toString()
    {
        return parent::__toString();
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Add users
     *
     * @param \Tim\BackendBundle\Entity\User $users
     * @return BaseGroup
     */
    public function addUser(\Tim\BackendBundle\Entity\User $users)
    {
        $this->users[] = $users;

        return $this;
    }

    /**
     * Remove users
     *
     * @param \Tim\BackendBundle\Entity\User $users
     */
    public function removeUser(\Tim\BackendBundle\Entity\User $users)
    {
        $this->users->removeElement($users);
    }

    /**
     * Get users
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUsers()
    {
        return $this->users;
    }
}
