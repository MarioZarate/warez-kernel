<?php

namespace App\Entity\Serie;

use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\Uuid;

/**
 * App\Entity\Serie\Episode
 *
 * @ORM\Entity(repositoryClass="App\Repository\Serie\EpisodeRepository")
 * @ORM\Table(name="episode", indexes={@ORM\Index(name="fk_episode_season_idx", columns={"season_id"})}, uniqueConstraints={@ORM\UniqueConstraint(name="id_UNIQUE", columns={"id"}), @ORM\UniqueConstraint(name="cover_UNIQUE", columns={"cover"})})
 */
class Episode
{
    /**
     * @ORM\Id
     * @ORM\Column(type="string", length=36)
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=36)
     */
    protected $season_id;

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
     * @ORM\Column(type="string", length=36, nullable=true)
     */
    protected $cover;

    /**
     * @ORM\Column(type="smallint")
     */
    protected $is_approved;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $release_date;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $next_episode_release_date;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $created_date;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $updated_date;

    /**
     * @ORM\ManyToOne(targetEntity="Season", inversedBy="episodes")
     * @ORM\JoinColumn(name="season_id", referencedColumnName="id", nullable=false, onDelete="CASCADE")
     */
    protected $season;

    public function __construct()
    {
        $this->id = Uuid::uuid4();
    }

    /**
     * Set the value of id.
     *
     * @param string $id
     * @return \App\Entity\Serie\Episode
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
     * Set the value of season_id.
     *
     * @param string $season_id
     * @return \App\Entity\Serie\Episode
     */
    public function setSeasonId($season_id)
    {
        $this->season_id = $season_id;

        return $this;
    }

    /**
     * Get the value of season_id.
     *
     * @return string
     */
    public function getSeasonId()
    {
        return $this->season_id;
    }

    /**
     * Set the value of title.
     *
     * @param string $title
     * @return \App\Entity\Serie\Episode
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
     * @return \App\Entity\Serie\Episode
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
     * @return \App\Entity\Serie\Episode
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
     * @return \App\Entity\Serie\Episode
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
     * Set the value of is_approved.
     *
     * @param integer $is_approved
     * @return \App\Entity\Serie\Episode
     */
    public function setIsApproved($is_approved)
    {
        $this->is_approved = $is_approved;

        return $this;
    }

    /**
     * Get the value of is_approved.
     *
     * @return integer
     */
    public function getIsApproved()
    {
        return $this->is_approved;
    }

    /**
     * Set the value of release_date.
     *
     * @param \DateTime $release_date
     * @return \App\Entity\Serie\Episode
     */
    public function setReleaseDate($release_date)
    {
        $this->release_date = $release_date;

        return $this;
    }

    /**
     * Get the value of release_date.
     *
     * @return \DateTime
     */
    public function getReleaseDate()
    {
        return $this->release_date;
    }

    /**
     * Set the value of next_episode_release_date.
     *
     * @param \DateTime $next_episode_release_date
     * @return \App\Entity\Serie\Episode
     */
    public function setNextEpisodeReleaseDate($next_episode_release_date)
    {
        $this->next_episode_release_date = $next_episode_release_date;

        return $this;
    }

    /**
     * Get the value of next_episode_release_date.
     *
     * @return \DateTime
     */
    public function getNextEpisodeReleaseDate()
    {
        return $this->next_episode_release_date;
    }

    /**
     * Set the value of created_date.
     *
     * @param \DateTime $created_date
     * @return \App\Entity\Serie\Episode
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
     * @return \App\Entity\Serie\Episode
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
     * Set Season entity (many to one).
     *
     * @param \App\Entity\Serie\Season $season
     * @return \App\Entity\Serie\Episode
     */
    public function setSeason(Season $season = null)
    {
        $this->season = $season;

        return $this;
    }

    /**
     * Get Season entity (many to one).
     *
     * @return \App\Entity\Serie\Season
     */
    public function getSeason()
    {
        return $this->season;
    }

    public function __sleep()
    {
        return array('id', 'season_id', 'title', 'number', 'synopsis', 'cover', 'is_approved', 'release_date', 'next_episode_release_date', 'created_date', 'updated_date');
    }
}
