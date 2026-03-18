<?php
    /**
     * @var \models\Author $author
     */

    // Get ID from URL

    $author->id = $_GET['id'] ?? die();

    // Get author
    $author->read_single();

    // create array
    $author_arr = array(
        'id' => $author->id,
        'author' => $author->author,
    );

    print_r(json_encode($author_arr));