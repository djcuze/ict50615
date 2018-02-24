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