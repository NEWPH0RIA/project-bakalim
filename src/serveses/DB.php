<?php

namespace src\serveses;

class DB
{
    private $pdo;
    private static $instance;
    private function __construct()
    {
        $dbOptions = (require_once __DIR__ . '/../config/settingsDB.php')['db']; // Под вопросом

        $this->pdo = new \PDO(
            'mysql:host=' . $dbOptions['host'] . ';dbname=' . $dbOptions['dbname'],
            $dbOptions['user'],
            $dbOptions['password']
        );

        $this->pdo->exec('SET NAMES utf8mb4');
    }

    public static function getInstance()
    {
        if(self::$instance === null)
        {
            self::$$instance = new self();
        }
        return self::$instance;
    }

    public function query(string $sql, array $params = [], string $className = 'stdClass'): ?array
    {
        $sth = $this->pdo->prepare($sql);
        $result = $sth->execute($params);
        if (false === $result) {
            return null;

        }

        return $sth->fetchAll(\PDO::FETCH_CLASS, $className);
    }
}
;