<?php

namespace App\\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Role
 *
 * @ORM\Table(name="role", uniqueConstraints={@ORM\UniqueConstraint(name="rolename_UNIQUE", columns={"rolename"})})
 * @ORM\Entity
 */
class Role
{
    /**
     * @var int
     *
     * @ORM\Column(name="idrole", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idrole;

    /**
     * @var string
     *
     * @ORM\Column(name="rolename", type="string", length=100, nullable=false)
     */
    private $rolename;

    /**
     * @var string
     *
     * @ORM\Column(name="rolevalue", type="string", length=45, nullable=false)
     */
    private $rolevalue;

    /**
     * @var string
     *
     * @ORM\Column(name="rolecol", type="string", length=20, nullable=false)
     */
    private $rolecol;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="User", mappedBy="roleIdrole")
     */
    private $userIduser;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->userIduser = new \Doctrine\Common\Collections\ArrayCollection();
    }

}
