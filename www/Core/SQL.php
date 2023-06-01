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
        $this->table = DB_PREFIX.end($classExploded);
    }

    public static function populate(Int $id): object
    {
        $class = get_called_class();
        $objet = new $class();
        return $objet->getOneWhere(["id"=>$id]);
    }

    public function getOneWhere(array $where): object
    {
        $sqlWhere = [];
        foreach ($where as $column=>$value) {
            $sqlWhere[] = $column."=:".$column;
        }
        $queryPrepared = $this->pdo->prepare("SELECT * FROM ".$this->table." WHERE ".implode(" AND ", $sqlWhere));
        $queryPrepared->setFetchMode( \PDO::FETCH_CLASS, get_called_class());
        $queryPrepared->execute($where);
        return $queryPrepared->fetch();
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

            $queryPrepared = $this->pdo->prepare($sql);
        } else {
            // Insert case
            unset($columns['id']);
            unset($columns['date_inserted']);
            unset($columns['date_updated']);

            $sql = "INSERT INTO {$this->table} 
                                (".implode("," , array_keys($columns) ).") 
                         VALUES (:".implode(",:" , array_keys($columns) ).") ";
            $queryPrepared = $this->pdo->prepare($sql);
        }

        try {
            $queryPrepared->execute($columns);    
        } catch (PDOException $p) {
            die("Erreur SQL : " . $p->getCode() ." => ". $p->getMessage());
        }
    }
}