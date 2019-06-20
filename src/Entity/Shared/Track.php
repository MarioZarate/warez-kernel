<?php

namespace App\Entity\Shared;

use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\Uuid;

/**
 * App\Entity\Track
 *
 * @ORM\Entity(repositoryClass="App\Repository\TrackRepository")
 * @ORM\Table(name="track", indexes={@ORM\Index(name="fk_track_playlist1_idx", columns={"playlist_id"})})
 */
class Track
{
    /**
     * @ORM\Id
     * @ORM\Column(type="string", length=36)
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=36)
     */
    protected $playlist_id;

    /**
     * @ORM\Column(type="string", length=36)
     */
    protected $entity_id;

    /**
     * @ORM\Column(type="integer", nullable=true)
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
     * @ORM\ManyToOne(targetEntity="Playlist", inversedBy="tracks")
     * @ORM\JoinColumn(name="playlist_id", referencedColumnName="id", nullable=false, onDelete="CASCADE")
     */
    protected $playlist;

    public function __construct()
    {
        $this->id = Uuid::uuid4();
    }

    /**
     * Set the value of id.
     *
     * @param string $id
     * @return \App\Entity\Shared\Track
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
     * Set the value of playlist_id.
     *
     * @param string $playlist_id
     * @return \App\Entity\Shared\Track
     */
    public function setPlaylistId($playlist_id)
    {
        $this->playlist_id = $playlist_id;

        return $this;
    }

    /**
     * Get the value of playlist_id.
     *
     * @return string
     */
    public function getPlaylistId()
    {
        return $this->playlist_id;
    }

    /**
     * Set the value of entity_id.
     *
     * @param string $entity_id
     * @return \App\Entity\Shared\Track
     */
    public function setEntityId($entity_id)
    {
        $this->entity_id = $entity_id;

        return $this;
    }

    /**
     * Get the value of entity_id.
     *
     * @return string
     */
    public function getEntityId()
    {
        return $this->entity_id;
    }

    /**
     * Set the value of reorder.
     *
     * @param integer $reorder
     * @return \App\Entity\Shared\Track
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
     * @return \App\Entity\Shared\Track
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
     * @return \App\Entity\Shared\Track
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
     * Set Playlist entity (many to one).
     *
     * @param \App\Entity\Shared\Playlist $playlist
     * @return \App\Entity\Shared\Track
     */
    public function setPlaylist(Playlist $playlist = null)
    {
        $this->playlist = $playlist;

        return $this;
    }

    /**
     * Get Playlist entity (many to one).
     *
     * @return \App\Entity\Shared\Playlist
     */
    public function getPlaylist()
    {
        return $this->playlist;
    }

    public function __sleep()
    {
        return array('id', 'playlist_id', 'entity_id', 'reorder', 'created_date', 'updated_date');
    }
}
