<?php
    class Database {
        private $host;
        private $port;
        private $db_name;
        private $username;
        private $password;
        private $conn;

        public function __construct() {
            $this->username = $_ENV['DB_USER'];
            $this->password = $_ENV['DB_PASS'];
            $this->db_name = $_ENV['DB_NAME'];
            $this->host = $_ENV['HOST'];
            $this->port = $_ENV['PORT'];
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