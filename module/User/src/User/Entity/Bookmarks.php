<?php

namespace User\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Bookmarks
 *
 * @ORM\Table(name="Bookmarks", uniqueConstraints={@ORM\UniqueConstraint(name="url", columns={"url"}), @ORM\UniqueConstraint(name="id_bookmark", columns={"id_bookmark"})}, indexes={@ORM\Index(name="UserBookmarks", columns={"user"})})
 * @ORM\Entity
 */
class Bookmarks
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_bookmark", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idBookmark;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=255, nullable=false)
     */
    private $url;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=false)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=false)
     */
    private $createdAt = 'CURRENT_TIMESTAMP';

    /**
     * @var \User\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="User\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user", referencedColumnName="id_user")
     * })
     */
    private $user;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="User\Entity\Tag", mappedBy="bookmarksidBookmark")
     */
    private $tagidTag;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="User\Entity\User", mappedBy="idBookmark")
     */
    private $idUser;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->tagidTag = new \Doctrine\Common\Collections\ArrayCollection();
        $this->idUser = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Get idBookmark
     *
     * @return integer 
     */
    public function getIdBookmark()
    {
        return $this->idBookmark;
    }

    /**
     * Set url
     *
     * @param string $url
     * @return Bookmarks
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string 
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Bookmarks
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Bookmarks
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Bookmarks
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set user
     *
     * @param \User\Entity\User $user
     * @return Bookmarks
     */
    public function setUser(\User\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \User\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Add tagidTag
     *
     * @param \User\Entity\Tag $tagidTag
     * @return Bookmarks
     */
    public function addTagidTag(\User\Entity\Tag $tagidTag)
    {
        $this->tagidTag[] = $tagidTag;

        return $this;
    }

    /**
     * Remove tagidTag
     *
     * @param \User\Entity\Tag $tagidTag
     */
    public function removeTagidTag(\User\Entity\Tag $tagidTag)
    {
        $this->tagidTag->removeElement($tagidTag);
    }

    /**
     * Get tagidTag
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTagidTag()
    {
        return $this->tagidTag;
    }

    /**
     * Add idUser
     *
     * @param \User\Entity\User $idUser
     * @return Bookmarks
     */
    public function addIdUser(\User\Entity\User $idUser)
    {
        $this->idUser[] = $idUser;

        return $this;
    }

    /**
     * Remove idUser
     *
     * @param \User\Entity\User $idUser
     */
    public function removeIdUser(\User\Entity\User $idUser)
    {
        $this->idUser->removeElement($idUser);
    }

    /**
     * Get idUser
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIdUser()
    {
        return $this->idUser;
    }
}
