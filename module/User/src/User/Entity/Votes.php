<?php

namespace User\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Votes
 *
 * @ORM\Table(name="Votes", uniqueConstraints={@ORM\UniqueConstraint(name="id", columns={"id"})}, indexes={@ORM\Index(name="FKVotes473119", columns={"user"}), @ORM\Index(name="FKVotes415617", columns={"bookmark"})})
 * @ORM\Entity
 */
class Votes
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
     * @var integer
     *
     * @ORM\Column(name="vote", type="integer", nullable=false)
     */
    private $vote;

    /**
     * @var \User\Entity\Bookmarks
     *
     * @ORM\ManyToOne(targetEntity="User\Entity\Bookmarks")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="bookmark", referencedColumnName="id")
     * })
     */
    private $bookmark;

    /**
     * @var \User\Entity\Users
     *
     * @ORM\ManyToOne(targetEntity="User\Entity\Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user", referencedColumnName="id")
     * })
     */
    private $user;



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
     * Set vote
     *
     * @param integer $vote
     * @return Votes
     */
    public function setVote($vote)
    {
        $this->vote = $vote;

        return $this;
    }

    /**
     * Get vote
     *
     * @return integer 
     */
    public function getVote()
    {
        return $this->vote;
    }

    /**
     * Set bookmark
     *
     * @param \User\Entity\Bookmarks $bookmark
     * @return Votes
     */
    public function setBookmark(\User\Entity\Bookmarks $bookmark = null)
    {
        $this->bookmark = $bookmark;

        return $this;
    }

    /**
     * Get bookmark
     *
     * @return \User\Entity\Bookmarks 
     */
    public function getBookmark()
    {
        return $this->bookmark;
    }

    /**
     * Set user
     *
     * @param \User\Entity\Users $user
     * @return Votes
     */
    public function setUser(\User\Entity\Users $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \User\Entity\Users 
     */
    public function getUser()
    {
        return $this->user;
    }
}
