<?php

namespace Tim\DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * SliderInfo
 *
 * @ORM\Table(name="data_slider_info")
 * @ORM\Entity(repositoryClass="Tim\DataBundle\Repository\SliderInfoRepository")
 */
class SliderInfo
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
     * @Assert\NotBlank()
     * @Assert\NotNull()
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    protected $title;

    /**
     * @var string
     *
     * @Assert\NotBlank()
     * @Assert\NotNull()
     *
     * @ORM\Column(name="main_text", type="string", length=255)
     */
    protected $mainText;

    /**
     * @var string
     *
     * @Assert\NotBlank()
     * @Assert\NotNull()
     *
     * @ORM\Column(name="footer", type="string", length=255)
     */
    protected $footer;

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
     * @var \DateTime
     *
     * @Assert\NotBlank()
     * @Assert\Type("\DateTime")
     *
     * @ORM\Column(name="created_at", type="datetime")
     **/
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_at", type="datetime", nullable=true)
     **/
    private $updatedAt;

    /**
     * @var integer
     *
     * @ORM\Column(name="order_number", type="integer", nullable=false)
     */
    protected $orderNumber;

    public function __construct()
    {
        $this->createdAt = new \DateTime();
        $this->orderNumber = 0;
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
     * Set title
     *
     * @param string $title
     * @return SliderInfo
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set mainText
     *
     * @param string $mainText
     * @return SliderInfo
     */
    public function setMainText($mainText)
    {
        $this->mainText = $mainText;

        return $this;
    }

    /**
     * Get mainText
     *
     * @return string 
     */
    public function getMainText()
    {
        return $this->mainText;
    }

    /**
     * Set footer
     *
     * @param string $footer
     * @return SliderInfo
     */
    public function setFooter($footer)
    {
        $this->footer = $footer;

        return $this;
    }

    /**
     * Get footer
     *
     * @return string 
     */
    public function getFooter()
    {
        return $this->footer;
    }

    /**
     * Set author
     *
     * @param integer $author
     * @return SliderInfo
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
     * @return SliderInfo
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
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return SliderInfo
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
     * @return SliderInfo
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
     * Set orderNumber
     *
     * @param integer $orderNumber
     * @return SliderInfo
     */
    public function setOrderNumber($orderNumber)
    {
        $this->orderNumber = $orderNumber;

        return $this;
    }

    /**
     * Get orderNumber
     *
     * @return integer 
     */
    public function getOrderNumber()
    {
        return $this->orderNumber;
    }
}
