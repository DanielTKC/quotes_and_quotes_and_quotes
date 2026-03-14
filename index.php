<?php
    declare(strict_types = 1);
    require_once('vendor/autoload.php');

    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->safeLoad();

    echo '<pre>';
    echo '<br>';
    print_r($_SERVER);
    echo '</pre>';

    phpinfo();
