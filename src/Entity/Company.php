<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Company
 *
 * @ORM\Table(name="company")
 * @ORM\Entity(repositoryClass="App\Repository\CompanyRepository")
 */
class Company
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=true)
     */
    private $title;

    /**
     * @var string|null
     *
     * @ORM\Column(name="keywords", type="text", length=16777215, nullable=true)
     */
    private $keywords;

    /**
     * @var string|null
     *
     * @ORM\Column(name="address", type="string", length=255, nullable=true)
     */
    private $address;

//    /**
//     * @var int|null
//     *
//     * @ORM\ManyToOne(targetEntity="Region", inversedBy="companies")
//     */
//    private $region;

    /**
     * @ORM\ManyToOne(targetEntity="City", inversedBy="companies")
     */
    private $city;

    /**
     * @var int|null
     *
     * @ORM\Column(name="ordering", type="integer", nullable=true)
     */
    private $ordering;

    /**
     * @var string|null
     *
     * @ORM\Column(name="logo", type="string", length=255, nullable=true)
     */
    private $logo;

    /**
     * @var string|null
     *
     * @ORM\Column(name="mailing_index", type="string", length=255, nullable=true)
     */
    private $mailingIndex;

    /**
     * @var string|null
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=true)
     */
    private $email;

    /**
     * @var string|null
     *
     * @ORM\Column(name="site", type="string", length=255, nullable=true)
     */
    private $site;

    /**
     * @var string|null
     *
     * @ORM\Column(name="description", type="text", length=16777215, nullable=true)
     */
    private $description;

    /**
     * @var string|null
     *
     * @ORM\Column(name="promo", type="string", length=255, nullable=true)
     */
    private $promo;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="created", type="datetime", nullable=true)
     */
    private $created;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="updated", type="datetime", nullable=true)
     */
    private $updated;

    /**
     * @var int|null
     *
     * @ORM\Column(name="autor", type="integer", nullable=true)
     */
    private $autor;

    /**
     * @var int
     *
     * @ORM\Column(name="not_update", type="integer", nullable=false)
     */
    private $notUpdate = 0;

    /**
     * @var string
     *
     * @ORM\Column(name="unp", type="string", length=11, nullable=true)
     */
    private $unp;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $gps;


//    /**
//     * @ORM\ManyToOne(targetEntity="App\Entity\Region", inversedBy="companies")
//     * @ORM\JoinColumn(name="region_id", referencedColumnName="id")
//     */
//    private $region;

//    /**
//     * Many Users have Many Groups.
//     * @ORM\ManyToMany(targetEntity="App\Entity\Product")
//     * @ORM\JoinTable(name="product_company",
//     *      joinColumns={@ORM\JoinColumn(name="company_id", referencedColumnName="id")},
//     *      inverseJoinColumns={@ORM\JoinColumn(name="product_id", referencedColumnName="id")}
//     * )
//     */
//    private $products;
//
//    /**
//     * @ORM\OneToOne(targetEntity="CompanyModContent", inversedBy="company")
//     * @ORM\JoinColumn(name="id", referencedColumnName="id")
//     */
//    private $contentMod;
//
//    /**
//     * @ORM\OneToOne(targetEntity="CompanyContent", inversedBy="company")
//     * @ORM\JoinColumn(name="id", referencedColumnName="id")
//     */
//    private $content;

//    public function __construct()
//    {
//        $this->products = new ArrayCollection();
////        $this->contentMod = new ArrayCollection();
//    }

//    /**
//     * @return mixed
//     */
//    public function getProducts()
//    {
//        return $this->products;
//    }
//
//    /**
//     * @param mixed $products
//     */
//    public function setProducts($products)
//    {
//        $this->products = $products;
//    }

//    /**
//     * @return mixed
//     */
//    public function getRegion()
//    {
//        return $this->region;
//    }
//
//    /**
//     * @param mixed $region
//     */
//    public function setRegion($region)
//    {
//        $this->region = $region;
//    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return null|string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param null|string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return null|string
     */
    public function getKeywords()
    {
        return $this->keywords;
    }

    /**
     * @param null|string $keywords
     */
    public function setKeywords($keywords)
    {
        $this->keywords = $keywords;
    }

    /**
     * @return null|string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param null|string $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return int|null
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param int|null $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @return int|null
     */
    public function getOrdering()
    {
        return $this->ordering;
    }

    /**
     * @param int|null $ordering
     */
    public function setOrdering($ordering)
    {
        $this->ordering = $ordering;
    }

    /**
     * @return null|string
     */
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * @param null|string $logo
     */
    public function setLogo($logo)
    {
        $this->logo = $logo;
    }

    /**
     * @return null|string
     */
    public function getMailingIndex()
    {
        return $this->mailingIndex;
    }

    /**
     * @param null|string $mailingIndex
     */
    public function setMailingIndex($mailingIndex)
    {
        $this->mailingIndex = $mailingIndex;
    }

    /**
     * @return null|string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param null|string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return null|string
     */
    public function getSite()
    {
        return $this->site;
    }

    /**
     * @param null|string $site
     */
    public function setSite($site)
    {
        $this->site = $site;
    }

    /**
     * @return null|string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param null|string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return null|string
     */
    public function getPromo()
    {
        return $this->promo;
    }

    /**
     * @param null|string $promo
     */
    public function setPromo($promo)
    {
        $this->promo = $promo;
    }

    /**
     * @return \DateTime|null
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @param \DateTime|null $created
     */
    public function setCreated($created)
    {
        $this->created = $created;
    }

    /**
     * @return \DateTime|null
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * @param \DateTime|null $updated
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;
    }

    /**
     * @return int|null
     */
    public function getAutor()
    {
        return $this->autor;
    }

    /**
     * @param int|null $autor
     */
    public function setAutor($autor)
    {
        $this->autor = $autor;
    }

    /**
     * @return int
     */
    public function getNotUpdate(): int
    {
        return $this->notUpdate;
    }

    /**
     * @param int $notUpdate
     */
    public function setNotUpdate(int $notUpdate)
    {
        $this->notUpdate = $notUpdate;
    }

//    /**
//     * @return mixed
//     */
//    public function getContentMod()
//    {
//        return $this->contentMod;
//    }
//
//    /**
//     * @param mixed $contentMod
//     */
//    public function setContentMod($contentMod)
//    {
//        $this->contentMod = $contentMod;
//    }

//    /**
//     * @return mixed
//     */
//    public function getContent()
//    {
//        return $this->content;
//    }
//
//    /**
//     * @param mixed $content
//     */
//    public function setContent($content)
//    {
//        $this->content = $content;
//    }

//    /**
//     * @return mixed
//     */
//    public function getMaket()
//    {
//        return $this->maket;
//    }
//
//    /**
//     * @param mixed $maket
//     */
//    public function setMaket($maket)
//    {
//        $this->maket = $maket;
//    }

    /**
     * @return string
     */
    public function getUnp()
    {
        return $this->unp;
    }

    /**
     * @param string $unp
     */
    public function setUnp($unp)
    {
        $this->unp = $unp;
    }

    public function getGps(): ?string
    {
        return $this->gps;
    }

    public function setGps(string $gps): self
    {
        $this->gps = $gps;

        return $this;
    }

}
