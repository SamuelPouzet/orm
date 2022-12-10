<?php

class Repository
{

    /**
     * @var string
     */
    protected $entityName;

    /**
     * @var ReflectionClass
     */
    protected $reflectedClass;

    /**
     * @var PDO
     */
    protected $connexion;

    /**
     * @var string $table
     */
    protected $table;

    /**
     * @var string $primaryKey
     */
    protected $primaryKey;

    /**
     * @var array $columns
     */
    protected $columns = [];

    /**
     * @param string $entityName
     * @param PDO $connexion
     * @throws ReflectionException
     */
    public function __construct($entityName, $connexion)
    {
        $this->reflectedClass = new ReflectionClass($entityName);
        $this->entityName = $entityName;
        $this->connexion = $connexion;
        $this->getTableName();
        $this->getColumns();
    }

    /**
     * @return void
     */
    protected function getTableName()
    {
        preg_match('/@ORM\\\Table\(name=([a-zA-Z_]+)\)/',
            $this->reflectedClass->getDocComment(),
            $table);

        $this->table = $table[1];
    }

    protected function getColumns()
    {
        $colProperties = $this->reflectedClass->getProperties();
        foreach ($colProperties as $colProperty) {
            $colName = $colProperty->getName();
            $property = $this->reflectedClass->getProperty($colName)->getDocComment();
            if (preg_match('/@ORM\\\Column\(name=([a-zA-Z]+)\)/',
                $property,
                $column)) {
                if (preg_match('/@ORM\\\Id/',
                    $property)) {
                    $this->primaryKey = $colName;
                }
                $this->columns[$colName] = [
                    'colName' => $column[1],
                ];
            }
        }
    }

    /**
     * @param array $data
     * @return entity
     */
    protected function hydrateEntity($data)
    {
        $entity = new $this->entityName();
        foreach ($data as $key => $value) {
            $key = lcfirst(implode('', array_map('ucfirst', explode('_', $key))));
            $method = 'set' . $key;
            if(method_exists($entity, $method)){
                $entity->$method($value);
            }
        }
        return $entity;
    }

    /**
     * @var int|string $id
     */
    public function find($id)
    {
        $sql = <<<'SQL'
SELECT * 
FROM %1$s
WHERE %2$s = %3$s
SQL;
        $sql = sprintf($sql, $this->table, $this->primaryKey, $id);

        $data = $this->connexion->query($sql)->fetch(PDO::FETCH_ASSOC);

        return $this->hydrateEntity($data);
    }

    /**
     * @var array $criterias
     * @var array $orderBy
     */
    public function findBy($criterias, $orderBys=[])
    {
        $sql = <<<'SQL'
SELECT * 
FROM %1$s
WHERE 1=1
SQL;
        $sql = sprintf($sql, $this->table);

        foreach ($criterias as $key=>$criteria) {
            $sql .= sprintf(' AND %1$s=\'%2$s\' ', $key, $criteria);
        }

        if (count($orderBys) > 0) {
            $sql .= 'ORDER BY ' . implode(',', $orderBys);
        }

        $data = $this->connexion->query($sql)->fetch(PDO::FETCH_ASSOC);

        return $this->hydrateEntity($data);
    }
}