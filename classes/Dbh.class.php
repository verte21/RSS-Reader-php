<?php

class Dbh
{
    private $host = 'localhost';
    private $user = 'root';
    private $password = '';
    private $dbName = 'rss projekt';


    protected function connect()
    {
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbName;
        $pdo = new PDO($dsn, $this->user, $this->password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::FETCH_ASSOC);
        return $pdo;
    }
}
