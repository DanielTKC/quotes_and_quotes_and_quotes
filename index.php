<?php
    declare(strict_types = 1);
    require_once('vendor/autoload.php');

    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->load();

    echo '<pre>';
    echo '<br>';
    echo $_ENV['NAME'] . "\n";
    print_r($_SERVER);
    echo '</pre>';

    phpinfo();
