<?php

namespace Tim\DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Reservation
 *
 * @ORM\Table(name="data_reservation")
 * @ORM\Entity(repositoryClass="Tim\DataBundle\Repository\ReservationRepository")
 */
class Reservation
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
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=512, nullable=true)
     */
    protected $description;

    /**
     * @Assert\NotBlank()
     *
     * @var string
     *
     * @ORM\Column(name="contact_data", type="string", length=512)
     */
    protected $contactData;

    /**
     * @Assert\NotBlank()
     * @Assert\Type("\DateTime")
     *
     * @ORM\Column(name="date_reservation", type="datetime")
     **/
    protected $dateReservation;

    /**
     * @var int
     *
     * @ORM\Column(name="count_customers", type="integer", options={"default": 0})
     */
    protected $countCustomers;

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
     * @var int
     *
     * @ORM\Column(name="status", type="integer", options={"default": 0})
     */
    protected $status;

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

    public function __construct()
    {
        $this->createdAt = new \DateTime();
        $this->updatedAt = new \DateTime();
        $this->author = 0;
        $this->status = 0;
        $this->updatedBy = null;
        $this->countCustomers = 0;
        $this->dateReservation = new \DateTime();
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
     * Set description
     *
     * @param string $description
     * @return Reservation
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set dateReservation
     *
     * @param \DateTime $dateReservation
     * @return Reservation
     */
    public function setDateReservation($dateReservation)
    {
        $this->dateReservation = $dateReservation;

        return $this;
    }

    /**
     * Get dateReservation
     *
     * @return \DateTime 
     */
    public function getDateReservation()
    {
        return $this->dateReservation;
    }

    /**
     * Set countCustomers
     *
     * @param integer $countCustomers
     * @return Reservation
     */
    public function setCountCustomers($countCustomers)
    {
        $this->countCustomers = $countCustomers;

        return $this;
    }

    /**
     * Get countCustomers
     *
     * @return integer 
     */
    public function getCountCustomers()
    {
        return $this->countCustomers;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Reservation
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
     * @return Reservation
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
     * Set status
     *
     * @param integer $status
     * @return Reservation
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return integer 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set author
     *
     * @param integer $author
     * @return Reservation
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
     * @return Reservation
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
     * Set contactData
     *
     * @param string $contactData
     * @return Reservation
     */
    public function setContactData($contactData)
    {
        $this->contactData = $contactData;

        return $this;
    }

    /**
     * Get contactData
     *
     * @return string 
     */
    public function getContactData()
    {
        return $this->contactData;
    }
}
