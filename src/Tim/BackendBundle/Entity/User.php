<?php

namespace Tim\BackendBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Sonata\UserBundle\Entity\BaseUser;

/**
 * User
 *
 * @ORM\Table(name="fos_user")
 * @ORM\Entity(repositoryClass="Tim\BackendBundle\Repository\UserRepository")
 */
class User extends BaseUser
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
     * @ORM\ManyToMany(targetEntity="Tim\BackendBundle\Entity\BaseGroup", inversedBy="users")
     * @ORM\JoinTable(name="fos_user_group")
     **/
    protected $groups;

    /**
     * @var int
     *
     * @ORM\Column(name="count_attempt", type="integer", options={"default": 0})
     */
    protected $countAttempt;

    /**
     * @var string
     *
     * @ORM\Column(name="browser", type="string", length=255, nullable=true)
     */
    protected $browser;

    /**
     * @var string
     *
     * @ORM\Column(name="ip_address", type="string", length=255, nullable=true)
     */
    protected $ipAddress;

    public function __construct()
    {
        parent::__construct();

        $this->groups = new ArrayCollection();
        $this->countAttempt = 0;
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
     * Set countAttempt
     *
     * @param integer $countAttempt
     * @return User
     */
    public function setCountAttempt($countAttempt)
    {
        $this->countAttempt = $countAttempt;

        return $this;
    }

    /**
     * Get countAttempt
     *
     * @return integer 
     */
    public function getCountAttempt()
    {
        return $this->countAttempt;
    }

    /**
     * Set browser
     *
     * @param string $browser
     * @return User
     */
    public function setBrowser($browser)
    {
        $this->browser = $browser;

        return $this;
    }

    /**
     * Get browser
     *
     * @return string 
     */
    public function getBrowser()
    {
        return $this->browser;
    }

    /**
     * Set ipAddress
     *
     * @param string $ipAddress
     * @return User
     */
    public function setIpAddress($ipAddress)
    {
        $this->ipAddress = $ipAddress;

        return $this;
    }

    /**
     * Get ipAddress
     *
     * @return string 
     */
    public function getIpAddress()
    {
        return $this->ipAddress;
    }
}
