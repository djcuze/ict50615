<?php
include_once 'config.php';

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
$pdo = new PDO($dsn, $db_username, $db_password, $opt);

$errors = [];
$missing = [];
if (isset($_POST['send'])) {
    $expected = ['username', 'password'];
}
?>
<!doctype html>
<html lang="en">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Registration</title>

<?php if ($errors || $missing): ?>
    <p class="warning">Please fix the following:</p>
<?php endif; ?>
<form method="post" action="<?= $_SERVER['PHP_SELF']; ?>">
    <label for="username">Username:
        <?php if ($missing && in_array('username', $missing)) : ?>
            <span class="warning"> Please enter your name</span>
        <?php endif ?>
    </label>
    <input name="username" type="text" id="username"/>

    <label for="password">Password:
        <?php if ($missing && in_array('password', $missing)) : ?>
            <span class="warning"> Please enter your password</span>
        <?php endif ?>
    </label>
    <input name="password" type="text" id="password"/>

    <input type="submit" value="Submit"/>
</form>
<pre>
<!--    --><?php
//        $username = $_POST['username'];
//        $password = $_POST['password'];
//        $submit_data = [
//            'username' => $username,
//            'password' => $password
//        ];
////        $pdo->prepare("INSERT INTO users VALUES (NULL, $username, $password)")->execute();
////        $insert_sql = "INSERT INTO users (id, username, password) VALUES ( null, $username, $password );"
////        echo $insert_sql;
//    }
//    $select_sql = "SELECT * FROM users;";
////    echo "<br>$select_sql";
//    ?>
</pre>
</html>