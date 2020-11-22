<?php

use \Entities\User;

$user = new User();
$conn = new DatabaseConnection();

if (isset($_COOKIE["access_token"])) {
    $accessToken = $_COOKIE["access_token"];
    $authInfo = json_decode(Library::decrypt($accessToken), true);

    if ($_SERVER["HTTP_USER_AGENT"] == $authInfo["http_user_agent"]) {
        $result =
            $conn->query("SELECT id, first_name, last_name, login FROM users WHERE id = :id",
                         [$authInfo["user_id"]], User::class);
        $user = $result[0];
        $user->isAuth = true;
    } else {
        /* echo "Похоже, что cookie были украдены.
        Ваш секретный ключ был создан заново.
        Пожалуйста, авторизируйтесь." */

        $secret = Library::generateUniqueKey($conn);
        $conn->query("UPDATE users SET secret_key = :secret_key WHERE id = :id",
                     [$secret, $authInfo["user_id"]]);
        Library::deleteAccessToken();
    }
}
