<?php

namespace App\Models;

use App\Core\SQL;

class Role extends SQL
{
    protected $id;
    protected $name;

    public function getRoleIdByName($name)
    {
        $role = $this->getOneBy(['name' => $name], ['id']);
        return $role ? $role['id'] : null;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

}
