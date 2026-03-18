<?php
    /**
     * @var \models\Category $category
     */

    // Get raw posted data
    $data = json_decode(file_get_contents("php://input"));

    $category->category = $data->category;

    // Create post
    if ($category->create()) {
        echo json_encode(
            array('message' => 'Category created')
        );
    } else {
        echo json_encode(
            array('message' => 'Category Not Created')
        );
    }