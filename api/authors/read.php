<?php
    /**
     * @var \models\Author $author
     */

    // Author query
    $result = $author->read();
    $num = $result->rowCount();

    if ($num > 0) {
        $authors_arr = array();

        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            $author_item = array(
                'id' => $id,
                'author' => $author,
            );

            $authors_arr[] = $author_item;
        }

        echo json_encode($authors_arr);
    } else {
        echo json_encode(
            array("message" => "author_id Not Found")
        );
    }

