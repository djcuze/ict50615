<?php

include 'register.php';
$insert_sql = "INSERT INTO users (username, password) VALUES (?,?)";

$stmt = $db->prepare($insert_sql);

$username = $_POST['username'];
$password = $_POST['password'];

$stmt->bindParam(1, $username);
$stmt->bindParam(2, $password);
$stmt->execute();

while ($user = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo $user['username'] . ": " . $user['password'];
}