<?php

namespace src\models;
use src\serveses\DB;

class Articles extends ActiveRecordEntity
{
    
    private $author_id;
    private $name;
    private $text;
    private $created_at;

    protected static function getTableName(): string
    {
        return 'articles';
    }

    public function getAuthorId(): int
    {
        return $this->author_id;
    }

    public function getName(): string
    {
        return $this->name;
    }
    
    public function getText(): string
    {
        return $this->text;
    }

    public function createdAt()
    {
        return $this->created_at;
    }

    public static function findAll(): array
    {
        $db = new DB;
        return $db->query('SELECT * FROM `articles`;', [], static::class);
    }

    public function getAuthor(): Users
    {
        return Users::getById($this->author_id);
    }
}


?>