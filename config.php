<?php

$ROOT = "/" . basename(__DIR__);

$adminEmail = "arteemkuznetsov@gmail.com";
$accountDirs = [
    "signin",
    "registration"
];
$platforms = [
    "PSP®" => [
        "name" => "PSP",
        "css" => "platform--ps-portables",
        "available" => false
    ],
    "PS Vita" => [
        "name" => "PS Vita",
        "css" => "platform--ps-portables",
        "available" => false
        ],
    "PS3™" => [
        "name" => "PS3",
        "css" => "platform--ps3",
        "available" => false
    ],
    "PS4™" => [
        "name" => "PS4",
        "css" => "platform--ps4",
        "available" => true
    ],
    "PS5" => [
        "name" => "PS5",
        "css" => "platform--ps5",
        "available" => true
    ]
];
