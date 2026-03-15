<?php

    namespace models;

    class Author
    {
        private $conn;
        private $table = 'authors';

        // Author Properties

        public $id;
        public $author;

        // Database conn
        public function __construct($db) {
            $this->conn = $db;
        }

        public function read(){
                $query = 'SELECT
                    id,
                    author
                FROM
                    '. $this->table .'
                ORDER BY
                author ASC';

            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt;
        }
    }