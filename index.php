<?php

$searchQuery = isset($_GET["name"]) ? htmlspecialchars($_GET["name"]) : "";
$isMainPage = true;

require_once './config.php';
require_once './libs/Library.php';
require_once './application/models/index.php';
