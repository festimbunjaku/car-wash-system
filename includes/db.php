
<?php

$host = "localhost";
$database = "carwashapp";
$charset = "utf8mb4";
$username = "root";
$password = "";

$dsn = "mysql:host=$host;dbname=$database;charset=$charset";

$pdo = new PDO($dsn, $username, $password);