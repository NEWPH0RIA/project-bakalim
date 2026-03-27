<?php

namespace src\models;
use src\services\DB;


abstract class ActiveRecordEntity
{
    protected $id;
    public function getId(): int
    {
        return $this->id;
    }

    public static function findAll(): array
    {
        $db = DB::getInstance();
        return $db->query('SELECT * FROM `' . static::getTableName() .' `;', [], static::class);
    }

    public static function getById($id): ?self
    {
        $db = DB::getInstance();
        $entities = $db->query('SELECT * FROM `' . static::getTableName() . '` WHERE id = :id;' , [':id' => $id], static::class);
        return $entities ? $entities[0] : null;
    }

    public function getReflectorProperties()
    {
        $reflector = new \ReflectionObject($this);
        $properties = $reflector->getProperties();
        $resultProperties = [];
        foreach ($properties as $property)
        {
            $propertyName = $property->getName();
            $resultProperties[$propertyName] = $this->$propertyName;

        }
        return $resultProperties;
    }

    public function save()
    {

        $properties = $this->getReflectorProperties();

        if($this->id !== null)
        {
            $this-update();
        }else{
            $this->insert($properties);
        }
    }

    public function update($properties)
    {
        $columns2params = [];
        $columns2values = [];
        $index = 1;
        foreach($properties as $column => $value){
            $param = ':param' . $index;
            $columns2params[] = $column . ' = ' . $param;
            $columns2values[$param] = $value;
            $index++;
        }
        $sql = 'UPDATE ' . static::getTableName() . ' SET ' . implode(',', $columns2params) . ' WHERE id = ' . $this->id;
        
        $db = DB::getInstance();
        $db->query($sql, $params2values, static::class);
        $this->id = $db->getLastInsertedId();
    }

    public function insert($properties)
    {
        $filteredProperties = array_filter($properties);
        $columns =[];
        $paramsNames = [];
        $params2values = [];
        foreach($filteredProperties as $columnName => $value){
            $columns[] = '`' . $columnName . '`';
            $paramsName = ':' . $columnName;
            $paramsNames[] = $paramsName;
            $params2values[$paramsName] = $value;
        }

        $sql = 'INSERT INTO ' . static::getTableName() . ' (' . implode(', ', $columns) . ') VALUES (' . implode(', ', $paramsNames) . ');';
        
        $db = DB::getInstance();
        $db->query($sql, $params2values, static::class);
        $this->id = $db->getInsertId();
    }

    public function delete()
    {
        $db = DB::getInstance();
        $db->query('DELETE FROM`' . static::getTableName() . '` WHERE id = :id', [':id' => $this->id]);
        $this->id = null;
    }

    abstract protected static function getTableName(): string;
}