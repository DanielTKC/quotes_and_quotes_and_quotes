<?php
    /**
     * @var \models\Quote $quote
     */

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