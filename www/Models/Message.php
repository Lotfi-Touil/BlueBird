<?php

namespace App\Models;

use App\Core\Model;

class Message extends Model
{
    protected static $table = DB_PREFIX . 'message';
    protected static $fillable = ['object', 'message', 'firstname', 'lastname', 'email', 'message_categorie_id'];

    protected $id;
    protected String $object;
    protected String $message;
    protected String $firstname;
    protected String $lastname;
    protected String $email;
    protected $created_at;
    protected $updated_at;
    protected Int $message_categorie_id;


    public function getId()
    {
        return $this->id;
    }

    public function getObject(): string
    {
        return $this->object;
    }

    public function setObject(string $object): void
    {
        $this->object = $object;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function setMessage(string $message): void
    {
        $this->message = $message;
    }

    public function getFirstname(): string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): void
    {
        $this->firstname = ucwords(strtolower(trim($firstname)));
    }

    public function getLastname(): string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): void
    {
        $this->lastname = strtoupper(trim($lastname));
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = strtolower(trim($email));
    }

    public function getCreatedAt()
    {
        return $this->created_at;
    }

    public function setCreatedAt($created_at)
    {
        return $this->created_at;
    }


    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    public function setUpdatedAt($updated_at)
    {
        return $this->updated_at;
    }


    public function getCategorie(): int
    {
        return $this->message_categorie_id;
    }

    public function setCategorie(int $message_categorie_id): void
    {
        $this->message_categorie_id = $message_categorie_id;
    }
}
