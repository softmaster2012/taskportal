<?php
    $request_uri = $_SERVER['REQUEST_URI'];
    require_once('sys/routers/router.php');
    $router = new Router($request_uri);
    $router->route();