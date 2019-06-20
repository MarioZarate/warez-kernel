<?php

namespace App\Entity\Shared;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Ramsey\Uuid\Uuid;

/**
 * App\Entity\Shared\Country
 *
 * @ORM\Entity(repositoryClass="App\Repository\CountryRepository")
 * @ORM\Table(name="country", uniqueConstraints={@ORM\UniqueConstraint(name="id_UNIQUE", columns={"id"}), @ORM\UniqueConstraint(name="short_name_UNIQUE", columns={"short_name"}), @ORM\UniqueConstraint(name="logo_UNIQUE", columns={"logo"})})
 */
class Country
{
    /**
     * @ORM\Id
     * @ORM\Column(type="string", length=36)
     */
    protected $id;

    /**
     * @ORM\Column(name="`name`", type="string", length=180)
     */
    protected $name;

    /**
     * @ORM\Column(type="string", length=5)
     */
    protected $short_name;

    /**
     * @ORM\Column(type="string", length=36, nullable=true)
     */
    protected $logo;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $created_date;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $updated_date;

    /**
     * @ORM\OneToMany(targetEntity="Actor", mappedBy="country")
     * @ORM\JoinColumn(name="id", referencedColumnName="country_id", nullable=false, onDelete="CASCADE")
     */
    protected $actors;

    public function __construct()
    {
        $this->id = Uuid::uuid4();
        $this->actors = new ArrayCollection();
    }

    /**
     * Set the value of id.
     *
     * @param string $id
     * @return \App\Entity\Shared\Country
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
     * Set the value of name.
     *
     * @param string $name
     * @return \App\Entity\Shared\Country
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
     * Set the value of short_name.
     *
     * @param string $short_name
     * @return \App\Entity\Shared\Country
     */
    public function setShortName($short_name)
    {
        $this->short_name = $short_name;

        return $this;
    }

    /**
     * Get the value of short_name.
     *
     * @return string
     */
    public function getShortName()
    {
        return $this->short_name;
    }

    /**
     * Set the value of logo.
     *
     * @param string $logo
     * @return \App\Entity\Shared\Country
     */
    public function setLogo($logo)
    {
        $this->logo = $logo;

        return $this;
    }

    /**
     * Get the value of logo.
     *
     * @return string
     */
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * Set the value of created_date.
     *
     * @param \DateTime $created_date
     * @return \App\Entity\Shared\Country
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
     * @return \App\Entity\Shared\Country
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
     * Add Actor entity to collection (one to many).
     *
     * @param \App\Entity\Shared\Actor $actor
     * @return \App\Entity\Shared\Country
     */
    public function addActor(Actor $actor)
    {
        $this->actors[] = $actor;

        return $this;
    }

    /**
     * Remove Actor entity from collection (one to many).
     *
     * @param \App\Entity\Shared\Actor $actor
     * @return \App\Entity\Shared\Country
     */
    public function removeActor(Actor $actor)
    {
        $this->actors->removeElement($actor);

        return $this;
    }

    /**
     * Get Actor entity collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getActors()
    {
        return $this->actors;
    }

    public function __sleep()
    {
        return array('id', 'name', 'short_name', 'logo', 'created_date', 'updated_date');
    }
}
