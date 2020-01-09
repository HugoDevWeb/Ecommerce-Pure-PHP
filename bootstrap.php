<?php

define("START_MICROTIME", microtime(true));

ini_set('display_errors', 1);
set_error_handler(function ($severity, $message, $file, $line) {
    throw new \ErrorException($severity, $message, $file, $line);
});

register_shutdown_function(function () {
    $time = round((microtime(true) - START_MICROTIME) * 1000, 3);
    file_put_contents("php://stderr", "Exec time: {$time}ms" );
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

    $lower = string_to_lower($string);
    $allowed_characters = '\-a-zA-Z0-9' . implode(array_keys(french_weird_characters()));
    $clean = preg_replace("/[^$allowed_characters]/", '-', $lower);

    return preg_replace('![-\s]+!u', '-', $clean);
}

function string_to_lower($string){


    return mb_strtolower(str_replace(array_values(french_weird_characters()), array_keys(french_weird_characters()), $string));
}




function french_weird_characters(){
    return [
        'é' => 'É',
        'è' => 'È',
        'à' => 'À',
        'ç' => 'Ç',
        'ê' => 'Ê',
        'œ' => 'Œ',
        'ù' => 'Ù'
    ];
}


import('validation');
import("flash");
import("database");
import("products");