<?php 

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;
#[ORM\Entity]
class ContactEntity {
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private ?int $id;

    #[ORM\Column(type: "datetime_immutable", options: ["default" => "CURRENT_TIMESTAMP"])]
    private \DateTimeImmutable $createdAt; 
    
    #[Assert\NotBlank]
    #[Assert\Length(min: 2)]
    #[Assert\Length(max: 32)]
    #[ORM\Column(type: "string")]
    private string $firstname;
    
    #[Assert\Length(min: 2)]
    #[Assert\Length(max: 32)]
    #[ORM\Column(type: "string")]
    private string $lastname; 
    
    #[Assert\Email]
    #[ORM\Column(type: "string", nullable: true)]
    private ?string $email;

    public function __construct() {
        $this->createdAt = new \DateTimeImmutable();
    }
    public function getFirstName(): string
    {
        return $this->firstname;
    }

    public function setFirstName(string $firstname): void
    {
        $this->firstname = $firstname;

    }
    public function getLastName(): ?string
    {
        return $this->lastname;
    }
    public function setLastName(?string $lastname): void
    {
        $this->lastname = $lastname;

    }
    public function getEmail(): ?string
    {
        return $this->email;
    }
    public function setEmail(?string $email): void
    {
        $this->email = $email;

    }
}