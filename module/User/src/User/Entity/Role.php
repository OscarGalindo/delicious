<?php

namespace User\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Role
 *
 * @ORM\Table(name="Role", uniqueConstraints={@ORM\UniqueConstraint(name="id_role", columns={"id_role"}), @ORM\UniqueConstraint(name="role", columns={"role"})}, indexes={@ORM\Index(name="FKRole152526", columns={"id_role"})})
 * @ORM\Entity
 */
class Role
{
    /**
     * @var string
     *
     * @ORM\Column(name="role", type="string", length=255, nullable=false)
     */
    private $role;

    /**
     * @var \User\Entity\User
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="User\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_role", referencedColumnName="id_user")
     * })
     */
    private $idRole;



    /**
     * Set role
     *
     * @param string $role
     * @return Role
     */
    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get role
     *
     * @return string 
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Set idRole
     *
     * @param \User\Entity\User $idRole
     * @return Role
     */
    public function setIdRole(\User\Entity\User $idRole)
    {
        $this->idRole = $idRole;

        return $this;
    }

    /**
     * Get idRole
     *
     * @return \User\Entity\User 
     */
    public function getIdRole()
    {
        return $this->idRole;
    }
}
