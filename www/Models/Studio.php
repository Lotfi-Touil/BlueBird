<?php

namespace App\Models;

use App\Core\SQL;

class Studio extends SQL
{
    protected Int $id = 0;
    protected String $name;

    public function getAll(): array
    {
        $sql = "SELECT * FROM {$this->getTable()}";

        try {
            $queryPrepared = $this->getPdo()->prepare($sql);
            $queryPrepared->execute();
            $rowsStudio = $queryPrepared->fetchAll();
            return $rowsStudio;
        } catch (\PDOException $e) {
            throw new \App\Exceptions\DatabaseException($e->getMessage(), $e->getCode(), $e);
        }
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = ucwords(strtolower(trim($name)));
    }

}