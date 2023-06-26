<?php

namespace App\Models;

use App\Core\SQL;

class Contact extends SQL
{

    protected Int $id = 0;
    protected String $object;
    protected String $message;
    protected String $firstname;
    protected String $lastname;
    protected String $email;
    protected $date_inserted;
    protected $date_updated;

    public function getAll(): array
    {
        $sql = "SELECT * FROM {$this->getTable()}";
        $queryPrepared = $this->getPdo()->prepare($sql);
        $queryPrepared->execute();

        $rowsUserContact = $queryPrepared->fetchAll();
        return $rowsUserContact;
    }

    public function getOneByEmail(string $email, bool $onlyActif = false): ?Contact
    {
        if (!$email)
            return null;

        $sql = "SELECT * FROM {$this->getTable()} WHERE email = :email";
        if ($onlyActif)
            $sql .= " AND status = 1";

        $queryPrepared = $this->getPdo()->prepare($sql);
        $queryPrepared->setFetchMode(\PDO::FETCH_CLASS, get_called_class());
        $queryPrepared->execute(['email'  => $email]);

        $userContact = $queryPrepared->fetch();
        if ($userContact) {
            if ($this->bindValuesFromRow($userContact))
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
    public function getObject(): string
    {
        return $this->object;
    }

    /**
     * @param String $object
     */
    public function setObject(string $object): void
    {
        $this->object = $object;
    }

    /**
     * @return String
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @param String $message
     */
    public function setMessage(string $message): void
    {
        $this->message = $message;
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
     * @return mixed
     */
    public function getDateInserted()
    {
        return $this->date_inserted;
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
    public function getDateUpdated()
    {
        return $this->date_updated;
    }

    /**
     * @return mixed
     */
    public function setDateUpdated($dateUpdated)
    {
        return $this->date_updated;
    }
}
