<?php

    namespace models;

    use PDO;

    class Author
    {
        private $conn;
        private $table = 'authors';

        // Author Properties

        public $id;
        public $author;

        // Database conn
        public function __construct($db)
        {
            $this->conn = $db;
        }

        public function read()
        {
            $query = 'SELECT
                    id,
                    author
                FROM
                    ' . $this->table . '
                ORDER BY
                author ASC';

            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt;
        }

        public function read_single()
        {
            $query = 'SELECT
                            id,
                            author
                FROM
                    ' . $this->table . '
                WHERE
                id = ?
                LIMIT 0,1';

            $stmt = $this->conn->prepare($query);

            //Bind ID
            $stmt->bindParam(1, $this->id);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            // Set Property
            $this->id = $row['id'];
            $this->author = $row['author'];
        }
    }