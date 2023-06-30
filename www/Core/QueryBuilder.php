<?php

namespace App\Core;

use PDO;
use PDOException;

class QueryBuilder
{
    private static $pdo;
    private static $table;
    private static $prefix = DB_PREFIX;

    private static $db_dsn       = 'pgsql:host=db;dbname=bluebird;port=5432';
    private static $db_username  = DB_USERNAME;
    private static $db_password  = DB_PASSWORD;

    protected $selects = [];
    protected $wheres = [];
    protected $joins = [];
    protected $distinct = false;
    protected $updates = [];
    protected $limit = null;
    protected $orWheres = [];
    protected $andWheres = [];

    /**
     * @param string $table
     */
    public function __construct(string $table)
    {
        self::$table = self::$prefix . $table;
    }

    /**
     * @return PDO
     */
    protected static function getPDO()
    {
        if (self::$pdo === null) {
            try {
                self::$pdo = new PDO(
                    self::$db_dsn,
                    self::$db_username,
                    self::$db_password
                );
                self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                throw new \App\Exceptions\DatabaseException($e->getMessage(), $e->getCode(), $e);
            }
        }

        return self::$pdo;
    }

    /**
     * Indiquer la table principale de la requête. C'est celle qui intervient dans la clause FROM.
     * 
     * @param string $table
     * @return QueryBuilder
     */
    public static function table(string $table)
    {
        return new static($table);
    }

    /**
     * Préciser les champs que l'on souhaite obtenir.
     * 
     * @param ...$fields
     * @return self
     */
    public function select(...$fields): self
    {
        $prefixedFields = [];

        foreach ($fields as $field) {
            $prefixedFields[] = $this->prefixColumnName($field);
        }

        $this->selects = array_merge($this->selects, $prefixedFields);

        return $this;
    }

    /**
     * Ajouter une clause DISTINCT au Query Builder.
     * 
     * @return self
     */
    public function distinct(): self
    {
        $this->distinct = true;
        return $this;
    }

    /**
     * Ajouter une jointure au Query Builder.
     * 
     * @param string $table
     * @param string $field1
     * @param string $operator
     * @param string $field2
     * @return self
     */
    public function join(string $table, string $field1, string $operator, string $field2): self
    {
        $table = self::$prefix . $table;
        $field1 = self::$prefix . $field1;
        $field2 = self::$prefix . $field2;
        $this->joins[] = compact('table', 'field1', 'operator', 'field2');
        return $this;
    }

    /**
     * Ajouter une clause WHERE au Query Builder.
     * 
     * @param $field
     * @param $operator
     * @param $value
     * @return self
     */
    public function where($field, $operator, $value = null): self
    {
        if (func_num_args() === 2) {
            $value = $operator;
            $operator = '=';
        }

        $field = $this->prefixColumnName($field);
        $this->wheres[] = compact('field', 'operator', 'value');

        return $this;
    }

    /**
     * Ajouter une clause OR WHERE au Query Builder.
     * 
     * @param $field
     * @param $operator
     * @param $value
     * @return self
     */
    public function orWhere($field, $operator, $value = null): self
    {
        if (func_num_args() === 2) {
            $value = $operator;
            $operator = '=';
        }

        $field = $this->prefixColumnName($field);
        $this->orWheres[] = compact('field', 'operator', 'value');

        return $this;
    }

    /**
     * Ajouter une clause AND WHERE au Query Builder.
     * 
     * @param $field
     * @param $operator
     * @param $value
     * @return self
     */
    public function andWhere($field, $operator, $value = null): self
    {
        if (func_num_args() === 2) {
            $value = $operator;
            $operator = '=';
        }

        $field = $this->prefixColumnName($field);
        $this->andWheres[] = compact('field', 'operator', 'value');

        return $this;
    }

    /**
     * Ajouter le préfixe de la BD si nécéssaire.
     * 
     * @param $column
     * @return void
     */
    private function prefixColumnName($column)
    {
        if (strpos($column, '.') === false) {
            $column = self::$table . '.' . $column;
        } else {
            $parts = explode('.', $column);
            $column = self::$prefix . $parts[0] . '.' . $parts[1];
        }

        return $column;
    }

    /**
     * Ajouter une clause LIMIT au Query Builder.
     * 
     * @param integer $limit
     * @return self
     */
    public function limit(int $limit): self
    {
        $this->limit = $limit;
        return $this;
    }

    /**
     * get() est une fonction appelée en dernier (après les joins, wheres, select, etc) afin de récupérer le(s) résultat(s).
     * 
     * @return mixed
     */
    public function get()
    {
        try {
            $sql = 'SELECT ';

            if ($this->distinct) {
                $sql .= 'DISTINCT ';
            }

            $sql .= $this->selects ? implode(', ', $this->selects) : '*';
            $sql .= ' FROM ' .  self::$table;

            foreach ($this->joins as $join) {
                $sql .= ' JOIN ' . $join['table'];
                $sql .= ' ON ' . $join['field1'] . ' ' . $join['operator'] . ' ' . $join['field2'];
            }

            if ($this->wheres) {
                $sql .= ' WHERE ';
                $sql .= implode(' AND ', array_map(function ($where) {
                    return $where['field'] . ' ' . $where['operator'] . ' ?';
                }, $this->wheres));
            }

            if ($this->orWheres) {
                $sql .= ' OR ';
                $sql .= implode(' OR ', array_map(function ($where) {
                    return $where['field'] . ' ' . $where['operator'] . ' ?';
                }, $this->orWheres));
            }

            if ($this->andWheres) {
                $sql .= ' AND ';
                $sql .= implode(' AND ', array_map(function ($where) {
                    return $where['field'] . ' ' . $where['operator'] . ' ?';
                }, $this->andWheres));
            }

            if ($this->limit) {
                $sql .= ' LIMIT ' . $this->limit;
            }

            $stmt = self::getPDO()->prepare($sql);

            $values = [];
            foreach ($this->wheres as $where) {
                $values[] = $where['value'];
            }

            foreach ($this->orWheres as $where) {
                $values[] = $where['value'];
            }

            foreach ($this->andWheres as $where) {
                $values[] = $where['value'];
            }

            $stmt->execute($values);

            if (count($this->selects) === 1) {
                return $stmt->fetchColumn();
            } else {
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
        } catch (PDOException $e) {
            throw new \App\Exceptions\DatabaseException((string)$e->getMessage(), (int)$e->getCode(), $e);
        }
    }

    /**
     * Savoir si la requete qui a été construite avec le Query Builder retourne quelque chose.
     * 
     * @return boolean
     */
    public function exists(): bool
    {
        try {
            $this->limit(1);
            $result = $this->get();

            return $result !== false;
        } catch (PDOException $e) {
            throw new \App\Exceptions\DatabaseException($e->getMessage(), $e->getCode(), $e);
        }
    }

    /**
     * Savoir si la requete qui a été construite avec le Query Builder ne retourne rien.
     * 
     * @return boolean
     */
    public function notExists(): bool
    {
        try {
            $this->limit(1);
            $result = $this->get();

            return $result === false;
        } catch (PDOException $e) {
            throw new \App\Exceptions\DatabaseException($e->getMessage(), $e->getCode(), $e);
        }
    }

    /**
     * Tout comme la fonction get(), first() doit être appelée en dernier. Cette fonction retourne uniquement le premier résultat.
     * 
     * @return mixed
     */
    public function first()
    {
        try {
            $this->limit(1);
            $result = $this->get();

            if ($result && is_array($result)) {
                return $result[0];
            }

            return $result;
        } catch (PDOException $e) {
            throw new \App\Exceptions\DatabaseException($e->getMessage(), $e->getCode(), $e);
        }
    }

    /**
     * Insérer une ligne en BD.
     * 
     * @param array $data
     * @return boolean
     */
    public function insert(array $data): bool
    {
        try {
            $fields = array_keys($data);
            $values = array_values($data);
            $placeholders = array_fill(0, count($fields), '?');

            $stmt = self::getPDO()->prepare(
                "INSERT INTO " . self::$table . " (" . implode(', ', $fields) . ") VALUES (" . implode(', ', $placeholders) . ")"
            );

            return $stmt->execute($values);
        } catch (PDOException $e) {
            throw new \App\Exceptions\DatabaseException($e->getMessage(), $e->getCode(), $e);
        }
    }

    /**
     * Modifier une ligne en BD.
     * 
     * @param array $data
     * @return boolean
     */
    public function update(array $data): bool
    {
        try {
            $fields = array_keys($data);
            $setClause = array_map(function ($field) {
                return "$field = ?";
            }, $fields);
            $values = array_values($data);

            $sql = "UPDATE " . self::$table . " SET " . implode(', ', $setClause);

            if ($this->wheres) {
                $sql .= ' WHERE ';
                $sql .= implode(' AND ', array_map(function ($where) {
                    return $where['field'] . ' ' . $where['operator'] . ' ?';
                }, $this->wheres));

                foreach ($this->wheres as $where) {
                    $values[] = $where['value'];
                }
            }

            $stmt = self::getPDO()->prepare($sql);
            return $stmt->execute($values);
        } catch (PDOException $e) {
            throw new \App\Exceptions\DatabaseException($e->getMessage(), $e->getCode(), $e);
        }
    }

    /**
     * Supprimer une ligne en BD.
     * 
     * @return boolean
     */
    public function delete(): bool
    {
        try {
            $sql = "DELETE FROM " . self::$table;
            $values = [];

            if ($this->wheres) {
                $sql .= ' WHERE ';
                $sql .= implode(' AND ', array_map(function ($where) {
                    return $where['field'] . ' ' . $where['operator'] . ' ?';
                }, $this->wheres));

                foreach ($this->wheres as $where) {
                    $values[] = $where['value'];
                }
            }

            $stmt = self::getPDO()->prepare($sql);
            return $stmt->execute($values);
        } catch (PDOException $e) {
            throw new \App\Exceptions\DatabaseException($e->getMessage(), $e->getCode(), $e);
        }
    }
}
