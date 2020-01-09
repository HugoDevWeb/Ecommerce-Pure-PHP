<?php

function pdo(){

    static $pdo;
    if ($pdo){
        return $pdo;
    }

    $pdo = new PDO("mysql:host=localhost;dbname=coton", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $pdo;
}
