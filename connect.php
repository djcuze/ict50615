<?php
$host = 'localhost';
$db_name = 'registration';
$port = '3306';
$charset = 'utf8mb4';
// Database Credentials
$db_username = 'root';
$db_password = 'root';

$dsn = "mysql:host=$host;dbname=$db_name;port=$port;charset=$charset";
$opt = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];
$db = new PDO($dsn, $db_username, $db_password, $opt);