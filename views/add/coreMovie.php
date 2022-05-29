<?php

    $connection = require(__DIR__ . "/../../dbconnection.php");

    if(null != $_POST['name'] && null != $_POST['year'] && null != $_POST['director']){
        $name = $_POST['name'];
        $year = $_POST['year'];
        $director = $_POST['director'];

        $connection->exec("INSERT INTO movies(name, years, director) VALUES('" . $name . "', '" . $year . "', '" . $director . "')");

        session_start();

        $_SESSION['message'] = "movie-success-added";

        header('Location: /home');
        
        exit();
    }

    require __DIR__ . "/add.php";

    exit();
?>