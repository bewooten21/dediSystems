<?php


$email = filter_input(INPUT_POST, 'email');
$un = filter_input(INPUT_POST, 'un');
$pw = filter_input(INPUT_POST, 'pw');
$cpw = filter_input(INPUT_POST, 'cpw');
$fn = filter_input(INPUT_POST, 'fn');
$ln = filter_input(INPUT_POST, 'ln');

$isValid = true;


$email_error = '';
$un_error = '';
$pw_error = '';
$cpw_error = '';
$fn_error = '';
$ln_error = '';
$emailVal = user_db::check_email($email);
$unVal = user_db::check_username($un);
if ($email === "") {
    $email_error = "Email required";
    $emailError = 'form-group has-error has-feedback';
    $emailClass = "glyphicon glyphicon-remove form-control-feedback";
    $isValid = FALSE;
} else if ($emailVal === false) {
    $email_error = "Email assocaited with account";
    $emailError = 'form-group has-error has-feedback';
    $emailClass = "glyphicon glyphicon-remove form-control-feedback";
    $isValid = FALSE;
} else {
    $emailError = 'form-group has-success has-feedback';
    $emailClass = "glyphicon glyphicon-ok form-control-feedback";
}


if ($un === "") {
    $un_error = "Username required";
    $unClass = "glyphicon glyphicon-remove form-control-feedback";
    $unError = "form-group has-error has-feedback";
    $isValid = FALSE;
} else if ($unVal === false) {
    $un_error = "Username taken";
    $unClass = "glyphicon glyphicon-remove form-control-feedback";
    $unError = "form-group has-error has-feedback";
    $isValid = FALSE;
} else {
    $unClass = "glyphicon glyphicon-ok form-control-feedback";
    $unError = "form-group has-success has-feedback";
}


if ($pw === "") {
    $pw_error = "Password required";
    $pwClass = "glyphicon glyphicon-remove form-control-feedback";
    $pwError = "form-group has-error has-feedback";
    $isValid = FALSE;
} else {
    $pwClass = "glyphicon glyphicon-ok form-control-feedback";
    $pwError = "form-group has-success has-feedback";
}

if ($cpw === "") {
    $cpw_error = "Confirm password";
    $cpwClass = "glyphicon glyphicon-remove form-control-feedback";
    $cpwError = "form-group has-error has-feedback";
    $isValid = FALSE;
} else {
    $cpwClass = "glyphicon glyphicon-ok form-control-feedback";
    $cpwError = "form-group has-success has-feedback";
}

if ($cpw != $pw) {
    $cpw_error = "Passwords do not match";
    $cpwClass = "glyphicon glyphicon-remove form-control-feedback";
    $cpwError = "form-group has-error has-feedback";
    $isValid = FALSE;
}

if ($fn === "") {
    $fn_error = "First name required";
    $fnClass = "glyphicon glyphicon-remove form-control-feedback";
    $fnError = "form-group has-error has-feedback";
    $isValid = FALSE;
} else {
    $fnClass = "glyphicon glyphicon-ok form-control-feedback";
    $fnError = "form-group has-success has-feedback";
}

if ($ln === "") {
    $ln_error = "Last name required";
    $lnClass = "glyphicon glyphicon-remove form-control-feedback";
    $lnError = "form-group has-error has-feedback";
    $isValid = FALSE;
} else {
    $lnClass = "glyphicon glyphicon-ok form-control-feedback";
    $lnError = "form-group has-success has-feedback";
}





if ($isValid === false) {
    include("view/register.php");
    exit();
} else if ($isValid === true) {
    $options = ['cost' => 11];
    $hashedPw = password_hash($pw, PASSWORD_BCRYPT, $options);

    user_db::add_user('', $un, $hashedPw, $email, $fn, $ln, 1);

    $_SESSION['username'] = $un;
    include('view/home.php');
}
        



