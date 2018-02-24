<?php

include 'register.php';

$stmt = $pdo->query("SELECT * FROM users");

while ($user = $stmt->fetch(PDO::FETCH_ASSOC)) {
//    echo $user['username'] . $user['password'];
    var_dump($user);
}
?>