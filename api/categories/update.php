<?php
    /**
     * @var \models\Category $category
     */

    // Get raw posted data
    $data = json_decode(file_get_contents("php://input"));

    if (!isset($data->category)) {
        echo json_encode(array('message' => 'Missing Required Parameters'));
        return;
    }
    // Set ID to update
    $category->id = $data->id;
    $category->category = $data->category;

    // Update post
    if ($category->update()) {
        echo json_encode(
            array(
                'id' => $category->id,
                'category' => $category->category,
            )
        );
    } else {
        echo json_encode(
            array('message' => 'Category Not Updated')
        );
    }