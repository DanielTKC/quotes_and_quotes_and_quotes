<?php
    /**
     * @var \models\Author $author
     */

    // Get raw posted data
    $data = json_decode(file_get_contents("php://input"));

    $author->author = $data->author;

    // Create post
    if ($author->create()) {
        echo json_encode(
            array(
                'id' => $author->id,
                'author' => $author->author
            )
        );
    } else {
        echo json_encode(
            array('message' => 'Author Not Created')
        );
    }