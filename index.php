<?php
    declare(strict_types = 1);
    require_once('vendor/autoload.php');

    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->safeLoad();

    require_once('config/Database.php');

    $db = new Database();
    $conn = $db->connect();

    if ($conn) {
        $stmt = $conn->prepare('SELECT * FROM quotes WHERE id = :id');
        $stmt->execute(['id' => 1]);
        $quote = $stmt->fetch(PDO::FETCH_ASSOC);

        echo '<pre>';
        print_r($quote);
        echo '</pre>';
    }
