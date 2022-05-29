<?php
    session_start();

    if(isset($_GET['id'])){
        
        $connection = require __DIR__ . "/../../dbconnection.php";
        $id = $_GET['id'];
        $connection->exec("DELETE FROM books WHERE book_id = $id");

        $_SESSION['message'] = "book-success-deleted";
        
        header("Location: /");
        exit();
    }

    $_SESSION['message'] = "uri-parameters-invalid";
    header("Location: /");
    exit();

?>