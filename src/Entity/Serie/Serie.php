<?php

namespace App\Entity\Serie;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Ramsey\Uuid\Uuid;

/**
 * App\Entity\Serie\Serie
 *
 * @ORM\Entity(repositoryClass="App\Repository\Serie\SerieRepository")
 * @ORM\Table(name="serie", uniqueConstraints={@ORM\UniqueConstraint(name="id_UNIQUE", columns={"id"}), @ORM\UniqueConstraint(name="slug_UNIQUE", columns={"slug"}), @ORM\UniqueConstraint(name="small_cover_UNIQUE", columns={"cover_square"}), @ORM\UniqueConstraint(name="cover_UNIQUE", columns={"cover"}), @ORM\UniqueConstraint(name="trailer_UNIQUE", columns={"trailer"})})
 */
class Serie
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
     * @ORM\Column(type="string", length=36)
     */
    protected $cover_square;

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
     * @ORM\Column(type="smallint")
     */
    protected $is_approved;

    /**
     * @ORM\Column(name="`status`", type="string", length=45)
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
     * @ORM\Column(type="datetime")
     */
    protected $created_date;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $updated_date;

    /**
     * @ORM\OneToMany(targetEntity="AlternativeTitle", mappedBy="serie")
     * @ORM\JoinColumn(name="id", referencedColumnName="serie_id", nullable=false, onDelete="CASCADE")
     */
    protected $alternativeTitles;

    /**
     * @ORM\OneToMany(targetEntity="Cast", mappedBy="serie")
     * @ORM\JoinColumn(name="id", referencedColumnName="serie_id", nullable=false, onDelete="CASCADE")
     */
    protected $casts;

    /**
     * @ORM\OneToMany(targetEntity="Gallery", mappedBy="serie")
     * @ORM\JoinColumn(name="id", referencedColumnName="serie_id", nullable=false, onDelete="CASCADE")
     */
    protected $galleries;

    /**
     * @ORM\OneToMany(targetEntity="GenreHasSerie", mappedBy="serie")
     * @ORM\JoinColumn(name="id", referencedColumnName="serie_id", nullable=false, onDelete="CASCADE")
     */
    protected $genreHasSeries;

    /**
     * @ORM\OneToMany(targetEntity="Season", mappedBy="serie")
     * @ORM\JoinColumn(name="id", referencedColumnName="serie_id", nullable=false, onDelete="CASCADE")
     */
    protected $seasons;

    public function __construct()
    {
        $this->alternativeTitles = new ArrayCollection();
        $this->casts = new ArrayCollection();
        $this->galleries = new ArrayCollection();
        $this->genreHasSeries = new ArrayCollection();
        $this->seasons = new ArrayCollection();
        $this->id = Uuid::uuid4();
    }

    /**
     * Set the value of id.
     *
     * @param string $id
     * @return \App\Entity\Serie\Serie
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
     * @return \App\Entity\Serie\Serie
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
     * @return \App\Entity\Serie\Serie
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
     * @return \App\Entity\Serie\Serie
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
     * @return \App\Entity\Serie\Serie
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
     * @return \App\Entity\Serie\Serie
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
     * Set the value of cover_square.
     *
     * @param string $cover_square
     * @return \App\Entity\Serie\Serie
     */
    public function setCoverSquare($cover_square)
    {
        $this->cover_square = $cover_square;

        return $this;
    }

    /**
     * Get the value of cover_square.
     *
     * @return string
     */
    public function getCoverSquare()
    {
        return $this->cover_square;
    }

    /**
     * Set the value of release_date.
     *
     * @param \DateTime $release_date
     * @return \App\Entity\Serie\Serie
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
     * @return \App\Entity\Serie\Serie
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
     * @return \App\Entity\Serie\Serie
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
     * @return \App\Entity\Serie\Serie
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
     * Set the value of is_approved.
     *
     * @param integer $is_approved
     * @return \App\Entity\Serie\Serie
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
     * Set the value of status.
     *
     * @param string $status
     * @return \App\Entity\Serie\Serie
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
     * @return \App\Entity\Serie\Serie
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
     * @return \App\Entity\Serie\Serie
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
     * Set the value of created_date.
     *
     * @param \DateTime $created_date
     * @return \App\Entity\Serie\Serie
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
     * @return \App\Entity\Serie\Serie
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
     * Add AlternativeTitle entity to collection (one to many).
     *
     * @param \App\Entity\Serie\AlternativeTitle $alternativeTitle
     * @return \App\Entity\Serie\Serie
     */
    public function addAlternativeTitle(AlternativeTitle $alternativeTitle)
    {
        $this->alternativeTitles[] = $alternativeTitle;

        return $this;
    }

    /**
     * Remove AlternativeTitle entity from collection (one to many).
     *
     * @param \App\Entity\Serie\AlternativeTitle $alternativeTitle
     * @return \App\Entity\Serie\Serie
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
     * @param \App\Entity\Serie\Cast $cast
     * @return \App\Entity\Serie\Serie
     */
    public function addCast(Cast $cast)
    {
        $this->casts[] = $cast;

        return $this;
    }

    /**
     * Remove Cast entity from collection (one to many).
     *
     * @param \App\Entity\Serie\Cast $cast
     * @return \App\Entity\Serie\Serie
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
     * @param \App\Entity\Serie\Gallery $gallery
     * @return \App\Entity\Serie\Serie
     */
    public function addGallery(Gallery $gallery)
    {
        $this->galleries[] = $gallery;

        return $this;
    }

    /**
     * Remove Gallery entity from collection (one to many).
     *
     * @param \App\Entity\Gallery $gallery
     * @return \App\Entity\Serie
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
     * Add GenreHasSerie entity to collection (one to many).
     *
     * @param \App\Entity\Serie\GenreHasSerie $genreHasSerie
     * @return \App\Entity\Serie\Serie
     */
    public function addGenreHasSerie(GenreHasSerie $genreHasSerie)
    {
        $this->genreHasSeries[] = $genreHasSerie;

        return $this;
    }

    /**
     * Remove GenreHasSerie entity from collection (one to many).
     *
     * @param \App\Entity\Serie\GenreHasSerie $genreHasSerie
     * @return \App\Entity\Serie\Serie
     */
    public function removeGenreHasSerie(GenreHasSerie $genreHasSerie)
    {
        $this->genreHasSeries->removeElement($genreHasSerie);

        return $this;
    }

    /**
     * Get GenreHasSerie entity collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getGenreHasSeries()
    {
        return $this->genreHasSeries;
    }

    /**
     * Add Season entity to collection (one to many).
     *
     * @param \App\Entity\Serie\Season $season
     * @return \App\Entity\Serie\Serie
     */
    public function addSeason(Season $season)
    {
        $this->seasons[] = $season;

        return $this;
    }

    /**
     * Remove Season entity from collection (one to many).
     *
     * @param \App\Entity\Serie\Season $season
     * @return \App\Entity\Serie\Serie
     */
    public function removeSeason(Season $season)
    {
        $this->seasons->removeElement($season);

        return $this;
    }

    /**
     * Get Season entity collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSeasons()
    {
        return $this->seasons;
    }

    public function getAlternativeTitlesFormatArrayWithTitle()
    {
        $response = [];
        foreach ($this->alternativeTitles as $alternative_title) {
            $response[] = $alternative_title->getTitle();
        }
        return $response;
    }

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
        foreach ($this->genreHasSeries as $genreHasSerie) {
            $response[] = $genreHasSerie->getGenreId();
        }
        return $response;
    }

    public function __sleep()
    {
        return array('id', 'country_id', 'title', 'title_original', 'slug', 'cover', 'cover_square', 'release_date', 'trailer', 'restriction', 'synopsis', 'is_approved', 'status', 'status_date', 'reorder_status', 'created_date', 'updated_date');
    }
}
