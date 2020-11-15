<?php

class DatabaseConnection {
    private $servername;
    private $username;
    private $password;
    private $database;
    private $port;

    public function __construct()
    {
        $this->servername = "localhost";
        $this->username = "root";
        $this->password = "admin";
        $this->database = "pspricetracker";
        $this->port = 3306;
    }

    public function open()
    {
        return new mysqli(
            $this->servername,
            $this->username,
            $this->password,
            $this->database,
            $this->port
        );
    }
}