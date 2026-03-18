<?php

    namespace models;

    use PDO;

    class Category
    {
        private $conn;
        private $table = 'categories';

        // Author Properties

        public $id;
        public $category;

        // Database conn
        public function __construct($db)
        {
            $this->conn = $db;
        }

        public function read()
        {
            $query = 'SELECT
                    id,
                    category
                FROM
                    ' . $this->table . '
                ORDER BY
                category ASC';

            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt;
        }

        public function read_single()
        {
            $query = 'SELECT
                            id,
                            category
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

            // Set Property
            $this->id = $row['id'];
            $this->category = $row['category'];
        }

        public function create()
        {
            $query = 'INSERT INTO ' . $this->table . '
                (category)
                VALUES (:category)';

            $stmt = $this->conn->prepare($query);
            $this->category = htmlspecialchars(strip_tags($this->category));

            // bind data
            $stmt->bindParam(':category', $this->category);

            if ($stmt->execute()) {
                return true;
            }

            printf("Error: %s.\n", $stmt->error);
            return false;
        }

        // Update
        public function update()
        {
            $query = 'UPDATE ' . $this->table . '
                SET category = :category 
                WHERE id = :id';

            $stmt = $this->conn->prepare($query);
            $this->category = htmlspecialchars(strip_tags($this->category));
            $this->id = htmlspecialchars(strip_tags($this->id));
            // bind data
            $stmt->bindParam(':category', $this->category);
            $stmt->bindParam(':id', $this->id);

            if ($stmt->execute()) {
                return true;
            }

            printf("Error: %s.\n", $stmt->error);
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
            printf("Error: %s.\n", $stmt->error);
            return false;
        }


    }