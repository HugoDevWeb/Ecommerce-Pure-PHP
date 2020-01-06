<?php

ini_set('display_errors', 1);

session_start();

if (is_post()) {
    $previous_errors = [];
    $previous_inputs = [];
} else {
    $previous_errors = $_SESSION['previous_errors'] ?? [];
    $previous_inputs = $_SESSION['previous_inputs'] ?? [];
    $_SESSION['previous_errors'] = [];
    $_SESSION['previous_inputs'] = [];
}


function partial($name, $params = [])
{
    extract($params);
    require (__DIR__ . "/html_partials/{$name}.html.php");
}

function is_post(){
    return ($_SERVER["REQUEST_METHOD"] ?? "CLI") === "POST";
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



function is_on_page($page){
    return $_SERVER["SCRIPT_NAME"] === $page;
}


function is_on_directory($directory){
    return strpos($_SERVER["SCRIPT_NAME"], $directory) === 0;
}

function import($lib){
    require_once(__DIR__ . "/lib/{$lib}.php");
}

function save_inputs(){
    foreach ($_POST as $key => $value){
        if (in_array($key, ['password'])) {
            continue;
        }
        $_SESSION['previous_inputs'][$key] = $value;
    }
}

?>