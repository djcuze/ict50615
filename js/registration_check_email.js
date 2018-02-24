$(document).ready(function ($) {
    function registrationCheckEmail() {
        var directory = 'registration_check_email.php?username=' + $(this).val();
        $('.errors').load(directory);
    }
    $('#username').on("change", registrationCheckEmail);
});
