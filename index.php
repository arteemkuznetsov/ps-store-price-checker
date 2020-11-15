<?php

$searchQuery = isset($_GET["name"]) ? htmlspecialchars($_GET["name"]) : "";

require_once 'includes/config.php';
require_once './includes/Library.php';
require_once 'application/models/index.php';
