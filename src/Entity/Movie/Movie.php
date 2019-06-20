<?php

namespace App\Entity\Movie;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Ramsey\Uuid\Uuid;

/**
 * App\Entity\Movie\Movie
 *
 * @ORM\Entity(repositoryClass="App\Repository\Movie\MovieRepository")
 * @ORM\Table(name="movie", uniqueConstraints={@ORM\UniqueConstraint(name="slug_UNIQUE", columns={"slug"}), @ORM\UniqueConstraint(name="id_UNIQUE", columns={"id"}), @ORM\UniqueConstraint(name="trailer_UNIQUE", columns={"trailer"})})
 */
class Movie
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
     * @ORM\Column(type="string", length=180)
     */
    protected $title;

    /**
     * @ORM\Column(type="string", length=180)
     */
    protected $title_original;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $slug;

    /**
     * @ORM\Column(type="string", length=36)
     */
    protected $cover;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $release_date;

    /**
     * @ORM\Column(type="string", length=12, nullable=true)
     */
    protected $trailer;

    /**
     * @ORM\Column(type="string", length=45)
     */
    protected $restriction;

    /**
     * @ORM\Column(type="text")
     */
    protected $synopsis;

    /**
     * @ORM\Column(type="integer", options={"unsigned":true})
     */
    protected $duration;

    /**
     * @ORM\Column(type="smallint")
     */
    protected $is_approved;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $created_date;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $updated_date;

    /**
     * @ORM\Column(name="`status`", type="string", length=15)
     */
    protected $status;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $status_date;

    /**
     * @ORM\Column(type="integer", nullable=true, options={"unsigned":true})
     */
    protected $reorder_status;

    /**
     * @ORM\OneToMany(targetEntity="AlternativeTitle", mappedBy="movie")
     * @ORM\JoinColumn(name="id", referencedColumnName="movie_id", nullable=false, onDelete="CASCADE")
     */
    protected $alternativeTitles;

    /**
     * @ORM\OneToMany(targetEntity="Cast", mappedBy="movie")
     * @ORM\JoinColumn(name="id", referencedColumnName="movie_id", nullable=false, onDelete="CASCADE")
     */
    protected $casts;

    /**
     * @ORM\OneToMany(targetEntity="Gallery", mappedBy="movie")
     * @ORM\JoinColumn(name="id", referencedColumnName="movie_id", nullable=false, onDelete="CASCADE")
     */
    protected $galleries;

    /**
     * @ORM\OneToMany(targetEntity="GenreHasMovie", mappedBy="movie")
     * @ORM\JoinColumn(name="id", referencedColumnName="movie_id", nullable=false, onDelete="CASCADE")
     */
    protected $genreHasMovies;

    public function __construct()
    {
        $this->alternativeTitles = new ArrayCollection();
        $this->casts = new ArrayCollection();
        $this->galleries = new ArrayCollection();
        $this->genreHasMovies = new ArrayCollection();
        $this->id = Uuid::uuid4();
    }

    /**
     * Set the value of id.
     *
     * @param string $id
     * @return \App\Entity\Movie\Movie
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
     * @return \App\Entity\Movie\Movie
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
     * Set the value of title.
     *
     * @param string $title
     * @return \App\Entity\Movie\Movie
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
     * Set the value of title_original.
     *
     * @param string $title_original
     * @return \App\Entity\Movie\Movie
     */
    public function setTitleOriginal($title_original)
    {
        $this->title_original = $title_original;

        return $this;
    }

    /**
     * Get the value of title_original.
     *
     * @return string
     */
    public function getTitleOriginal()
    {
        return $this->title_original;
    }

    /**
     * Set the value of slug.
     *
     * @param string $slug
     * @return \App\Entity\Movie\Movie
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
     * Set the value of cover.
     *
     * @param string $cover
     * @return \App\Entity\Movie\Movie
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
     * Set the value of release_date.
     *
     * @param \DateTime $release_date
     * @return \App\Entity\Movie\Movie
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
     * Set the value of trailer.
     *
     * @param string $trailer
     * @return \App\Entity\Movie\Movie
     */
    public function setTrailer($trailer)
    {
        $this->trailer = $trailer;

        return $this;
    }

    /**
     * Get the value of trailer.
     *
     * @return string
     */
    public function getTrailer()
    {
        return $this->trailer;
    }

    /**
     * Set the value of restriction.
     *
     * @param string $restriction
     * @return \App\Entity\Movie\Movie
     */
    public function setRestriction($restriction)
    {
        $this->restriction = $restriction;

        return $this;
    }

    /**
     * Get the value of restriction.
     *
     * @return string
     */
    public function getRestriction()
    {
        return $this->restriction;
    }

    /**
     * Set the value of synopsis.
     *
     * @param string $synopsis
     * @return \App\Entity\Movie\Movie
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
     * Set the value of duration.
     *
     * @param integer $duration
     * @return \App\Entity\Movie\Movie
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;

        return $this;
    }

    /**
     * Get the value of duration.
     *
     * @return integer
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * Set the value of is_approved.
     *
     * @param integer $is_approved
     * @return \App\Entity\Movie\Movie
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
     * Set the value of created_date.
     *
     * @param \DateTime $created_date
     * @return \App\Entity\Movie\Movie
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
     * @return \App\Entity\Movie\Movie
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
     * Set the value of status.
     *
     * @param string $status
     * @return \App\Entity\Movie\Movie
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get the value of status.
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of status_date.
     *
     * @param \DateTime $status_date
     * @return \App\Entity\Movie\Movie
     */
    public function setStatusDate($status_date)
    {
        $this->status_date = $status_date;

        return $this;
    }

    /**
     * Get the value of status_date.
     *
     * @return \DateTime
     */
    public function getStatusDate()
    {
        return $this->status_date;
    }

    /**
     * Set the value of reorder_status.
     *
     * @param integer $reorder_status
     * @return \App\Entity\Movie\Movie
     */
    public function setReorderStatus($reorder_status)
    {
        $this->reorder_status = $reorder_status;

        return $this;
    }

    /**
     * Get the value of reorder_status.
     *
     * @return integer
     */
    public function getReorderStatus()
    {
        return $this->reorder_status;
    }

    /**
     * Add AlternativeTitle entity to collection (one to many).
     *
     * @param \App\Entity\Movie\AlternativeTitle $alternativeTitle
     * @return \App\Entity\Movie\Movie
     */
    public function addAlternativeTitle(AlternativeTitle $alternativeTitle)
    {
        $this->alternativeTitles[] = $alternativeTitle;

        return $this;
    }

    /**
     * Remove AlternativeTitle entity from collection (one to many).
     *
     * @param \App\Entity\Movie\AlternativeTitle $alternativeTitle
     * @return \App\Entity\Movie\Movie
     */
    public function removeAlternativeTitle(AlternativeTitle $alternativeTitle)
    {
        $this->alternativeTitles->removeElement($alternativeTitle);

        return $this;
    }

    /**
     * Get AlternativeTitle entity collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAlternativeTitles()
    {
        return $this->alternativeTitles;
    }

    /**
     * Add Cast entity to collection (one to many).
     *
     * @param \App\Entity\Movie\Cast $cast
     * @return \App\Entity\Movie\Movie
     */
    public function addCast(Cast $cast)
    {
        $this->casts[] = $cast;

        return $this;
    }

    /**
     * Remove Cast entity from collection (one to many).
     *
     * @param \App\Entity\Movie\Cast $cast
     * @return \App\Entity\Movie\Movie
     */
    public function removeCast(Cast $cast)
    {
        $this->casts->removeElement($cast);

        return $this;
    }

    /**
     * Get Cast entity collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCasts()
    {
        return $this->casts;
    }

    /**
     * Add Gallery entity to collection (one to many).
     *
     * @param \App\Entity\Movie\Gallery $gallery
     * @return \App\Entity\Movie\Movie
     */
    public function addGallery(Gallery $gallery)
    {
        $this->galleries[] = $gallery;

        return $this;
    }

    /**
     * Remove Gallery entity from collection (one to many).
     *
     * @param \App\Entity\Movie\Gallery $gallery
     * @return \App\Entity\Movie\Movie
     */
    public function removeGallery(Gallery $gallery)
    {
        $this->galleries->removeElement($gallery);

        return $this;
    }

    /**
     * Get Gallery entity collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getGalleries()
    {
        return $this->galleries;
    }

    /**
     * Add GenreHasMovie entity to collection (one to many).
     *
     * @param \App\Entity\Movie\GenreHasMovie $genreHasMovie
     * @return \App\Entity\Movie\Movie
     */
    public function addGenreHasMovie(GenreHasMovie $genreHasMovie)
    {
        $this->genreHasMovies[] = $genreHasMovie;

        return $this;
    }

    /**
     * Remove GenreHasMovie entity from collection (one to many).
     *
     * @param \App\Entity\Movie\GenreHasMovie $genreHasMovie
     * @return \App\Entity\Movie\Movie
     */
    public function removeGenreHasMovie(GenreHasMovie $genreHasMovie)
    {
        $this->genreHasMovies->removeElement($genreHasMovie);

        return $this;
    }

    /**
     * Get GenreHasMovie entity collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getGenreHasMovies()
    {
        return $this->genreHasMovies;
    }

    /**
     * Get AlternativeTitle entity collection.
     *
     * @return array
     */
    public function getAlternativeTitlesFormatArrayWithTitle()
    {
        $response = [];
        foreach ($this->alternativeTitles as $alternative_title) {
            $response[] = $alternative_title->getTitle();
        }
        return $response;
    }

    /**
     * Get Cast entity collection.
     *
     * @return array
     */
    public function getCastsFormatArrayWithIdActorIdNamePhoto()
    {
        $response = [];
        foreach ($this->casts as $cast) {
            $response[] = [
                'id' => $cast->getId(),
                'name' => $cast->getName(),
                'photo' => $cast->getPhoto(),
                'actor_id' => $cast->getActorId(),
                'reorder' => $cast->getReorder()
            ];
        }
        usort($response, function($a, $b) {
            return $a['reorder'] <=> $b['reorder'];
        });
        return $response;
    }

    /**
     * Get Gsllery entity collection.
     *
     * @return array
     */
    public function getGalleriesFormArrayWithIdPhoto()
    {
        $response = [];
        foreach ($this->galleries as $gallery) {
            $response[] = [
                'id' => $gallery->getId(),
                'photo' => $gallery->getPhoto(),
                'reorder' => $gallery->getReorder()
            ];
        }
        usort($response, function($a, $b) {
            return $a['reorder'] <=> $b['reorder'];
        });
        return $response;
    }

    /**
     * Get Genre entity collection.
     *
     * @return array
     */
    public function getGenresFormatArrayWithId()
    {
        $response = [];
        foreach ($this->genreHasMovies as $genreHasMovie) {
            $response[] = $genreHasMovie->getGenreId();
        }
        return $response;
    }

    public function __sleep()
    {
        return array('id', 'country_id', 'title', 'title_original', 'slug', 'cover', 'release_date', 'trailer', 'restriction', 'synopsis', 'duration', 'is_approved', 'created_date', 'updated_date', 'status', 'status_date', 'reorder_status');
    }
}
