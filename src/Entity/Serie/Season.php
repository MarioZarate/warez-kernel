<?php

namespace App\Entity\Serie;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Ramsey\Uuid\Uuid;

/**
 * App\Entity\Serie\Season
 *
 * @ORM\Entity(repositoryClass="App\Repository\Serie\SeasonRepository")
 * @ORM\Table(name="season", indexes={@ORM\Index(name="fk_season_serie_idx", columns={"serie_id"})}, uniqueConstraints={@ORM\UniqueConstraint(name="id_UNIQUE", columns={"id"}), @ORM\UniqueConstraint(name="cover_UNIQUE", columns={"cover"})})
 */
class Season
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
     * @ORM\Column(name="`number`", type="integer", options={"unsigned":true})
     */
    protected $number;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    protected $synopsis;

    /**
     * @ORM\Column(type="string", length=36)
     */
    protected $cover;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $created_date;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $updated_date;

    /**
     * @ORM\OneToMany(targetEntity="Episode", mappedBy="season")
     * @ORM\JoinColumn(name="id", referencedColumnName="season_id", nullable=false, onDelete="CASCADE")
     */
    protected $episodes;

    /**
     * @ORM\ManyToOne(targetEntity="Serie", inversedBy="seasons")
     * @ORM\JoinColumn(name="serie_id", referencedColumnName="id", nullable=false, onDelete="CASCADE")
     */
    protected $serie;

    public function __construct()
    {
        $this->episodes = new ArrayCollection();
        $this->id = Uuid::uuid4();
    }

    /**
     * Set the value of id.
     *
     * @param string $id
     * @return \App\Entity\Serie\Season
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
     * @return \App\Entity\Serie\Season
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
     * @return \App\Entity\Serie\Season
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
     * Set the value of number.
     *
     * @param integer $number
     * @return \App\Entity\Serie\Season
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Get the value of number.
     *
     * @return integer
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set the value of synopsis.
     *
     * @param string $synopsis
     * @return \App\Entity\Serie\Season
     */
    public function setSynopsis($synopsis)
    {
        $this->synopsis = $synopsis;

        return $this;
    }

    /**
     * Get the value of synopsis.
     *
     * @return string
     */
    public function getSynopsis()
    {
        return $this->synopsis;
    }

    /**
     * Set the value of cover.
     *
     * @param string $cover
     * @return \App\Entity\Serie\Season
     */
    public function setCover($cover)
    {
        $this->cover = $cover;

        return $this;
    }

    /**
     * Get the value of cover.
     *
     * @return string
     */
    public function getCover()
    {
        return $this->cover;
    }

    /**
     * Set the value of created_date.
     *
     * @param \DateTime $created_date
     * @return \App\Entity\Serie\Season
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
     * @return \App\Entity\Serie\Season
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
     * Add Episode entity to collection (one to many).
     *
     * @param \App\Entity\Serie\Episode $episode
     * @return \App\Entity\Serie\Season
     */
    public function addEpisode(Episode $episode)
    {
        $this->episodes[] = $episode;

        return $this;
    }

    /**
     * Remove Episode entity from collection (one to many).
     *
     * @param \App\Entity\Serie\Episode $episode
     * @return \App\Entity\Serie\Season
     */
    public function removeEpisode(Episode $episode)
    {
        $this->episodes->removeElement($episode);

        return $this;
    }

    /**
     * Get Episode entity collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEpisodes()
    {
        return $this->episodes;
    }

    /**
     * Set Serie entity (many to one).
     *
     * @param \App\Entity\Serie\Serie $serie
     * @return \App\Entity\Serie\Season
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
        return array('id', 'serie_id', 'title', 'number', 'synopsis', 'cover', 'created_date', 'updated_date');
    }
}
