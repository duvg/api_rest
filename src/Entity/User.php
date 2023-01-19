<?php

declare(strict_types=1);

namespace App\Entity;

use Symfony\Component\Security\Core\User\UserInterface;

class User implements UserInterface
{
    private int $id;
    private string $name;
    private string $email;
    private ?string $password;
    private ?string $telephone;
    private ?string $address;
    private ?string $avatar;
    private ?string $token;
    private ?string $resetPasswordToken;
    private bool $active;
    private ?User $createdBy;
    private \DateTime $createdAt;
    private \DateTime $updatedAt;

    /**
     * User constructor.
     */
    public function __construct(string $name, string $email)
    {
        $this->name = $name;
        $this->setEmail($email);
        $this->password = '';
        $this->telephone = null;
        $this->address = null;
        $this->avatar = null;
        $this->token = \sha1(\uniqid('', true));
        $this->resetPasswordToken = null;
        $this->active = false;
        $this->createdBy = null;
        $this->createdAt = new \DateTime();
        $this->markAsUpdated();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        // Validate email
        if (!\filter_var($email, \FILTER_VALIDATE_EMAIL)) {
            throw new \LogicException('Invalid Email');
        }

        $this->email = $email;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(?string $password): void
    {
        $this->password = $password;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(?string $telephone): void
    {
        $this->telephone = $telephone;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(?string $address): void
    {
        $this->address = $address;
    }


    public function getAvatar(): ?string
    {
        return $this->avatar;
    }

    public function setAvatar(?string $avatar): void
    {
        $this->avatar = $avatar;
    }

    public function getToken(): ?string
    {
        return $this->token;
    }

    public function setToken(?string $token): void
    {
        $this->token = $token;
    }

    public function getResetPasswordToken(): ?string
    {
        return $this->resetPasswordToken;
    }

    public function setResetPasswordToken(?string $resetPasswordToken): void
    {
        $this->resetPasswordToken = $resetPasswordToken;
    }

    public function isActive(): bool
    {
        return $this->active;
    }

    public function setActive(bool $active): void
    {
        $this->active = $active;
    }

    public function getCreatedBy(): ?array
    {
        if (!$this->createdBy)
            return null;

        $data = [
            'id' => $this->createdBy->getId(),
            'name' => $this->createdBy->getName()
        ];
        return $data;
    }

    public function setCreated(?User $createdBy): void
    {
        $this->createdBy = $createdBy;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): \DateTime
    {
        return $this->updatedAt;
    }

    public function markAsUpdated(): void
    {
        $this->updatedAt = new \DateTime();
    }

    public function getRoles(): array
    {
        return [];
    }

    public function getSalt(): void
    {
    }

    public function getUsername(): string
    {
        return $this->email;
    }

    public function eraseCredentials(): void
    {
    }
}