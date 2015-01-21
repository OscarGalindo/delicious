<?php

namespace User\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tag
 *
 * @ORM\Table(name="Tag", uniqueConstraints={@ORM\UniqueConstraint(name="id_tag", columns={"id_tag"}), @ORM\UniqueConstraint(name="name", columns={"name"})})
 * @ORM\Entity
 */
class Tag
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_tag", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idTag;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="User\Entity\Bookmarks", inversedBy="tagidTag")
     * @ORM\JoinTable(name="tag_bookmarks",
     *   joinColumns={
     *     @ORM\JoinColumn(name="Tagid_tag", referencedColumnName="id_tag")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="Bookmarksid_bookmark", referencedColumnName="id_bookmark")
     *   }
     * )
     */
    private $bookmarksidBookmark;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->bookmarksidBookmark = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Get idTag
     *
     * @return integer 
     */
    public function getIdTag()
    {
        return $this->idTag;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Tag
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Add bookmarksidBookmark
     *
     * @param \User\Entity\Bookmarks $bookmarksidBookmark
     * @return Tag
     */
    public function addBookmarksidBookmark(\User\Entity\Bookmarks $bookmarksidBookmark)
    {
        $this->bookmarksidBookmark[] = $bookmarksidBookmark;

        return $this;
    }

    /**
     * Remove bookmarksidBookmark
     *
     * @param \User\Entity\Bookmarks $bookmarksidBookmark
     */
    public function removeBookmarksidBookmark(\User\Entity\Bookmarks $bookmarksidBookmark)
    {
        $this->bookmarksidBookmark->removeElement($bookmarksidBookmark);
    }

    /**
     * Get bookmarksidBookmark
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getBookmarksidBookmark()
    {
        return $this->bookmarksidBookmark;
    }
}
