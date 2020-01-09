<?php

ini_set('display_errors', 1);
set_error_handler(function ($severity, $message, $file, $line) {
    throw new \ErrorException($severity, $message, $file, $line);
});

session_start();

function partial($__name, $params = [])
{
    extract($params);
    require (__DIR__ . "/html_partials/{$__name}.html.php");
}

function is_post(){
    return ($_SERVER["REQUEST_METHOD"] ?? "CLI") === "POST";
}

function redirect($url){
    header("Location: $url");
    die();
}

function redirect_self(){
    redirect($_SERVER["REQUEST_URI"]);
}

function redirect_unless_admin(){
    if (!($_SESSION["admin"] ?? null)) {
        redirect('/admin/login.php');
    }
}

function abord_404(){
    http_response_code(404);
    echo "Error 404, page not found";
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
        $_SESSION["previous_inputs"] = $_SESSION["previous_inputs"] ?? [];
        $_SESSION['previous_inputs'][$key] = $value;
    }
}


function get_previous_inputs(){
    static $previous_inputs;

    if ($previous_inputs){
        return $previous_inputs;
    }

    $previous_inputs = $_SESSION["previous_inputs"] ?? null;
    $_SESSION["previous_inputs"] = [];
    return $previous_inputs;
}

function get_previous_input($key){
    return get_previous_inputs()[$key] ?? null;
}

function slugify($string){
    return $string;
}

function accents(){
    return [
        'é' => "É"
    ];
}


import('validation');
import("flash");
import("database");