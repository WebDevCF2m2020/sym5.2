<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    public function getIdsection(): ?int
    {
        return $this->idsection;
    }

    public function getSectiontitle(): ?string
    {
        return $this->sectiontitle;
    }

    public function setSectiontitle(string $sectiontitle): self
    {
        $this->sectiontitle = $sectiontitle;

        return $this;
    }

    public function getSectionslug(): ?string
    {
        return $this->sectionslug;
    }

    public function setSectionslug(string $sectionslug): self
    {
        $this->sectionslug = $sectionslug;

        return $this;
    }

    public function getSectiondesc(): ?string
    {
        return $this->sectiondesc;
    }

    public function setSectiondesc(?string $sectiondesc): self
    {
        $this->sectiondesc = $sectiondesc;

        return $this;
    }

    /**
     * @return Collection|Message[]
     */
    public function getMessageIdmessage(): Collection
    {
        return $this->messageIdmessage;
    }

    public function addMessageIdmessage(Message $messageIdmessage): self
    {
        if (!$this->messageIdmessage->contains($messageIdmessage)) {
            $this->messageIdmessage[] = $messageIdmessage;
            $messageIdmessage->addSectionIdsection($this);
        }

        return $this;
    }

    public function removeMessageIdmessage(Message $messageIdmessage): self
    {
        if ($this->messageIdmessage->removeElement($messageIdmessage)) {
            $messageIdmessage->removeSectionIdsection($this);
        }

        return $this;
    }

}
