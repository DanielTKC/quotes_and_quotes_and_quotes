<?php

    use models\Category;

    require_once '../../config/bootstrap.php';
    require_once '../../models/Category.php';

    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json");

    // DB OBJECT & CONNECT
    $database = new Database();
    $db = $database->connect();

    // Instantiate quote object
    $category = new Category($db);

    // Get ID from URL

    $category->id = $_GET['id'] ?? die();

    // Get category
    $category->read_single();

    // create array
    $category_arr = array(
        'id' => $category->id,
        'category' => $category->category,
    );

    print_r(json_encode($category_arr));