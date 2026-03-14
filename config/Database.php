<?php
    class Database {
        private $host = "localhost";
        private $port = '5432';
        private $db_name = 'quotesdb';
        private $username;
        private $password;
        private $conn;

        public function __construct() {
            $this->username = $_ENV['USER'];
            $this->password = $_ENV['PASS'];
        }

        public function connect() {
            $this->conn = null;
            $dsn = "pgsql:host={$this->host};port={$this->port};dbname={$this->db_name}";

            try {
                $this->conn = new PDO($dsn, $this->username, $this->password);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
            return $this->conn;
        }
    }