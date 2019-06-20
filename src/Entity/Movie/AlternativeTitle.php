<?php

namespace App\Entity\Movie;

use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\Uuid;

/**
 * App\Entity\Movie\AlternativeTitle
 *
 * @ORM\Entity(repositoryClass="App\Repository\Movie\AlternativeTitleRepository")
 * @ORM\Table(name="alternative_title", indexes={@ORM\Index(name="fk_alternative_title_movie1_idx", columns={"movie_id"})}, uniqueConstraints={@ORM\UniqueConstraint(name="id_UNIQUE", columns={"id"})})
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
    protected $movie_id;

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
     * @ORM\ManyToOne(targetEntity="Movie", inversedBy="alternativeTitles")
     * @ORM\JoinColumn(name="movie_id", referencedColumnName="id", nullable=false, onDelete="CASCADE")
     */
    protected $movie;

    public function __construct()
    {
        $this->id = Uuid::uuid4();
    }

    /**
     * Set the value of id.
     *
     * @param string $id
     * @return \App\Entity\Movie\AlternativeTitle
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
     * Set the value of movie_id.
     *
     * @param string $movie_id
     * @return \App\Entity\Movie\AlternativeTitle
     */
    public function setMovieId($movie_id)
    {
        $this->movie_id = $movie_id;

        return $this;
    }

    /**
     * Get the value of movie_id.
     *
     * @return string
     */
    public function getMovieId()
    {
        return $this->movie_id;
    }

    /**
     * Set the value of title.
     *
     * @param string $title
     * @return \App\Entity\Movie\AlternativeTitle
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
     * @return \App\Entity\Movie\AlternativeTitle
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
     * @return \App\Entity\Movie\AlternativeTitle
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
     * Set Movie entity (many to one).
     *
     * @param \App\Entity\Movie\Movie $movie
     * @return \App\Entity\Movie\AlternativeTitle
     */
    public function setMovie(Movie $movie = null)
    {
        $this->movie = $movie;

        return $this;
    }

    /**
     * Get Movie entity (many to one).
     *
     * @return \App\Entity\Movie\Movie
     */
    public function getMovie()
    {
        return $this->movie;
    }

    public function __sleep()
    {
        return array('id', 'movie_id', 'title', 'created_date', 'updated_date');
    }
}
