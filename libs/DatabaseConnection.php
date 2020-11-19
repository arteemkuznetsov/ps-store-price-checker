<?php

class DatabaseConnection {
    private $servername;
    private $username;
    private $password;
    private $database;
    private $charset;

    public function __construct()
    {
        $this->servername = "localhost";
        $this->username = "root";
        $this->password = "admin";
        $this->database = "pspricetracker";
        $this->charset = "utf8";
    }

    public function open()
    {
        $dsn = "mysql:host=$this->servername;dbname=$this->database;charset=$this->charset";
        $opt = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false
        ];

        return new PDO($dsn, $this->username, $this->password, $opt);
    }
}