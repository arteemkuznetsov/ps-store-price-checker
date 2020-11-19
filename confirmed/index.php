<?php

$hash = null;

if (preg_match("/^[a-f0-9]{32}$/", $_GET["hash"])) {
    $hash = htmlspecialchars($_GET["hash"]);
}

require_once '../config.php';
require_once '../libs/Library.php';
require_once '../application/models/confirmed.php';
