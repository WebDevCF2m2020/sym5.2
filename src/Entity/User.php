<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * User
 *
 * @ORM\Table(name="user", uniqueConstraints={@ORM\UniqueConstraint(name="userlogin_UNIQUE", columns={"userlogin"}), @ORM\UniqueConstraint(name="usermail_UNIQUE", columns={"usermail"})})
 * @ORM\Entity
 */
class User implements UserInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="iduser", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $iduser;

    /**
     * @var string
     *
     * @ORM\Column(name="userlogin", type="string", length=60, nullable=false)
     */
    private $userlogin;

    /**
     * @var string
     *
     * @ORM\Column(name="userpwd", type="string", length=256, nullable=false)
     */
    private $userpwd;

    /**
     * @var string
     *
     * @ORM\Column(name="usermail", type="string", length=160, nullable=false)
     */
    private $usermail;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Role", inversedBy="userIduser")
     * @ORM\JoinTable(name="user_has_role",
     *   joinColumns={
     *     @ORM\JoinColumn(name="user_iduser", referencedColumnName="iduser")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="role_idrole", referencedColumnName="idrole")
     *   }
     * )
     */
    private $roleIdrole;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->roleIdrole = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getIduser(): ?int
    {
        return $this->iduser;
    }

    public function getUserlogin(): ?string
    {
        return $this->userlogin;
    }

    public function setUserlogin(string $userlogin): self
    {
        $this->userlogin = $userlogin;

        return $this;
    }

    public function getUserpwd(): ?string
    {
        return $this->userpwd;
    }

    public function setUserpwd(string $userpwd): self
    {
        $this->userpwd = $userpwd;

        return $this;
    }

    public function getUsermail(): ?string
    {
        return $this->usermail;
    }

    public function setUsermail(string $usermail): self
    {
        $this->usermail = $usermail;

        return $this;
    }

    /**
     * @return Collection|Role[]
     */
    public function getRoleIdrole(): Collection
    {
        return $this->roleIdrole;
    }

    public function addRoleIdrole(Role $roleIdrole): self
    {
        if (!$this->roleIdrole->contains($roleIdrole)) {
            $this->roleIdrole[] = $roleIdrole;
        }

        return $this;
    }

    public function removeRoleIdrole(Role $roleIdrole): self
    {
        $this->roleIdrole->removeElement($roleIdrole);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getRoles()
    {
        // TODO: Implement getRoles() method.
    }

    /**
     * @inheritDoc
     */
    public function getPassword()
    {
        // TODO: Implement getPassword() method.
    }

    /**
     * @inheritDoc
     */
    public function getSalt()
    {
        // TODO: Implement getSalt() method.
    }

    /**
     * @inheritDoc
     */
    public function getUsername()
    {
        // TODO: Implement getUsername() method.
    }

    /**
     * @inheritDoc
     */
    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }
}
