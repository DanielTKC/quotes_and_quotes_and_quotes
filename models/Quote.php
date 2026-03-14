<?php

    namespace models;

    class Quote
    {
        // DB
        private $conn;
        private $table = 'quotes';

        // Quote Properties
        public $id;
        public $category_id;
        public $category_name;
        public $author_id;
        public $author;
        public $quote;

        // constructor with DB
        public function __construct($db) {
            $this->conn = $db;
        }

        // Get quotes
        public function read(): void
        {
            // Create query
            $query = 'SELECT
                c.name as category_name,
                a.name as author_name,
                q.id,
                q.category_id,
                q.author_id,
                q.quote
            FROM
                ' . $this->table . ' q
            LEFT JOIN
                categories c ON q.category_id = c.id,
                authors a ON q.author_id = a.id
            ORDER BY
            a.name ASC';
        }


    }