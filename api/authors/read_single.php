<?php
    /**
     * @var \models\Author $author
     */

    // Get ID from URL

    $author->id = $_GET['id'] ?? die();

    // Get author or throw error message
    if (!$author->read_single()) {
        echo json_encode(['message' => 'author_id Not Found']);
        return;
    }

    // create array
    $author_arr = array(
        'id' => $author->id,
        'author' => $author->author,
    );

    print_r(json_encode($author_arr));