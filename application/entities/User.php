<?php


namespace Entities;


class User
{
    public $id;
    public $first_name;
    public $last_name;
    public $email;
    public $login;
    public $subscription;
    public $region;
    public $language;

    public $isAuth;

    public function __construct()
    {
        $this->isAuth = false;
    }

    public function __get($name)
    {
        return $this->$name;
    }

    public function __set($name, $value)
    {
        $this->$name = $value;
    }

    public function auth()
    {
        $this->isAuth = true;
    }

}