<?php

namespace App\Entity\Movie;

use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\Uuid;

/**
 * App\Entity\Movie\GenreHasMovie
 *
 * @ORM\Entity(repositoryClass="App\Repository\Movie\GenreHasMovieRepository")
 * @ORM\Table(name="genre_has_movie", indexes={@ORM\Index(name="fk_genre_has_movie_movie1_idx", columns={"movie_id"})})
 */
class GenreHasMovie
{
    /**
     * @ORM\Id
     * @ORM\Column(type="string", length=36)
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=36)
     */
    protected $genre_id;

    /**
     * @ORM\Column(type="string", length=36)
     */
    protected $movie_id;

    /**
     * @ORM\ManyToOne(targetEntity="Movie", inversedBy="genreHasMovies")
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
     * @return \App\Entity\Movie\GenreHasMovie
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
     * Set the value of genre_id.
     *
     * @param string $genre_id
     * @return \App\Entity\Movie\GenreHasMovie
     */
    public function setGenreId($genre_id)
    {
        $this->genre_id = $genre_id;

        return $this;
    }

    /**
     * Get the value of genre_id.
     *
     * @return string
     */
    public function getGenreId()
    {
        return $this->genre_id;
    }

    /**
     * Set the value of movie_id.
     *
     * @param string $movie_id
     * @return \App\Entity\Movie\GenreHasMovie
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
     * Set Movie entity (many to one).
     *
     * @param \App\Entity\Movie\Movie $movie
     * @return \App\Entity\Movie\GenreHasMovie
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
        return array('id', 'genre_id', 'movie_id');
    }
}
