<?php

$database = new SQLite3(__DIR__ . "/db/books.db");

return $database;

?>