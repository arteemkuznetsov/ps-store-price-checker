<?php

require_once '../../includes/lib.php';

$searchUrlPrefix =
    "https://store.playstation.com/chihiro-api/bucket-search/RU/ru/999/";
$name = $searchUrlPrefix . urlencode(htmlspecialchars($_GET["name"]));

$json = request($name);

echo $json;
