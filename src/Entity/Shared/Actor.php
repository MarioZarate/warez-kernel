<?php

namespace App\Entity\Shared;

use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\Uuid;

/**
 * App\Entity\Shared\Actor
 *
 * @ORM\Entity(repositoryClass="App\Repository\Shared\ActorRepository")
 * @ORM\Table(name="actor", indexes={@ORM\Index(name="fk_actor_country_idx", columns={"country_id"})}, uniqueConstraints={@ORM\UniqueConstraint(name="id_UNIQUE", columns={"id"}), @ORM\UniqueConstraint(name="photo_UNIQUE", columns={"photo"}), @ORM\UniqueConstraint(name="slug_UNIQUE", columns={"slug"})})
 */
class Actor
{
    /**
     * @ORM\Id
     * @ORM\Column(type="string", length=36)
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=36)
     */
    protected $country_id;

    /**
     * @ORM\Column(name="`name`", type="string", length=180)
     */
    protected $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $slug;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    protected $biography;

    /**
     * @ORM\Column(type="string", length=36)
     */
    protected $photo;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $created_date;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $updated_date;

    /**
     * @ORM\ManyToOne(targetEntity="Country", inversedBy="actors")
     * @ORM\JoinColumn(name="country_id", referencedColumnName="id", nullable=false, onDelete="CASCADE")
     */
    protected $country;

    public function __construct()
    {
        $this->id = Uuid::uuid4();
    }

    /**
     * Set the value of id.
     *
     * @param string $id
     * @return \App\Entity\Shared\Actor
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of id.
     *
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of country_id.
     *
     * @param string $country_id
     * @return \App\Entity\Shared\Actor
     */
    public function setCountryId($country_id)
    {
        $this->country_id = $country_id;

        return $this;
    }

    /**
     * Get the value of country_id.
     *
     * @return string
     */
    public function getCountryId()
    {
        return $this->country_id;
    }

    /**
     * Set the value of name.
     *
     * @param string $name
     * @return \App\Entity\Shared\Actor
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of slug.
     *
     * @param string $slug
     * @return \App\Entity\Shared\Actor
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get the value of slug.
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set the value of biography.
     *
     * @param string $biography
     * @return \App\Entity\Shared\Actor
     */
    public function setBiography($biography)
    {
        $this->biography = $biography;

        return $this;
    }

    /**
     * Get the value of biography.
     *
     * @return string
     */
    public function getBiography()
    {
        return $this->biography;
    }

    /**
     * Set the value of photo.
     *
     * @param string $photo
     * @return \App\Entity\Shared\Actor
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * Get the value of photo.
     *
     * @return string
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * Set the value of created_date.
     *
     * @param \DateTime $created_date
     * @return \App\Entity\Shared\Actor
     */
    public function setCreatedDate($created_date)
    {
        $this->created_date = $created_date;

        return $this;
    }

    /**
     * Get the value of created_date.
     *
     * @return \DateTime
     */
    public function getCreatedDate()
    {
        return $this->created_date;
    }

    /**
     * Set the value of updated_date.
     *
     * @param \DateTime $updated_date
     * @return \App\Entity\Shared\Actor
     */
    public function setUpdatedDate($updated_date)
    {
        $this->updated_date = $updated_date;

        return $this;
    }

    /**
     * Get the value of updated_date.
     *
     * @return \DateTime
     */
    public function getUpdatedDate()
    {
        return $this->updated_date;
    }

    /**
     * Set Country entity (many to one).
     *
     * @param \App\Entity\Shared\Country $country
     * @return \App\Entity\Shared\Actor
     */
    public function setCountry(Country $country = null)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get Country entity (many to one).
     *
     * @return \App\Entity\Shared\Country
     */
    public function getCountry()
    {
        return $this->country;
    }

    public function __sleep()
    {
        return array('id', 'country_id', 'name', 'slug', 'biography', 'photo', 'created_date', 'updated_date');
    }
}
