<?php
    /**
     * @var \models\Category $category
     */
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With");

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