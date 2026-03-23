<?php

namespace src\models;


abstract class ActiveRecordEntity
{
    protected $id;
    public function getId(): int
    {
        return $this->id;
    }

    public static function findAll(): array
    {
        $db = new DB;
        return $db->query('SELECT * FROM `' . static::getTableName() .' `;', [], static::class);
    }

    public static function getById($id): ?self
    {
        $db = new DB;
        $entities = $db->query("SELECT * FROM `articles` WHERE id = :id; ;", [':id' => $id], static::class);
        return $entities ? $entities[0] : null;
    }

    abstract protected static function getTableName(): string;
}