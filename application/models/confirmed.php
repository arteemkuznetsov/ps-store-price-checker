<?php

require_once "../config.php";
require_once "../libs/DatabaseConnection.php";

$isSuccess = false;

if ($hash !== null) {
    $conn = new DatabaseConnection();
    $pdo = $conn->open();

    $selectStatement = $pdo->prepare(
        "SELECT hash, email_confirmed FROM users WHERE hash = :hash AND email_confirmed IS NULL"
    );
    $selectStatement->bindParam(":hash", $hash);
    $selectStatement->execute();
    $rows = $selectStatement->rowCount();

    if ($rows == 1) {
        $updateStatement = $pdo->prepare("UPDATE users SET email_confirmed = 1 WHERE hash = :hash");
        $updateStatement->bindParam(":hash", $hash);
        $isSuccess = $updateStatement->execute();
    }
}

require_once '../application/views/confirmed.php';
