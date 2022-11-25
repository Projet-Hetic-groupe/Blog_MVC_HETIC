<?php

namespace App\Model\Entity;

use App\Base\BaseEntity;

final class User extends BaseEntity
{
    private int $id;
    private ?string $lastname;
    private ?string $firstname;
    private string $login;
    private string $password;
    private string $role;


    public function getAllInfo(): array
    {
        $allInfo = [$this->getId(), $this->getLastname(), $this->getFirstname(), $this->getLogin(), $this->getRole()];
        return $allInfo;
    }
    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return User
     */
    public function setId(int $id): User
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getLastname(): string
    {
        return $this->lastname;
    }

    /**
     * @param string $lastname
     * @return User
     */
    public function setLastname(string $lastname): User
    {
        $this->lastname = $lastname;
        return $this;
    }

    /**
     * @return string
     */
    public function getFirstname(): string
    {
        return $this->firstname;
    }

    /**
     * @param string $firstname
     * @return User
     */
    public function setFirstname(string $firstname): User
    {
        $this->firstname = $firstname;
        return $this;
    }

    /**
     * @return string
     */
    public function getLogin(): string
    {
        return $this->login;
    }

    /**
     * @param string $login
     * @return User
     */
    public function setLogin(string $login): User
    {
        $this->login = $login;
        return $this;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     * @return User
     */
    public function setPassword(string $password): User
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @return array
     */
    public function getRole(): string
    {
        return $this->role;
    }

    /**
     * @param array $role
     * @return User
     */
    public function setRole(string $role): User
    {
        $this->role = $role;
        return $this;
    }
}
