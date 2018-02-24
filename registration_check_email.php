<?php
require_once 'config.php';
$select_sql = "SELECT * FROM users WHERE username = ?";

$stmt = $db->prepare($select_sql);

$username = $_GET['username'];

$stmt->bindParam(1, $username);
$stmt->execute();

$user = $stmt->fetch(PDO::FETCH_ASSOC);

$user['username'] == $_GET['username'] ? $r = 'User Exists' : $r = 'Green Tick';

echo $user['username'] == $_GET['username'] ? 'Not Available' : 'Available';