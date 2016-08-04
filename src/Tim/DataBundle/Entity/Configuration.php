<?php

namespace Tim\DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

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
     * @Assert\NotBlank()
     * @Assert\Type("\DateTime")
     *
     * @ORM\Column(name="created_at", type="datetime")
     **/
    protected $createdAt;

    /**
     * @Assert\NotBlank()
     * @Assert\Type("\DateTime")
     *
     * @ORM\Column(name="updated_at", type="datetime")
     **/
    protected $updatedAt;

    /**
     * @ORM\Column(name="is_active", type="boolean", options={"default": false})
     **/
    protected $isActive = false;

    /**
     * @var int
     *
     * @ORM\Column(name="author", type="integer", options={"default": 0})
     */
    protected $author;

    /**
     * @var int
     *
     * @ORM\Column(name="updated_by", type="integer", nullable=true, options={"default": null})
     */
    protected $updatedBy;

    /**
     * @var string
     *
     * @Assert\NotBlank()
     * @Assert\NotNull()
     *
     * @ORM\Column(name="email_login", type="string", length=255)
     */
    protected $emailLogin;

    /**
     * @var string
     *
     * @Assert\NotBlank()
     * @Assert\NotNull()
     *
     * @ORM\Column(name="email_password", type="string", length=255)
     */
    protected $emailPassword;

    /**
     * @var string
     *
     * @Assert\NotBlank()
     * @Assert\NotNull()
     *
     * @ORM\Column(name="email_server", type="string", length=255)
     */
    protected $emailServer;

    /**
     * @var string
     *
     * @Assert\NotBlank()
     * @Assert\NotNull()
     *
     * @ORM\Column(name="email_port", type="string", length=255)
     */
    protected $emailPort;

    /**
     * @var string
     *
     * @Assert\NotBlank()
     * @Assert\NotNull()
     *
     * @ORM\Column(name="email_auth", type="string", length=255)
     */
    protected $emailAuth;

    public function __construct()
    {
        $this->createdAt = new \DateTime();
        $this->updatedAt = new \DateTime();
        $this->isActive = false;
        $this->author = 0;
        $this->updatedBy = null;
    }

    public function __toString()
    {
        return $this->id ? (string)$this->id : '';
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
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Configuration
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     * @return Configuration
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime 
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     * @return Configuration
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;

        return $this;
    }

    /**
     * Get isActive
     *
     * @return boolean 
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * Set author
     *
     * @param integer $author
     * @return Configuration
     */
    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get author
     *
     * @return integer 
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set updatedBy
     *
     * @param integer $updatedBy
     * @return Configuration
     */
    public function setUpdatedBy($updatedBy)
    {
        $this->updatedBy = $updatedBy;

        return $this;
    }

    /**
     * Get updatedBy
     *
     * @return integer 
     */
    public function getUpdatedBy()
    {
        return $this->updatedBy;
    }

    /**
     * Set emailLogin
     *
     * @param string $emailLogin
     * @return Configuration
     */
    public function setEmailLogin($emailLogin)
    {
        $this->emailLogin = $emailLogin;

        return $this;
    }

    /**
     * Get emailLogin
     *
     * @return string 
     */
    public function getEmailLogin()
    {
        return $this->emailLogin;
    }

    /**
     * Set emailPassword
     *
     * @param string $emailPassword
     * @return Configuration
     */
    public function setEmailPassword($emailPassword)
    {
        $this->emailPassword = $emailPassword;

        return $this;
    }

    /**
     * Get emailPassword
     *
     * @return string 
     */
    public function getEmailPassword()
    {
        return $this->emailPassword;
    }

    /**
     * Set emailServer
     *
     * @param string $emailServer
     * @return Configuration
     */
    public function setEmailServer($emailServer)
    {
        $this->emailServer = $emailServer;

        return $this;
    }

    /**
     * Get emailServer
     *
     * @return string 
     */
    public function getEmailServer()
    {
        return $this->emailServer;
    }

    /**
     * Set emailPort
     *
     * @param string $emailPort
     * @return Configuration
     */
    public function setEmailPort($emailPort)
    {
        $this->emailPort = $emailPort;

        return $this;
    }

    /**
     * Get emailPort
     *
     * @return string 
     */
    public function getEmailPort()
    {
        return $this->emailPort;
    }

    /**
     * Set emailAuth
     *
     * @param string $emailAuth
     * @return Configuration
     */
    public function setEmailAuth($emailAuth)
    {
        $this->emailAuth = $emailAuth;

        return $this;
    }

    /**
     * Get emailAuth
     *
     * @return string 
     */
    public function getEmailAuth()
    {
        return $this->emailAuth;
    }
}
