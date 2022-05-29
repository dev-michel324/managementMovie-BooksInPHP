<?php

    $route = require("route.php");

    if($_SERVER['PATH_INFO']){
        $uri = $_SERVER['PATH_INFO'];
    }else{
        $uri = $_SERVER['REQUEST_URI'];
    }

    $database = require("dbconnection.php");

    $database->exec("CREATE TABLE IF NOT EXISTS books(book_id INTEGER PRIMARY KEY AUTOINCREMENT, title CHAR(255), years INTEGER, author CHAR(255))");

    $database->exec("CREATE TABLE IF NOT EXISTS movies(id INTEGER PRIMARY KEY AUTOINCREMENT, name CHAR(255), years INTEGER, director CHAR(255) NULL)");

    $database->close();

    foreach($route as $page => $path){
        if($page == $uri){
            require __DIR__ . "$path";
            exit();
        }
    }

    http_response_code(404);
    require("views/404.php");

?>