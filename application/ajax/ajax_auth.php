<?php

require_once "../../config.php";
require_once "../../libs/DatabaseConnection.php";
require_once "../../libs/Library.php";

$response = [
    "status" => 0,
    "errors" => []
];

if (isset($_POST["login"]) && isset($_POST["password"])) {
    $regex = [
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

    /* в качестве логина может быть передан как логин, так и пароль */
    if ((preg_match($regex["login"]["pattern"], $_POST["login"]) &&
         strlen($_POST["login"]) >= $regex["login"]["min"] &&
         strlen($_POST["login"]) <= $regex["login"]["max"]) ||
        (preg_match($regex["email"]["pattern"], $_POST["login"]) &&
         strlen($_POST["login"]) >= $regex["email"]["min"] &&
         strlen($_POST["login"]) <= $regex["email"]["max"])
    ) {
        $userData["login"] = htmlspecialchars($_POST["login"]);
    }
    if (preg_match($regex["password"]["pattern"], $_POST["password"]) &&
        strlen($_POST["password"]) >= $regex["password"]["min"] &&
        strlen($_POST["password"]) <= $regex["password"]["max"]
    ) {
        $userData["password"] = htmlspecialchars($_POST["password"]);
    }

    // если все переданные поля прошли проверку
    if (sizeof($userData) == sizeof($_POST)) {
        $conn = new DatabaseConnection();
        $result =
            $conn->query(
                "SELECT id, password, secret_key FROM users WHERE login = :login OR email = :email",
                [$userData["login"], $userData["login"]]
            );

        if (sizeof($result) == 1) {
            $row = $result[0];

            if (password_verify($userData["password"], $row->password)) {
                $json = json_encode(
                    [
                        "user_id" => $row->id,
                        "http_user_agent" => $_SERVER["HTTP_USER_AGENT"]
                    ]
                );
                $accessToken = Library::encrypt($json, $row->secret_key);
                $expire = time() + 3600 * 24 * 30;
                Library::deleteAccessToken();
                setcookie("access_token", $accessToken, $expire, $path = "/",
                          $domain = "", $secure = false, $httpOnly = true);

                $response["status"] = 1;
            } else {
                $response["errors"][] = [
                    "code" => 2,
                    "message" => "Введен неверный пароль. Проверьте корректность вводимых данных и повторите попытку."
                ];
            }
        } else {
            $response["errors"][] = [
                "code" => 1,
                "message" => "Введен неверный логин или e-mail. Проверьте корректность вводимых данных и повторите попытку."
            ];
        }
    }
}
echo json_encode($response);
