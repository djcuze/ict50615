### 1. Create a Registration form that contains at least e-mail/password, but should contain more depending on the project you intend to do (register.html)

```html
<!doctype html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Registration</title>

<form action="registration_process.php" method="post">
    <label for="username">Username</label>
    <input name="username" type="text" id="username"/>

    <label for="password">Password</label>
    <input name="password" type="text" id="password"/>

    <input type="submit" value="Submit" />
</form>
```

### 2. The form must have an action and a method

### 3. Store pages in htdocs folder of your webserver

### 4. You should create a PHP file that the form submits to with 1 line: print_r($_POST); This should print out the contents of the form. (registration_process.php)

### 5. Create a database table 'users' that will contain the registration data from the form.

```sql
CREATE DATABASE registration;
USE DATABASE registration;
CREATE TABLE users ( id smallint unsigned not null auto_increment, username varchar(20) not null unique, password varchar(20) not null, primary key (id) );
```

### 6. Write two SQL statements on to SELECT and one to INSERT

```sql
INSERT INTO users (id, username, password) VALUES ( null, 'foo', 'bar' );
SELECT * FROM users;
```

### 7. Take the $_POST variables from the form and substitute them into the SQL statements. print $insert_sql

### 8. Write PDO statements in PHP and find out how to insert (1. new PDO, 2. prepare, 3. execute)
```php
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
```

### 9. Refactor 8 with a SELECT instead of insert and IF a result is found print "user exists" ELSE print "Green Tick" registration_check_email.php

```php
<?php
include 'register.php';

$select_sql = "SELECT * FROM users WHERE username = ?";

$stmt = $db->prepare($select_sql);

$username = $_POST['username'];

$stmt->bindParam(1, $username);
$stmt->execute();

while ($user = $stmt->fetch(PDO::FETCH_ASSOC)) {
    if ($user['username'] == $_POST['username']) {
        print 'user exists';
    } else {
        print 'Green Tick';
    }
}

```

### 10. Use JQuery load function to call registration_check_email.php onChange of the e-mail field, and alert the user approprately

`registration_check_email.js`
```javascript
$(document).ready(function ($) {
    function registrationCheckEmail() {
        var directory = 'registration_check_email.php?username=' + $(this).val();
        $('.errors').load(directory);
    }
    $('#username').on("change", registrationCheckEmail);
});
```
`registration_check_email.php`
```php
<?php
require_once 'config.php';
$select_sql = "SELECT * FROM users WHERE username = ?";

$stmt = $db->prepare($select_sql);

$username = $_GET['username'];

$stmt->bindParam(1, $username);
$stmt->execute();

$user = $stmt->fetch(PDO::FETCH_ASSOC);

echo $user['username'] == $_GET['username'] ? 'Not Available' : 'Available';
```
`register.php`
```php
<?php include_once 'config.php'; ?>
<!doctype html>
<html lang="en">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Registration</title>
<script
        src="https://code.jquery.com/jquery-3.3.1.js"
        integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
        crossorigin="anonymous"></script>
<script src="js/registration_check_email.js"></script>

<form method="post" action="<?= $_SERVER['PHP_SELF']; ?>">
    <label for="username">Username:
    </label>
    <input name="username" type="text" id="username"/>

    <label for="password">Password:</label>
    <input name="password" type="text" id="password"/>

    <input type="submit" value="Submit"/>
</form>
<pre class="errors">
</pre>
</html>
```
