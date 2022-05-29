<?php
    session_start();
    if(isset($_GET['id'])){
        
        $connection = require __DIR__ . "/../../dbconnection.php";
        $id = $_GET['id'];
        $connection->exec("DELETE FROM movies WHERE id = $id");

        $_SESSION['message'] = "movie-success-deleted";

        header("Location: /");
        exit();
    }

    header("Location: /");
    exit();

?>