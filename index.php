<?php

$route = !empty($_GET['url']) ? $_GET['url'] : "Home/index";
$array = explode("/", $route);
$controller = $array[0];
$method = "index";
$parameters = "";

if (!empty($array[1]) && $array[1] != "") {
    $method = $array[1];
}

if (!empty($array[2]) && $array[2] != "") {
    for ($i = 2; $i < count($array); $i++) {
        $parameters .= $array[$i] . ",";
    }
    $parameters = trim($parameters, ",");
}

$dirControllers = "Controllers/" . $controller . ".php";

if (file_exists($dirControllers)) {
    if (file_exists($dirControllers));
    require_once $dirControllers;
    $controller = new $controller();
    if (method_exists($controller, $method)) {
        $controller->$method($parameters);
    } else {
        echo "No existe el método";
    }
} else {
    echo "No existe el controlador";
}
