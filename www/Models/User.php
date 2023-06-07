<?php

namespace App\Models;

use App\Core\SQL;

class User extends SQL {

    protected Int $id = 0;
    protected String $firstname;
    protected String $lastname;
    protected String $email;
    protected String $password;
    protected Int $status = 0;
    protected $date_inserted;
    protected $date_updated;

    public function getOneByEmail(string $email, bool $onlyActif = false): ?User
    {
        if (!$email)
            return null;

        $sql = "SELECT * FROM {$this->getTable()} WHERE email = :email";
        if ($onlyActif)
            $sql .= " AND status = 1";

        $queryPrepared = $this->getPdo()->prepare($sql);
        $queryPrepared->setFetchMode(\PDO::FETCH_CLASS, get_called_class());
        $queryPrepared->execute(['email'  => $email]);

        $user = $queryPrepared->fetch();
        if ($user) {
            if ($this->bindValuesFromRow($user))
                return $this;
        }

        return null;
    }

    public function bindValuesFromRow(object $row): bool
    {
        if (!$row)
            return false;

        foreach ($row as $key => $value) {
            if (property_exists($this, $key)) {
                $this->$key = $value;
            }
        }

        return true;
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
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return String
     */
    public function getFirstname(): string
    {
        return $this->firstname;
    }

    /**
     * @param String $firstname
     */
    public function setFirstname(string $firstname): void
    {
        $this->firstname = ucwords(strtolower(trim($firstname)));
    }

    /**
     * @return String
     */
    public function getLastname(): string
    {
        return $this->lastname;
    }

    /**
     * @param String $lastname
     */
    public function setLastname(string $lastname): void
    {
        $this->lastname = strtoupper(trim($lastname));
    }

    /**
     * @return String
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param String $email
     */
    public function setEmail(string $email): void
    {
        $this->email = strtolower(trim($email));
    }

    /**
     * @return String
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param String $password
     */
    public function setPassword(string $password): void
    {
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }

    /**
     * @return int
     */
    public function getStatus(): int
    {
        return $this->status;
    }

    /**
     * @param int $status
     */
    public function setStatus(int $status): void
    {
        $this->status = $status;
    }
    
    /**
     * @return mixed
     */
    public function setDateInserted($dateInserted)
    {
        return $this->date_inserted;
    }

    /**
     * @return mixed
     */
    public function setDateUpdated($dateUpdated)
    {
        return $this->date_updated;
    }

    /**
     * @return mixed
     */
    public function getDateInserted()
    {
        return $this->date_inserted;
    }

    /**
     * @return mixed
     */
    public function getDateUpdated()
    {
        return $this->date_updated;
    }

}