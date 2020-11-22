<?php

class DatabaseConnection
{

    private $servername;
    private $username;
    private $password;
    private $database;
    private $charset;

    public $pdo;

    public function __construct()
    {
        $this->servername = "localhost";
        $this->username = "root";
        $this->password = "admin";
        $this->database = "pspricetracker";
        $this->charset = "utf8";

        $this->pdo = $this->open();
    }

    public function open()
    {
        $dsn =
            "mysql:host=$this->servername;dbname=$this->database;charset=$this->charset";
        $opt = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false
        ];

        return new PDO($dsn, $this->username, $this->password, $opt);
    }

    public function query($sql, $params = [], $className = "stdClass")
    {
        $statement = $this->pdo->prepare($sql);
        $result = $statement->execute($params);

        return $result ?
            $statement->fetchAll(PDO::FETCH_CLASS, $className) : null;
    }

}