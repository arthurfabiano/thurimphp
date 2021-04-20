<?php
    if (!session_id()) session_start();

    $routes = require_once __DIR__ . "/../app/Config/Routes.php";
    $route = new \Core\Route($routes);