<?php

namespace App\Models;

use App\Core\Model;

class Job extends Model
{
    protected static $table = DB_PREFIX . 'job';
    protected static $fillable = ['name'];

    protected $id;

    protected $name;

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function setName(string $name) {
        $this->name = $name;
    }
}
