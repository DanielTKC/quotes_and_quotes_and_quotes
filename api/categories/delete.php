<?php
    /**
     * @var \models\Category $category
     */

    // Get raw posted data
    $data = json_decode(file_get_contents("php://input"));
    // Set ID to delete
    $category->id = $data->id;

    // Delete post
    if ($category->delete()) {
        echo json_encode(
            array(
                "id" => $category->id,
            )
        );
    } else {
        echo json_encode(
            array('message' => 'Category Not Deleted')
        );
    }