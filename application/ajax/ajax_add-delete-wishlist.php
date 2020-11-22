<?php

require_once "../../config.php";
require_once "../../libs/DatabaseConnection.php";
require_once "../../libs/Library.php";
require_once "../entities/User.php";
require_once "../models/includes/before_header.php";

/* status:
 * 0 - error
 * 1 - added to wishlist
 * 2 - deleted from wishlist
 * */

$response = [
    "status" => 0
];

if ($user->isAuth && isset($_POST["title_id"])) {
    $pattern = "/([a-zA-Z0-9_-])+/";
    if (preg_match($pattern, $_POST["title_id"])) {
        $userId = $user->id;
        $titleId = htmlspecialchars($_POST["title_id"]);

        $conn = new DatabaseConnection();

        $result = $conn->query(
            "SELECT count(*) AS count FROM wishlist_titles WHERE ps_store_id = :ps_store_id",
            [$titleId]
        );
        /* ситуация: такого ps_store_id нет в wishlist_titles */
        if ($result[0]->count == 0) {
            // вставляем этот ps_store_id в wishlist_titles
            $conn->query(
                "INSERT INTO wishlist_titles (ps_store_id) VALUES (:ps_store_id)",
                [$titleId]
            );
            // узнаем id записи
            $result = $conn->query(
                "SELECT id FROM wishlist_titles WHERE ps_store_id = :ps_store_id",
                [$titleId]
            );
            $id = $result[0]->id;
            // связываем данные в таблице-коннекторе
            $conn->query(
                "INSERT INTO users_titles VALUES (:user_id, :title_id)",
                [$user->id, $id]
            );
            // статус: добавлено
            $response["status"] = 1;
        } /* ситуация: такой ps_store_id уже записан в wishlist_titles */
        else {
            $result = @$conn->query(
                "SELECT count(*) AS count FROM users_titles 
                                        INNER JOIN wishlist_titles 
                                            ON title_id = wishlist_titles.id 
                                        WHERE user_id = :user_id 
                                          AND ps_store_id = :ps_store_id",
                [$user->id, $titleId]
            );
            // если у данного пользователя нет с ним связи через коннектор
            if ($result[0]->count == 0) {
                // узнаем id записи
                $result = $conn->query(
                    "SELECT id FROM wishlist_titles WHERE ps_store_id = :ps_store_id",
                    [$titleId]
                );
                $id = $result[0]->id;
                // связываем данные в таблице-коннекторе
                $conn->query(
                    "INSERT INTO users_titles VALUES (:user_id, :title_id)",
                    [$user->id, $id]
                );
                // статус:добавлено
                $response["status"] = 1;
            } // если у пользователя есть с ним связь
            else {
                // узнаем id записи в коннекторе
                $result = $conn->query(
                    "SELECT id FROM users_titles 
                                        INNER JOIN wishlist_titles 
                                            ON title_id = wishlist_titles.id 
                                        WHERE user_id = :user_id 
                                          AND ps_store_id = :ps_store_id",
                    [$user->id, $titleId]
                );
                $id = $result[0]->id;
                // удалить связь пользователя с этим title_id в коннекторе
                $conn->query(
                    "DELETE FROM users_titles WHERE user_id = :user_id AND title_id = :title_id",
                    [$user->id, $id]
                );
                // проверяем, есть ли у другого пользователя привязка к этому title_id в коннекторе
                $result = $conn->query(
                    "SELECT count(*) AS count FROM users_titles WHERE title_id = :title_id",
                    [$titleId]
                );
                // если этого товара больше нет ни у кого в списке желаемого, удаляем запись из wishlist_titles
                if ($result[0]->count == 0) {
                    $conn->query(
                        "DELETE FROM wishlist_titles WHERE ps_store_id = :ps_store_id",
                        [$titleId]
                    );
                }
                // статус: удалено
                $response["status"] = 2;
            }
        }
    }
}
echo json_encode($response);
