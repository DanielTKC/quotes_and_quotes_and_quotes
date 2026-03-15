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

    $quote->id = $_GET['id'] ?? die();

    $quote->read_single();
    $quote_arr = array(
        'id' => $quote->id,
        'quote' => $quote->quote,
        'author' => $quote->author,
        'category' => $quote->category


    );
    print_r(json_encode($quote_arr));