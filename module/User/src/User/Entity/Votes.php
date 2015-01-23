<?php

namespace User\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Votes
 *
 * @ORM\Table(name="Votes", uniqueConstraints={@ORM\UniqueConstraint(name="id_vote", columns={"id_vote"})}, indexes={@ORM\Index(name="FKVotes946267", columns={"user"}), @ORM\Index(name="FKVotes495411", columns={"bookmark"})})
 * @ORM\Entity
 */
class Votes
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_vote", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idVote;

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
     *   @ORM\JoinColumn(name="bookmark", referencedColumnName="id_bookmark")
     * })
     */
    private $bookmark;

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
     * Get idVote
     *
     * @return integer 
     */
    public function getIdVote()
    {
        return $this->idVote;
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
     * @param \User\Entity\User $user
     * @return Votes
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
}
