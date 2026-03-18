<?php
    /**
     * @var \models\Quote $quote
     */

    // Get raw posted data
    $data = json_decode(file_get_contents("php://input"));

    // Set ID to update
    $quote->id = $data->id;



    // Delete post
    if ($quote->delete()) {
        echo json_encode(
            array('message' => 'Quote Deleted')
        );
    } else {
        echo json_encode(
            array('message' => 'Quote Not Deleted')
        );
    }