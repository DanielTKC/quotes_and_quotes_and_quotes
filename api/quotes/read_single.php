<?php
    /**
     * @var \models\Quote $quote
     */
    $quote->id = $_GET['id'] ?? die();

    $quote->read_single();
    $quote_arr = array(
        'id' => $quote->id,
        'quote' => $quote->quote,
        'author' => $quote->author,
        'category' => $quote->category


    );
    print_r(json_encode($quote_arr));