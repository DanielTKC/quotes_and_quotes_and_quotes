<?php
    use models\Author;
    require_once '../../config/bootstrap.php';
    require_once '../../models/Author.php';

    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json");

    // DB OBJECT & CONNECT
    $database = new Database();
    $db = $database->connect();

    // Instantiate quote object
    $author = new Author($db);

    // Quote query
    $result = $author->read();
    $num = $result->rowCount();

