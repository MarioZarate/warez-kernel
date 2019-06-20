<?php

namespace App\Entity\Serie;

use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\Uuid;

/**
 * App\Entity\Serie\AlternativeTitle
 *
 * @ORM\Entity(repositoryClass="App\Repository\Serie\AlternativeTitleRepository")
 * @ORM\Table(name="alternative_title", indexes={@ORM\Index(name="fk_alternative_title_serie1_idx", columns={"serie_id"})}, uniqueConstraints={@ORM\UniqueConstraint(name="id_UNIQUE", columns={"id"})})
 */
class AlternativeTitle
{
    /**
     * @ORM\Id
     * @ORM\Column(type="string", length=36)
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=36)
     */
    protected $serie_id;

    /**
     * @ORM\Column(type="string", length=180)
     */
    protected $title;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $created_date;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $updated_date;

    /**
     * @ORM\ManyToOne(targetEntity="Serie", inversedBy="alternativeTitles")
     * @ORM\JoinColumn(name="serie_id", referencedColumnName="id", nullable=false, onDelete="CASCADE")
     */
    protected $serie;

    public function __construct()
    {
        $this->id = Uuid::uuid4();
    }

    /**
     * Set the value of id.
     *
     * @param string $id
     * @return \App\Entity\Serie\AlternativeTitle
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
     * Set the value of serie_id.
     *
     * @param string $serie_id
     * @return \App\Entity\Serie\AlternativeTitle
     */
    public function setSerieId($serie_id)
    {
        $this->serie_id = $serie_id;

        return $this;
    }

    /**
     * Get the value of serie_id.
     *
     * @return string
     */
    public function getSerieId()
    {
        return $this->serie_id;
    }

    /**
     * Set the value of title.
     *
     * @param string $title
     * @return \App\Entity\Serie\AlternativeTitle
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of title.
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of created_date.
     *
     * @param \DateTime $created_date
     * @return \App\Entity\Serie\AlternativeTitle
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
     * @return \App\Entity\Serie\AlternativeTitle
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
     * Set Serie entity (many to one).
     *
     * @param \App\Entity\Serie\Serie $serie
     * @return \App\Entity\Serie\AlternativeTitle
     */
    public function setSerie(Serie $serie = null)
    {
        $this->serie = $serie;

        return $this;
    }

    /**
     * Get Serie entity (many to one).
     *
     * @return \App\Entity\Serie\Serie
     */
    public function getSerie()
    {
        return $this->serie;
    }

    public function __sleep()
    {
        return array('id', 'serie_id', 'title', 'created_date', 'updated_date');
    }
}
