<?php

function partial($name, $params = [])
{
    extract($params);
    require (__DIR__ . "/html_partials/{$name}.html.php");
}


?>