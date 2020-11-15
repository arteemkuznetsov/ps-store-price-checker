<?php

use \Entities\Item;

require_once './application/entities/Item.php';

$itemCollection = [];

if (isset($_GET["name"])) {
    $searchUrlPrefix =
        "https://store.playstation.com/chihiro-api/bucket-search/RU/ru/999/";
    $name = $searchUrlPrefix . rawurlencode($searchQuery);

    $data = Library::request($name);

    foreach ($data["categories"]["games"]["links"] as $result) {
        $values = Library::initItemParams($result);
        $itemCollection[] = new Item($values);
    }
} else {
    $data = Library::request("https://store.playstation.com/chihiro-api/viewfinder/RU/ru/999/STORE-MSF75508-GAMESPOPULAR");
    /*echo "<pre>";
    print_r($data);
    echo "</pre>";*/
    foreach ($data["links"] as $result) {
        $values = Library::initItemParams($result);
        $itemCollection[] = new Item($values);
    }
}

// most popular
// https://store.playstation.com/chihiro-api/viewfinder/RU/ru/999/STORE-MSF75508-GAMESPOPULAR

require_once './application/views/index.php';
