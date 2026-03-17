<?php
    // Headers
    use models\Author;

    require_once '../../config/bootstrap.php';
    require_once '../../models/Author.php';

    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With");

    // DB OBJECT & CONNECT
    $database = new Database();
    $db = $database->connect();

    // Instantiate quote object
    $author = new Author($db);

    // Get raw posted data
    $data = json_decode(file_get_contents("php://input"));

    $author->author = $data->author;

    // Create post
    if ($author->create()) {
        echo json_encode(
            array('message' => 'Author created')
        );
    } else {
        echo json_encode(
            array('message' => 'Author Not Created')
        );
    }