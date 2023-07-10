<?php

namespace App\Models;

use PDO;
use PDOException;

class DatabaseModel
{
    private $dbName;
    private $dbUser;
    private $dbPassword;
    private $pdo;

    public function __construct($dbName, $dbUser, $dbPassword)
    {
        $this->dbName = $dbName;
        $this->dbUser = $dbUser;
        $this->dbPassword = $dbPassword;
        $this->pdo = $this->connect();
    }

    public function createDatabase(): bool
    {
        // Vérifier si la base de données existe déjà
        if ($this->databaseExists()) {
            return false;
        }

        try {
            // Créer la base de données
            $stmtCreateDb = $this->pdo->prepare("CREATE DATABASE :dbName");
            $stmtCreateDb->bindParam(':dbName', $this->dbName);
            $stmtCreateDb->execute();

            // Créer un utilisateur avec les privilèges sur la base de données
            $stmtCreateUser = $this->pdo->prepare("GRANT ALL PRIVILEGES ON DATABASE :dbName TO :dbUser");
            $stmtCreateUser->bindParam(':dbName', $this->dbName);
            $stmtCreateUser->bindParam(':dbUser', $this->dbUser);
            $stmtCreateUser->execute();

            return true;
        } catch (PDOException $e) {
            throw new \App\Exceptions\DatabaseException((string)$e->getMessage(), (int)$e->getCode(), $e);
        }
    }

    private function connect(): PDO
    {
        $dsn = 'pgsql:host=db;dbname=' . $this->dbName . ';port=5432';
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];

        try {
            return new PDO($dsn, $this->dbUser, $this->dbPassword, $options);
        } catch (PDOException $e) {
            throw new \App\Exceptions\DatabaseException((string)$e->getMessage(), (int)$e->getCode(), $e);
        }
    }

    private function databaseExists(): bool
    {
        try {
            $stmt = $this->pdo->prepare("SELECT datname FROM pg_catalog.pg_database WHERE datname = :dbName");
            $stmt->bindParam(':dbName', $this->dbName);
            $stmt->execute();

            return ($stmt->fetchColumn() !== false);
        } catch (PDOException $e) {
            throw new \App\Exceptions\DatabaseException((string)$e->getMessage(), (int)$e->getCode(), $e);
        }
    }
}
