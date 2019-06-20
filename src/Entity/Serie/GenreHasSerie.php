<?php

namespace App\Entity\Serie;

use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\Uuid;

/**
 * App\Entity\Serie\GenreHasSerie
 *
 * @ORM\Entity(repositoryClass="App\Repository\Serie\GenreHasSerieRepository")
 * @ORM\Table(name="genre_has_serie", indexes={@ORM\Index(name="fk_genre_serie_serie1_idx", columns={"serie_id"})})
 */
class GenreHasSerie
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
     * @ORM\Column(type="string", length=36)
     */
    protected $genre_id;

    /**
     * @ORM\ManyToOne(targetEntity="Serie", inversedBy="genreHasSeries")
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
     * @return \App\Entity\Serie\GenreHasSerie
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
     * @return \App\Entity\Serie\GenreHasSerie
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
     * Set the value of genre_id.
     *
     * @param string $genre_id
     * @return \App\Entity\Serie\GenreHasSerie
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
     * Set Serie entity (many to one).
     *
     * @param \App\Entity\Serie\Serie $serie
     * @return \App\Entity\Serie\GenreHasSerie
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
        return array('id', 'serie_id', 'genre_id');
    }
}
