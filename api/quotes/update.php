<?php
    /**
     * @var \models\Quote $quote
     * @var PDO $db
     */

    require_once '../../helpers.php';

    // Get raw posted data
    $data = json_decode(file_get_contents("php://input"));

    if (!isset($data->quote) || !isset($data->author_id) || !isset($data->category_id)) {
        echo json_encode(array('message' => 'Missing Required Parameters'));
        return;
    }

    // Query the db using the helper function
    if (!doesKeyExist($db, 'authors', $data->author_id, 'author_id')) return;
    if (!doesKeyExist($db, 'categories', $data->category_id, 'category_id')) return;

    // Set ID to update
    $quote->id = $data->id;

    $quote->quote = $data->quote;
    $quote->author_id = $data->author_id;
    $quote->category_id = $data->category_id;

    // Update post
    if ($quote->update()) {
        echo json_encode(
            array(
                "id" => $quote->id,
                "quote" => $quote->quote,
                "author_id" => $quote->author_id,
                "category_id" => $quote->category_id,
            )
        );
    } else {
        echo json_encode(
            array('message' => 'No Quotes Found')
        );
    }