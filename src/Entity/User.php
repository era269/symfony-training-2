<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\Uuid;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Role", mappedBy="user", collectionClass="MyCollection")
     *
     * @var MyCollectionInterface
     */
    private $roles;

    public function __construct()
    {
        $this->roles = new MyCollection();
        $this->id = Uuid::uuid4();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        if (false === filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new \DomainException();
        }

        $this->email = $email;

        return $this;
    }

    /**
     * @return MyCollectionInterface|Role[]
     */
    public function getRoles(): MyCollectionInterface
    {
        return $this->roles;
    }

    public function addRoles(Role... $roles): self
    {
        foreach ($roles as $role) {
            if (!$this->roles->contains($role)) {
                $this->roles[] = $role;
                $role->setUser($this);
            }
        }

        return $this;
    }

    public function removeRole(Role $role): self
    {
        if ($this->roles->contains($role)) {
            $this->roles->removeElement($role);
            // set the owning side to null (unless already changed)
            if ($role->getUser() === $this) {
                $role->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @param mixed $roles
     */
    public function setRoles(MyCollectionInterface $roles): void
    {
        $this->roles = $roles;
    }
}
