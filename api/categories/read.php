<?php
    use models\Category;
    require_once '../../config/bootstrap.php';
    require_once '../../models/Category.php';

    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json");

    // DB OBJECT & CONNECT
    $database = new Database();
    $db = $database->connect();

    // Instantiate category object
    $category = new Category($db);

    // category query
    $result = $category->read();
    $num = $result->rowCount();

    if ($num > 0) {
        $categories_arr= array();

        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            $category_item = array(
                'id' => $id,
                'category' => $category,
            );

            $categories_arr[] = $category_item;
        }

        echo json_encode($categories_arr);
    } else {
        echo json_encode(
            array("message" => "No Quotes found.")
        );
    }

