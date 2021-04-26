<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Message
 *
 * @ORM\Table(name="message", uniqueConstraints={@ORM\UniqueConstraint(name="messageslug_UNIQUE", columns={"messageslug"})}, indexes={@ORM\Index(name="fk_message_user1_idx", columns={"user_iduser"})})
 * @ORM\Entity
 */
class Message
{
    /**
     * @var int
     *
     * @ORM\Column(name="idmessage", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idmessage;

    /**
     * @var string
     *
     * @ORM\Column(name="messagetitle", type="string", length=150, nullable=false)
     */
    private $messagetitle;

    /**
     * @var string
     *
     * @ORM\Column(name="messageslug", type="string", length=150, nullable=false)
     */
    private $messageslug;

    /**
     * @var string
     *
     * @ORM\Column(name="messagetext", type="text", length=65535, nullable=false)
     */
    private $messagetext;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="messagedate", type="datetime", nullable=true, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $messagedate = 'CURRENT_TIMESTAMP';

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_iduser", referencedColumnName="iduser")
     * })
     */
    private $userIduser;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Section", inversedBy="messageIdmessage")
     * @ORM\JoinTable(name="message_has_section",
     *   joinColumns={
     *     @ORM\JoinColumn(name="message_idmessage", referencedColumnName="idmessage")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="section_idsection", referencedColumnName="idsection")
     *   }
     * )
     */
    private $sectionIdsection;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->sectionIdsection = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getIdmessage(): ?int
    {
        return $this->idmessage;
    }

    public function getMessagetitle(): ?string
    {
        return $this->messagetitle;
    }

    public function setMessagetitle(string $messagetitle): self
    {
        $this->messagetitle = $messagetitle;

        return $this;
    }

    public function getMessageslug(): ?string
    {
        return $this->messageslug;
    }

    public function setMessageslug(string $messageslug): self
    {
        $this->messageslug = $messageslug;

        return $this;
    }

    public function getMessagetext(): ?string
    {
        return $this->messagetext;
    }

    public function setMessagetext(string $messagetext): self
    {
        $this->messagetext = $messagetext;

        return $this;
    }

    public function getMessagedate(): ?\DateTimeInterface
    {
        return $this->messagedate;
    }

    public function setMessagedate(?\DateTimeInterface $messagedate): self
    {
        $this->messagedate = $messagedate;

        return $this;
    }

    public function getUserIduser(): ?User
    {
        return $this->userIduser;
    }

    public function setUserIduser(?User $userIduser): self
    {
        $this->userIduser = $userIduser;

        return $this;
    }

    /**
     * @return Collection|Section[]
     */
    public function getSectionIdsection(): Collection
    {
        return $this->sectionIdsection;
    }

    public function addSectionIdsection(Section $sectionIdsection): self
    {
        if (!$this->sectionIdsection->contains($sectionIdsection)) {
            $this->sectionIdsection[] = $sectionIdsection;
        }

        return $this;
    }

    public function removeSectionIdsection(Section $sectionIdsection): self
    {
        $this->sectionIdsection->removeElement($sectionIdsection);

        return $this;
    }

}
