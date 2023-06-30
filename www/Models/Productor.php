<?php

namespace App\Models;

use App\Core\Model;

class Productor extends Model
{
    protected static $table = DB_PREFIX . 'productor';
    protected static $fillable = ['name', 'description'];

    protected $id;

    protected $name;
    protected $description;

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setDescription($description) {
        $this->description = $description;
    }
}
