<?php

namespace App\Entity\Serie;

use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\Uuid;

/**
 * App\Entity\Serie\Cast
 *
 * @ORM\Entity(repositoryClass="App\Repository\Serie\CastRepository")
 * @ORM\Table(name="`cast`", indexes={@ORM\Index(name="fk_cast_serie1_idx", columns={"serie_id"})}, uniqueConstraints={@ORM\UniqueConstraint(name="id_UNIQUE", columns={"id"}), @ORM\UniqueConstraint(name="photo_UNIQUE", columns={"photo"})})
 */
class Cast
{
    /**
     * @ORM\Id
     * @ORM\Column(type="string", length=36)
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=36)
     */
    protected $actor_id;

    /**
     * @ORM\Column(type="string", length=36)
     */
    protected $serie_id;

    /**
     * @ORM\Column(name="`name`", type="string", length=180)
     */
    protected $name;

    /**
     * @ORM\Column(type="string", length=36, nullable=true)
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
     * @ORM\ManyToOne(targetEntity="Serie", inversedBy="casts")
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
     * @return \App\Entity\Serie\Cast
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
     * Set the value of actor_id.
     *
     * @param string $actor_id
     * @return \App\Entity\Serie\Cast
     */
    public function setActorId($actor_id)
    {
        $this->actor_id = $actor_id;

        return $this;
    }

    /**
     * Get the value of actor_id.
     *
     * @return string
     */
    public function getActorId()
    {
        return $this->actor_id;
    }

    /**
     * Set the value of serie_id.
     *
     * @param string $serie_id
     * @return \App\Entity\Serie\Cast
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
     * Set the value of name.
     *
     * @param string $name
     * @return \App\Entity\Serie\Cast
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
     * Set the value of photo.
     *
     * @param string $photo
     * @return \App\Entity\Serie\Cast
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
     * @return \App\Entity\Serie\Cast
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
     * @return \App\Entity\Serie\Cast
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
     * @return \App\Entity\Serie\Cast
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
     * Set Serie entity (many to one).
     *
     * @param \App\Entity\Serie\Serie $serie
     * @return \App\Entity\Serie\Cast
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
        return array('id', 'actor_id', 'serie_id', 'name', 'photo', 'reorder', 'created_date', 'updated_date');
    }
}
