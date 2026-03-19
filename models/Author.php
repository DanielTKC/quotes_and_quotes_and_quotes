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
                LIMIT 1';

            $stmt = $this->conn->prepare($query);

            //Bind ID
            $stmt->bindParam(1, $this->id);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if (!$row) {
                return false;
            }

            // Set Property
            $this->id = $row['id'];
            $this->author = $row['author'];
            return true;
        }

        public function create()
        {
            $query = 'INSERT INTO ' . $this->table . '
                (author)
                VALUES (:author)';

            $stmt = $this->conn->prepare($query);
            $this->author = htmlspecialchars(strip_tags($this->author));

            // bind data
            $stmt->bindParam(':author', $this->author);

            if($stmt->execute()) {
                $this->id = $this->conn->lastInsertId();
                return true;
            }

            return false;
        }

        // Update
        public function update()
        {
            $query = 'UPDATE ' . $this->table . '
                SET author = :author
                WHERE id = :id';

            $stmt = $this->conn->prepare($query);
            $this->author = htmlspecialchars(strip_tags($this->author));
            $this->id = htmlspecialchars(strip_tags($this->id));

            // bind data
            $stmt->bindParam(':author', $this->author);
            $stmt->bindParam(':id', $this->id);

            if($stmt->execute()) {
                return true;
            }

            return false;
        }
        public function delete()
        {
            $query = 'DELETE FROM ' . $this->table . ' WHERE id = :id';
            $stmt = $this->conn->prepare($query);
            $this->id = htmlspecialchars(strip_tags($this->id));
            $stmt->bindParam(':id', $this->id);
            if ($stmt->execute()) {
                return true;
            }
            return false;
        }
    }