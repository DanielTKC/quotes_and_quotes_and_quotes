<?php
    // Headers
    use models\Category;

    require_once '../../config/bootstrap.php';
    require_once '../../models/Category.php';

    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With");

    // DB OBJECT & CONNECT
    $database = new Database();
    $db = $database->connect();

    // Instantiate quote object
    $category = new Category($db);

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