<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $title = $_POST['title'];
    $year = $_POST['year'];
    $author = $_POST['author'];

    $connection = require __DIR__ . "/../../dbconnection.php";

    $connection->exec("UPDATE books SET title='" . $title . "', years='". $year . "', author='" . $author . "' WHERE book_id = $id");

    session_start();

    $_SESSION['message'] = "book-success-edited";

    header("Location: /");

    exit();
}
?>