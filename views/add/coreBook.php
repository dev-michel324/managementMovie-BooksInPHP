<?php

    $connection = require(__DIR__ . "/../../dbconnection.php");

    if(null != $_POST['title'] && null != $_POST['year'] && null != $_POST['author']){
        $title = $_POST['title'];
        $year = $_POST['year'];
        $author = $_POST['author'];

        $connection->exec("INSERT INTO books(title, years, author) VALUES('" . $title . "', '" . $year . "', '" . $author . "')");

        session_start();

        $_SESSION['message'] = "book-success-added";

        header('Location: /home');
        
        exit();
    }

    require __DIR__ . "/add.php";

    exit();
?>