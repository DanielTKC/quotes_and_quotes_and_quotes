<?php
    /**
     * @var \models\Quote $quote
     */
    // we have to check if these are set, and if they are pass them to the model to be added to the query.
    $quote->author_id = $_GET['author_id'] ?? null;
    $quote->category_id = $_GET['category_id'] ?? null;

    // Quote query
    $result = $quote->read();
    $num = $result->rowCount();

    // Check if any quotes
    if ($num > 0) {
        $quotes_arr = array();

        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            $quote_item = array(
                'id' => $id,
                'quote' => $quote,
                'author' => $author,
                'category' => $category,
            );

            $quotes_arr[] = $quote_item;
        }

        echo json_encode($quotes_arr);
    } else {
        echo json_encode(
            array("message" => "No Quotes Found")
        );
    }