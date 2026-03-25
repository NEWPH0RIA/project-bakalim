<?php

namespace src\models;
use src\serveses\DB;


abstract class ActiveRecordEntity
{
    protected $id;
    public function getId(): int
    {
        return $this->id;
    }

    public static function findAll(): array
    {
        $db = new DB::getInstance();
        return $db->query('SELECT * FROM `' . static::getTableName() .' `;', [], static::class);
    }

    public static function getById($id): ?self
    {
        $db = new DB::getInstance();
        $entities = $db->query("SELECT * FROM `articles` WHERE id = :id; ;", [':id' => $id], static::class);
        return $entities ? $entities[0] : null;
    }

    abstract protected static function getTableName(): string;
}