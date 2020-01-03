<?php

ini_set('display_errors', 1);
session_start();
function partial($name, $params = [])
{
    extract($params);
    require (__DIR__ . "/html_partials/{$name}.html.php");
}



function is_post(){
    return $_SERVER["REQUEST_METHOD"] === "POST";
}

function pdo(){
    $pdo = new PDO("mysql:host=localhost;dbname=coton", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $pdo;
}

function redirect($url){
    header("Location: $url");
    die();
}

function redirect_unless_admin(){
    if (!($_SESSION["admin"] ?? null)) {
        redirect('/admin/login.php');
    }
}

function abord_404(){
    http_response_code(404);
    die();
}

?>