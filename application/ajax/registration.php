<?php

require_once "../../config.php";
require_once "../../libs/DatabaseConnection.php";

$response = [
    "status" => 0,
    "errors" => []
];

if (isset($_POST["login"]) &&
    isset($_POST["email"]) &&
    isset($_POST["password"])
) {
    $regex = [
        "first_name" => [
            "pattern" => "/[a-zA-Zа-яА-Я '-]+/",
            "min" => 1,
            "max" => 50
        ],
        "last_name" => [
            "pattern" => "/[a-zA-Zа-яА-Я '-]+/",
            "min" => 1,
            "max" => 50
        ],
        "login" => [
            "pattern" => "/[a-zA-Z][a-zA-Z0-9-_]{4,255}/",
            "min" => 5,
            "max" => 255
        ],
        "email" => [
            "pattern" => "/[^@\s]+@[^@\s]+\.[^@\s]+/",
            "min" => 5,
            "max" => 255
        ],
        "password" => [
            "pattern" => "/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,255}/",
            "min" => 8,
            "max" => 255
        ]
    ];

    $userData = [];

    foreach ($_POST as $name => $value) {
        if (preg_match($regex[$name]["pattern"], $value) &&
            strlen($value) >= $regex[$name]["min"] &&
            strlen($value) <= $regex[$name]["max"]
        ) {
            $userData[$name] = htmlspecialchars($value);
        }
    }

    // если все переданные поля прошли проверку
    if (sizeof($userData) == sizeof($_POST)) {
        $conn = new DatabaseConnection();
        $pdo = $conn->open();

        $firstName = isset($userData["first_name"]) ? $userData["first_name"]
            : "";
        $lastName = isset($userData["last_name"]) ? $userData["last_name"]
            : "";
        $login = $userData["login"];
        $email = $userData["email"];
        $password = password_hash($userData["password"], PASSWORD_BCRYPT);
        $hash = md5($login . time());


        $selectStatement =
            $pdo->prepare("SELECT count(*) FROM users WHERE login = :login OR email = :email");
        $selectStatement->bindParam(":login", $login);
        $selectStatement->bindParam(":email", $email);
        $selectStatement->execute();
        $count = $selectStatement->fetchColumn();

        if ($count == 0) {
            $link =
                "http://localhost:63342/ps-store-parser/confirmed/?hash=$hash";

            $headers = "MIME-Version: 1.0\r\n";
            $headers .= "Content-type: text/html; charset=utf-8\r\n";
            $headers .= "To: <$email>\r\n";
            $headers .= "From: <$adminEmail>\r\n";

            ob_start();
            include "../views/includes/confirmation_email.php";
            $html = ob_get_contents();
            ob_get_clean();


            $insertStatement = $pdo->prepare(
                "INSERT INTO users (
                   first_name, 
                   last_name, 
                   email, 
                   login, 
                   password, 
                   hash)
                   VALUES (:first_name, 
                           :last_name, 
                           :email,
                           :login,
                           :password, 
                           :hash)");
            $insertStatement->bindParam(":first_name", $firstName);
            $insertStatement->bindParam(":last_name", $lastName);
            $insertStatement->bindParam(":email", $email);
            $insertStatement->bindParam(":login", $login);
            $insertStatement->bindParam(":password", $password);
            $insertStatement->bindParam(":hash", $hash);

            $isMailSent = mail($email,
                               "Подтвердите регистрацию на PS Price Tracker",
                               $html,
                               $headers);

            if ($isMailSent) {
                $insertStatement->execute();
                $response["status"] = 1;
            }
        }
        else {
            $response["errors"][] = [
                "code" => 2,
                "message" => "Пользователь с такими данными уже существует."
            ];
        }
    } else {
        $fields = [
            "first_name" => "имя",
            "last_name" => "фамилия",
            "login" => "логин",
            "email" => "адрес электронной почты",
            "password" => "пароль"
        ];

        $diffs = array_diff_key($_POST, $userData);
        $message = "При регистрации были введены неверные данные";

        $incorrectFields = [];
        foreach ($diffs as $field => $value) {
            $incorrectFields[] = $fields[$field];
        }
        $message .= " (" . implode(", ", $incorrectFields) .
                    "). Проверьте корректность вводимых данных и повторите попытку.";

        $response["errors"][] = [
            "code" => 1,
            "message" => $message
        ];
    }
}
echo json_encode($response);
