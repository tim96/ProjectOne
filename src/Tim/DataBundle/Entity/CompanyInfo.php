<?php

namespace Tim\DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * CompanyInfo
 *
 * @ORM\Table(name="data_company_info")
 * @ORM\Entity(repositoryClass="Tim\DataBundle\Repository\CompanyInfoRepository")
 */
class CompanyInfo
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
     * @ORM\Column(name="company_description", type="string", length=255, nullable=false)
     */
    protected $companyDescription;

    /**
     * @var string
     *
     * @ORM\Column(name="company_address", type="string", length=512, nullable=false)
     */
    protected $companyAddress;

    /**
     * @var string
     *
     * @ORM\Column(name="company_lat", type="string", length=512, nullable=false)
     */
    protected $companyLat;

   /**
     * @var string
     *
     * @ORM\Column(name="company_lng", type="string", length=512, nullable=false)
     */
    protected $companyLng;

    /**
     * @var string
     *
     * @ORM\Column(name="image_path", type="string", length=255, nullable=true)
     */
    protected $imagePath;

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
     * Set companyDescription
     *
     * @param string $companyDescription
     * @return CompanyInfo
     */
    public function setCompanyDescription($companyDescription)
    {
        $this->companyDescription = $companyDescription;

        return $this;
    }

    /**
     * Get companyDescription
     *
     * @return string 
     */
    public function getCompanyDescription()
    {
        return $this->companyDescription;
    }

    /**
     * Set companyAddress
     *
     * @param string $companyAddress
     * @return CompanyInfo
     */
    public function setCompanyAddress($companyAddress)
    {
        $this->companyAddress = $companyAddress;

        return $this;
    }

    /**
     * Get companyAddress
     *
     * @return string 
     */
    public function getCompanyAddress()
    {
        return $this->companyAddress;
    }

    /**
     * Set companyLat
     *
     * @param string $companyLat
     * @return CompanyInfo
     */
    public function setCompanyLat($companyLat)
    {
        $this->companyLat = $companyLat;

        return $this;
    }

    /**
     * Get companyLat
     *
     * @return string 
     */
    public function getCompanyLat()
    {
        return $this->companyLat;
    }

    /**
     * Set companyLng
     *
     * @param string $companyLng
     * @return CompanyInfo
     */
    public function setCompanyLng($companyLng)
    {
        $this->companyLng = $companyLng;

        return $this;
    }

    /**
     * Get companyLng
     *
     * @return string 
     */
    public function getCompanyLng()
    {
        return $this->companyLng;
    }

    /**
     * Set imagePath
     *
     * @param string $imagePath
     * @return CompanyInfo
     */
    public function setImagePath($imagePath)
    {
        $this->imagePath = $imagePath;

        return $this;
    }

    /**
     * Get imagePath
     *
     * @return string 
     */
    public function getImagePath()
    {
        return $this->imagePath;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return CompanyInfo
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
     * @return CompanyInfo
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
     * @return CompanyInfo
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
     * @return CompanyInfo
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
     * @return CompanyInfo
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
}
