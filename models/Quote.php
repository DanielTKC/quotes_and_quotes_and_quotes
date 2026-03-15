<?php

    namespace models;

    use PDO;

    class Quote
    {
        // DB
        private $conn;
        private $table = 'quotes';

        // Quote Properties
        public $id;
        public $category_id;
        public $category;
        public $author_id;
        public $author;
        public $quote;

        // constructor with DB
        public function __construct($db)
        {
            $this->conn = $db;
        }

        // Get quotes
        public function read()
        {
            // Create query
            $query = 'SELECT
                    c.category,
                    a.author,
                    q.id,
                    q.category_id,
                    q.author_id,
                    q.quote
                FROM
                    ' . $this->table . ' q
                LEFT JOIN
                    categories c ON q.category_id = c.id
                LEFT JOIN
                    authors a ON q.author_id = a.id
                ORDER BY
                    a.author ASC';

            // Prepare Statement
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt;
        }

        public function read_single()
        {
            $query = 'SELECT
                    c.category,
                    a.author,
                    q.id,
                    q.category_id,
                    q.author_id,
                    q.quote
                FROM
                    ' . $this->table . ' q
                LEFT JOIN
                    categories c ON q.category_id = c.id
                LEFT JOIN
                    authors a ON q.author_id = a.id
                    WHERE
                    q.id = ?
                LIMIT 1';
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $this->id);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $this->id = $row['id'];
            $this->quote = $row['quote'];
            $this->author = $row['author'];
            $this->category = $row['category'];



        }


    }