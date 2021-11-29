<?php
    $host = 'localhost';
    $username = 'dias_designs';
    $password = 'admin_root';
    $db = 'ecommerce';

    $conn = new PDO("mysql:host=$host;dbname=$db;charset=utf8mb4", $username, $password);


?>