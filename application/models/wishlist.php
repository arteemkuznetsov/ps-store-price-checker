<?php

use \Entities\Item;

require_once '../application/entities/Item.php';

$itemCollection = [];

if ($user->isAuth) {
    $conn = new DatabaseConnection();
    $result = $conn->query(
        "SELECT ps_store_id FROM users_titles 
                                            INNER JOIN wishlist_titles 
                                                ON title_id = wishlist_titles.id 
                                            WHERE user_id = :user_id",
        [$user->id]
    );

    foreach ($result as $row) {
        $data = Library::request(
            "https://store.playstation.com/store/api/chihiro/00_09_000/container/RU/ru/999/$row->ps_store_id"
        );
        $values = Library::initWishedItem($data);
        $itemCollection[] = new Item($values);
    }
} else {
    header("Location: $ROOT/signin/");
}

require_once '../application/views/wishlist.php';
