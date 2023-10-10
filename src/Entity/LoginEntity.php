<?php 

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;
#[ORM\Entity]
class LoginEntity {
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private ?int $id;

    #[ORM\Column(type: "datetime_immutable", options: ["default" => "CURRENT_TIMESTAMP"])]
    private \DateTimeImmutable $createdAt; 
    
    #[Assert\NotBlank]
    #[Assert\Length(min: 9)]
    #[Assert\Length(max: 48)]
    #[ORM\Column(type: "string")]
    private string $username;
    
    #[Assert\Length(min: 9)]
    #[Assert\Length(max: 48)]
    #[ORM\Column(type: "string")]
    private string $password;
    public function __construct() {
        $this->createdAt = new \DateTimeImmutable();
    }
    public function getId(): int
    {
        return $this->id;
    }
    public function getUserName(): string
    {
        return $this->username;
    }

    public function setUserName(string $username): void
    {
        $this->username = $username;

    }
    public function getPassWord(): ?string
    {
        return $this->password;
    }
    public function setPassWord(?string $password): void
    {
        $this->password = $password;

    }
}