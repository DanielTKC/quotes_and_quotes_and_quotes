<?php

    namespace models;

    class Category
    {
        private $conn;
        private $table = 'categories';

        // Author Properties

        public $id;
        public $category;

        // Database conn
        public function __construct($db) {
            $this->conn = $db;
        }

        public function read(){
            $query = 'SELECT
                    id,
                    category
                FROM
                    '. $this->table .'
                ORDER BY
                category ASC';

            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt;
        }

    }