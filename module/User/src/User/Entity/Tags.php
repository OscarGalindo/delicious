<?php

namespace User\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tags
 *
 * @ORM\Table(name="Tags", uniqueConstraints={@ORM\UniqueConstraint(name="id", columns={"id"}), @ORM\UniqueConstraint(name="name", columns={"name"})})
 * @ORM\Entity
 */
class Tags
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="User\Entity\Bookmarks", inversedBy="tag")
     * @ORM\JoinTable(name="tag_bookmarks",
     *   joinColumns={
     *     @ORM\JoinColumn(name="tag", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="bookmark", referencedColumnName="id")
     *   }
     * )
     */
    private $bookmark;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->bookmark = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Tags
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
     * Add bookmark
     *
     * @param \User\Entity\Bookmarks $bookmark
     * @return Tags
     */
    public function addBookmark(\User\Entity\Bookmarks $bookmark)
    {
        $this->bookmark[] = $bookmark;

        return $this;
    }

    /**
     * Remove bookmark
     *
     * @param \User\Entity\Bookmarks $bookmark
     */
    public function removeBookmark(\User\Entity\Bookmarks $bookmark)
    {
        $this->bookmark->removeElement($bookmark);
    }

    /**
     * Get bookmark
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getBookmark()
    {
        return $this->bookmark;
    }
}
