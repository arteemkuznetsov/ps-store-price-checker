<?php

use \Entities\Item;

require_once './application/entities/Item.php';

$itemCollection = [];

if (isset($_GET["name"])) {
    $searchUrlPrefix =
        "https://store.playstation.com/chihiro-api/bucket-search/RU/ru/999/";
    $name = $searchUrlPrefix . rawurlencode($searchQuery);

    $data = request($name);

    foreach ($data["categories"]["games"]["links"] as $result) {
        if (isset($result["playable_platform"]) &&
            atLeastOnePlatformAvailable($platforms,
                                        $result["playable_platform"])
        ) {
            $values = [];

            $values["id"] = $result["id"];
            $values["name"] = $result["name"];
            $values["displayDefaultPrice"] =
                isset($result["skus"][0]["display_price"])
                    ? $result["skus"][0]["display_price"]
                    : "Недоступно для покупки";

            $values["imageUrl"] =
                "https://store.playstation.com/store/api/chihiro/00_09_000/titlecontainer/RU/ru/999/" .
                explode("-", $result["id"])[1] . "/image?w=236&h=236";

            if (! empty($result["skus"][0]["rewards"]) &&
                $result["skus"][0]["rewards"][0]["discount"] > 0
            ) {
                $values["displayDiscountPrice"] =
                    $result["skus"][0]["rewards"][0]["display_price"];
                $values["discountPercent"] =
                    $result["skus"][0]["rewards"][0]["discount"];
            }

            $values["platforms"] = $result["playable_platform"];
            $values["releaseDate"] = $result["release_date"];
            $values["storeUrl"] =
                "https://store.playstation.com/ru-ru/product/" .
                $result["id"];
            $values["detailUrl"] = $result["url"];

            $itemCollection[] = new Item($values);
        }
    }
}

require_once './application/views/index.php';
