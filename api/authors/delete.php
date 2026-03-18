<?php
    /**
     * @var \models\Author $author
     */

    // Get raw posted data
    $data = json_decode(file_get_contents("php://input"));
    // Set ID to delete
    $author->id = $data->{'id'};

    // Delete post
    if ($author->delete()) {
        echo json_encode(
            array('message' => 'Author Deleted')
        );
    } else {
        echo json_encode(
            array('message' => 'Author Not Deleted')
        );
    }