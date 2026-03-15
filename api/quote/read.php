<?php
    // Headers
    use models\Quote;

    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json");
    include_once '../../config/Database.php';
    include_once '../../models/Quote.php';

    // DB OBJECT & CONNECT
    $database = new Database();
    $db = $database->connect();

    // Instantiate quote object
    $quote = new Quote($db);

    // Quote query
    $result = $quote->read();
    $num = $result->rowCount();

    // Check if any quotes
    if ($num > 0) {
        $quotes_arr = array();
        $quotes_arr['data'] = array();

        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            $quote_item = array(
                'id' => $id,
                'quote' => $quote,
                'author_id' => $author_id,
                'author_name' => $author_name,
                'category_id' => $category_id,
                'category_name' => $category_name,
            );

            // push to data
            $quotes_arr['data'][] = $quote_item;
        }

        // Turn to json
        echo json_encode($quotes_arr);
    } else {
        echo json_encode(
            array("message" => "No Quotes found.")
        );
    }