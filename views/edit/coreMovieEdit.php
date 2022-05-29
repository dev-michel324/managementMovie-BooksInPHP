<?php
    if($_GET['id']){
        $id = $_GET['id'];
        $name = $_POST['name'];
        $year = $_POST['year'];
        $director = $_POST['director'];

        $connection = require __DIR__ . "/../../dbconnection.php";

        $connection->exec("UPDATE movies SET name='" . $name . "', years='". $year . "', director='" . $director . "' WHERE id = $id");

        session_start();

        $_SESSION['message'] = "movie-success-edited";

        header("Location: /");

        exit();
    }
    exit();
?>