<?php
    /**
     * @var \models\Category $category
     */
    // Get ID from URL
    $category->id = $_GET['id'] ?? die();

    // Get category or throw error message
    if (!$category->read_single()) {
        echo json_encode(['message' => 'category_id Not Found']);
        return;
    }

    // create array
    $category_arr = array(
        'id' => $category->id,
        'category' => $category->category,
    );

    print_r(json_encode($category_arr));