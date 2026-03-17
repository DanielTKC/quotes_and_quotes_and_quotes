<?php
    /**
     * @var \models\Category $category
     */
    // Get ID from URL
    $category->id = $_GET['id'] ?? die();

    // Get category
    $category->read_single();

    // create array
    $category_arr = array(
        'id' => $category->id,
        'category' => $category->category,
    );

    echo json_encode($category_arr);