<?php

namespace App\\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table(name="user", uniqueConstraints={@ORM\UniqueConstraint(name="userlogin_UNIQUE", columns={"userlogin"}), @ORM\UniqueConstraint(name="usermail_UNIQUE", columns={"usermail"})})
 * @ORM\Entity
 */
class User
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

}
