<?php

namespace App\\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Section
 *
 * @ORM\Table(name="section", uniqueConstraints={@ORM\UniqueConstraint(name="sectionslug_UNIQUE", columns={"sectionslug"})})
 * @ORM\Entity
 */
class Section
{
    /**
     * @var int
     *
     * @ORM\Column(name="idsection", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idsection;

    /**
     * @var string
     *
     * @ORM\Column(name="sectiontitle", type="string", length=100, nullable=false)
     */
    private $sectiontitle;

    /**
     * @var string
     *
     * @ORM\Column(name="sectionslug", type="string", length=100, nullable=false)
     */
    private $sectionslug;

    /**
     * @var string|null
     *
     * @ORM\Column(name="sectiondesc", type="string", length=500, nullable=true)
     */
    private $sectiondesc;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Message", mappedBy="sectionIdsection")
     */
    private $messageIdmessage;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->messageIdmessage = new \Doctrine\Common\Collections\ArrayCollection();
    }

}
