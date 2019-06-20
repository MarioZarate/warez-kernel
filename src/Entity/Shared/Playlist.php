<?php

namespace App\Entity\Shared;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Ramsey\Uuid\Uuid;

/**
 * App\Entity\Playlist
 *
 * @ORM\Entity(repositoryClass="App\Repository\PlaylistRepository")
 * @ORM\Table(name="playlist", uniqueConstraints={@ORM\UniqueConstraint(name="slug_UNIQUE", columns={"slug"}), @ORM\UniqueConstraint(name="photo_UNIQUE", columns={"photo"})})
 */
class Playlist
{
    /**
     * @ORM\Id
     * @ORM\Column(type="string", length=36)
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=36)
     */
    protected $entity_type;

    /**
     * @ORM\Column(name="`name`", type="string", length=180)
     */
    protected $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $slug;

    /**
     * @ORM\Column(type="string", length=36)
     */
    protected $photo;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $created_date;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $updated_date;

    /**
     * @ORM\OneToMany(targetEntity="Track", mappedBy="playlist")
     * @ORM\JoinColumn(name="id", referencedColumnName="playlist_id", nullable=false, onDelete="CASCADE")
     */
    protected $tracks;

    public function __construct()
    {
        $this->id = Uuid::uuid4();
        $this->tracks = new ArrayCollection();
    }

    /**
     * Set the value of id.
     *
     * @param string $id
     * @return \App\Entity\Shared\Playlist
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
     * Set the value of entity_type.
     *
     * @param string $entity_type
     * @return \App\Entity\Shared\Playlist
     */
    public function setEntityType($entity_type)
    {
        $this->entity_type = $entity_type;

        return $this;
    }

    /**
     * Get the value of entity_type.
     *
     * @return string
     */
    public function getEntityType()
    {
        return $this->entity_type;
    }

    /**
     * Set the value of name.
     *
     * @param string $name
     * @return \App\Entity\Shared\Playlist
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
     * Set the value of slug.
     *
     * @param string $slug
     * @return \App\Entity\Shared\Playlist
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
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
     * Set the value of photo.
     *
     * @param string $photo
     * @return \App\Entity\Shared\Playlist
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
     * Set the value of created_date.
     *
     * @param \DateTime $created_date
     * @return \App\Entity\Shared\Playlist
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
     * @return \App\Entity\Shared\Playlist
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
     * Add Track entity to collection (one to many).
     *
     * @param \App\Entity\Shared\Track $track
     * @return \App\Entity\Shared\Playlist
     */
    public function addTrack(Track $track)
    {
        $this->tracks[] = $track;

        return $this;
    }

    /**
     * Remove Track entity from collection (one to many).
     *
     * @param \App\Entity\Shared\Track $track
     * @return \App\Entity\Shared\Playlist
     */
    public function removeTrack(Track $track)
    {
        $this->tracks->removeElement($track);

        return $this;
    }

    /**
     * Get Track entity collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTracks()
    {
        return $this->tracks;
    }

    public function getTracksFormatArray()
    {
        $response = [];
        foreach ($this->tracks as $track) {
            $response[] = [
                'id' => $track->getId(),
                'entity_id' => $track->getEntityId(),
                'reorder' => $track->getReorder()
            ];
        }
        usort($response, function($a, $b) {
            return $a['reorder'] <=> $b['reorder'];
        });
        return $response;
    }

    public function __sleep()
    {
        return array('id', 'entity_type', 'name', 'slug', 'photo','created_date', 'updated_date');
    }
}
