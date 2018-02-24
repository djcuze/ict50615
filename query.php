<?php

include 'register.php';

foreach($pdo->query("SELECT * FROM users") as $user) {
    echo $user['username'] . $user['password'];
}
?>