<?php

    $route = [
        "/" => "/views/redirect.php",
        "/home" => "/views/home.php",
        // books crud
        "/addBook" => "/views/add/addBook.php",
        "/coreBook" => "/views/add/coreBook.php",
        "/deleteBook" => "/views/delete/deleteBook.php",
        "/editBook" => "/views/edit/editBook.php",
        "/coreBookEdit" => "/views/edit/coreBookEdit.php",
        // movies crud
        "/addMovie" => "/views/add/addMovie.php",
        "/coreMovie" => "/views/add/coreMovie.php",
        "/deleteMovie" => "/views/delete/deleteMovie.php",
        "/editMovie" => "/views/edit/editMovie.php",
        "/coreMovieEdit" => "/views/edit/coreMovieEdit.php",
    ];

return $route;

?>