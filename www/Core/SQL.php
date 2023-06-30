<?php
namespace App\Core;

use \PDO;
use \PDOException;

abstract class SQL{

    private $pdo;
    private $table;

    private static $db_dsn       = 'pgsql:host=db;dbname=bluebird;port=5432';
    private static $db_username  = DB_USERNAME;
    private static $db_password  = DB_PASSWORD;

    public function  __construct()
    {
        // Mettre en place le singleton
        try {
            $this->pdo = new PDO(self::$db_dsn, self::$db_username, self::$db_password);
            // $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $p) {
            die("Erreur SQL : " . $p->getCode() ." => ". $p->getMessage());
        }

        $classExploded = explode("\\", get_called_class());
        $this->table = DB_PREFIX.cameltoSnakeCase(end($classExploded));
    }

    public static function populate(Int $id): object
    {
        $class = get_called_class();
        $objet = new $class();
        return $objet->getOneBy(["id"=>$id]);
    }

    public function getOneBy(array $where, array $select = ['*'])
    {
        $sqlWhere = [];
        foreach ($where as $column => $value) {
            $sqlWhere[] = $column.'=:'.$column;
        }

        $sqlWhere = implode(' AND ', $sqlWhere);
        $select = implode(', ', $select);

        try {
            $queryPrepared = $this->pdo->prepare("SELECT {$select} FROM {$this->table} WHERE {$sqlWhere}");

            $queryPrepared->execute($where);
            return $queryPrepared->fetch();
        } catch (\PDOException $e) {
            throw new \App\Exceptions\DatabaseException($e->getMessage(), $e->getCode(), $e);
        }
    }

    public function getAllBy(array $where, array $select = ['*'])
    {
        $sqlWhere = [];
        foreach ($where as $column => $value) {
            $sqlWhere[] = $column.'=:'.$column;
        }

        $sqlWhere = implode(' AND ', $sqlWhere);
        $select = implode(', ', $select);

        try {
            $queryPrepared = $this->pdo->prepare("SELECT {$select} FROM {$this->table} WHERE {$sqlWhere}");
            $queryPrepared->execute($where);

            return $queryPrepared->fetchAll();
        } catch (\PDOException $e) {
            throw new \App\Exceptions\DatabaseException($e->getMessage(), $e->getCode(), $e);
        }
    }

    public function save(): void
    {
        $columns = get_object_vars($this);
        $columnsToExclude = get_class_vars(get_class());
        $columns = array_diff_key($columns, $columnsToExclude);

        if(is_numeric($this->getId()) && $this->getId()>0) {
            // Update case
            $sqlUpdate = [];
            foreach ($columns as $column=>$value)
                $sqlUpdate[] = $column."=:".$column;

            $sql = "UPDATE {$this->table} 
                       SET ".implode(",", $sqlUpdate)."
                     WHERE id=".$this->getId();
        } else {
            // Insert case
            unset($columns['id']);
            unset($columns['created_at']);
            unset($columns['updated_at']);

            $sql = "INSERT INTO {$this->table} 
                                (".implode("," , array_keys($columns) ).") 
                         VALUES (:".implode(",:" , array_keys($columns) ).") ";
        }

        try {
            $queryPrepared = $this->pdo->prepare($sql);
            $queryPrepared->execute($columns);
        } catch (\PDOException $e) {
            throw new \App\Exceptions\DatabaseException($e->getMessage(), $e->getCode(), $e);
        }
    }

    protected function getPdo()
    {
        return $this->pdo;
    }

    protected function getTable()
    {
        return $this->table;
    }
}