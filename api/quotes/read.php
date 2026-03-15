<?php
    // Headers
    use models\Quote;

    require_once '../../config/bootstrap.php';
    require_once '../../models/Quote.php';

    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json");

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

        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            $quote_item = array(
                'id' => $id,
                'quote' => $quote,
                'author_id' => $author_id,
                'author' => $author,
                'category_id' => $category_id,
                'category' => $category,
            );

            $quotes_arr[] = $quote_item;
        }

        echo json_encode($quotes_arr);
    } else {
        echo json_encode(
            array("message" => "No Quotes found.")
        );
    }