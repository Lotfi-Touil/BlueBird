<?php

namespace App\Models;

use App\Core\Model;

class Staff extends Model
{
    protected static $table = DB_PREFIX . 'staff';
    protected static $fillable = [
        'firstname',
        'lastname',
        'birthdate',
        'birthplace',
        'nationality',
        'biography',
    ];

    protected $id;

    protected $firstname;
    protected $lastname;
    protected $birthdate;
    protected $birthplace;
    protected $nationality;
    protected $biography;

    public function getId() {
        return $this->id;
    }

    public function getFirstname() {
        return $this->firstname;
    }

    public function setFirstname(string $firstname) {
        $this->firstname = $firstname;
    }

    public function getLastname() {
        return $this->lastname;
    }

    public function setLastname(string $lastname) {
        $this->lastname = $lastname;
    }

    public function getBirthdate() {
        return $this->birthdate;
    }

    public function setBirthdate(string $birthdate) {
        $this->birthdate = $birthdate;
    }

    public function getBirthplace() {
        return $this->birthplace;
    }

    public function setBirthplace(string $birthplace) {
        $this->birthplace = $birthplace;
    }

    public function getNationality() {
        return $this->birthplace;
    }

    public function setNationality(string $nationality) {
        $this->nationality = $nationality;
    }

    public function getBiography() {
        return $this->biography;
    }

    public function setBiography(string $biography) {
        $this->biography = $biography;
    }
}
