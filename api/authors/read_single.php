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

    // Get ID from URL

    $author->id = $_GET['id'] ?? die();

    // Get author
    $author->read_single();

    // create array
    $author_arr = array(
        'id' => $author->id,
        'author' => $author->author,
    );

    print_r(json_encode($author_arr));