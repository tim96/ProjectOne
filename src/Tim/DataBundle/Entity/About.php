<?php

namespace Tim\DataBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * About
 *
 * @ORM\Table(name="data_about")
 * @ORM\Entity(repositoryClass="Tim\DataBundle\Repository\AboutRepository")
 */
class About
{
    const DEFAULT_ABOUT_ITEMS = 2;

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
     * @Assert\NotBlank()
     * @Assert\NotNull()
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    protected $description;

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
     * @ORM\ManyToOne(targetEntity="\Tim\DataBundle\Entity\BlogRecord")
     * @ORM\JoinColumn(name="blog_record_id", referencedColumnName="id")
     */
    protected $blogRecord;

    /**
     * @ORM\ManyToMany(targetEntity="\Tim\DataBundle\Entity\AboutItem", inversedBy="abouts")
     * @ORM\JoinTable(name="about_about_item")
     **/
    protected $aboutItems;

    public function __construct()
    {
        $this->createdAt = new \DateTime();
        $this->updatedAt = new \DateTime();
        $this->author = 0;
        $this->updatedBy = null;
        $this->aboutItems = new ArrayCollection();
        $this->blogRecord = null;
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
     * @return About
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
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return About
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
     * @return About
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
     * Set author
     *
     * @param integer $author
     * @return About
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
     * @return About
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
     * Set blogRecord
     *
     * @param \Tim\DataBundle\Entity\BlogRecord $blogRecord
     * @return About
     */
    public function setBlogRecord(\Tim\DataBundle\Entity\BlogRecord $blogRecord = null)
    {
        $this->blogRecord = $blogRecord;

        return $this;
    }

    /**
     * Get blogRecord
     *
     * @return \Tim\DataBundle\Entity\BlogRecord 
     */
    public function getBlogRecord()
    {
        return $this->blogRecord;
    }

    /**
     * Add aboutItems
     *
     * @param \Tim\DataBundle\Entity\AboutItem $aboutItems
     * @return About
     */
    public function addAboutItem(\Tim\DataBundle\Entity\AboutItem $aboutItems)
    {
        $this->aboutItems[] = $aboutItems;

        return $this;
    }

    /**
     * Remove aboutItems
     *
     * @param \Tim\DataBundle\Entity\AboutItem $aboutItems
     */
    public function removeAboutItem(\Tim\DataBundle\Entity\AboutItem $aboutItems)
    {
        $this->aboutItems->removeElement($aboutItems);
    }

    /**
     * Get aboutItems
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAboutItems()
    {
        return $this->aboutItems;
    }

    public function isValidateAboutItems()
    {
        return count($this->aboutItems) === self::DEFAULT_ABOUT_ITEMS;
    }
}
