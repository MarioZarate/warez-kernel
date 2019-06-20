<?php

namespace App\Entity\Movie;

use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\Uuid;

/**
 * App\Entity\Movie\Gallery
 *
 * @ORM\Entity(repositoryClass="App\Repository\Movie\GalleryRepository")
 * @ORM\Table(name="gallery", indexes={@ORM\Index(name="fk_gallery_movie1_idx", columns={"movie_id"})}, uniqueConstraints={@ORM\UniqueConstraint(name="photo_UNIQUE", columns={"photo"}), @ORM\UniqueConstraint(name="id_UNIQUE", columns={"id"})})
 */
class Gallery
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
     * @ORM\Column(type="string", length=36)
     */
    protected $photo;

    /**
     * @ORM\Column(type="integer", nullable=true, options={"unsigned":true})
     */
    protected $reorder;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $created_date;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $updated_date;

    /**
     * @ORM\ManyToOne(targetEntity="Movie", inversedBy="galleries")
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
     * @return \App\Entity\Movie\Gallery
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
     * @return \App\Entity\Movie\Gallery
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
     * Set the value of photo.
     *
     * @param string $photo
     * @return \App\Entity\Movie\Gallery
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
     * Set the value of reorder.
     *
     * @param integer $reorder
     * @return \App\Entity\Movie\Gallery
     */
    public function setReorder($reorder)
    {
        $this->reorder = $reorder;

        return $this;
    }

    /**
     * Get the value of reorder.
     *
     * @return integer
     */
    public function getReorder()
    {
        return $this->reorder;
    }

    /**
     * Set the value of created_date.
     *
     * @param \DateTime $created_date
     * @return \App\Entity\Movie\Gallery
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
     * @return \App\Entity\Movie\Gallery
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
     * @return \App\Entity\Movie\Gallery
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
        return array('id', 'movie_id', 'photo', 'reorder', 'created_date', 'updated_date');
    }
}
