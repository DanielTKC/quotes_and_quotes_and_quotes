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

    if ($num > 0) {
        $authors_array = array();

        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            $author_item = array(
                'id' => $id,
                'author' => $author,
            );

            $authors_arr[] = $author_item;
        }

        echo json_encode($authors_arr);
    } else {
        echo json_encode(
            array("message" => "No Quotes found.")
        );
    }

