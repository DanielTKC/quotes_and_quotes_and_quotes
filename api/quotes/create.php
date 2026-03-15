<?php
    // Headers
    use models\Quote;

    require_once '../../config/bootstrap.php';
    require_once '../../models/Quote.php';

    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With");

    // DB OBJECT & CONNECT
    $database = new Database();
    $db = $database->connect();

    // Instantiate quote object
    $quote = new Quote($db);

    // Get raw posted data
    $data = json_decode(file_get_contents("php://input"));

    $quote->quote = $data->quote;
    $quote->author_id = $data->author_id;
    $quote->category_id = $data->category_id;

    // Create post
    if ($quote->create()) {
        echo json_encode(
            array('message' => 'Quote created')
        );
    } else {
        echo json_encode(
            array('message' => 'Quote Not Created')
        );
    }