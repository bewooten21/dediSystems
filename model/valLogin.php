<?php



$un = filter_input(INPUT_POST, 'un');
$pw = filter_input(INPUT_POST, 'pw');

$isValid = true;
$un_error = '';
$pw_error = '';


if ($un === "") {
    $un_error = "Username required";
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

if ($isValid === false) {
    include("view/login.php");
    exit();
}else{
    $login= user_db::login($un, $pw);
    if($login===false){
    $un_error = "Incorrect login info";
    $unClass = "glyphicon glyphicon-remove form-control-feedback";
    $unError = "form-group has-error has-feedback";
    $pwClass = "glyphicon glyphicon-remove form-control-feedback";
    $pwError = "form-group has-error has-feedback";
    $isValid = FALSE;
    include("view/login.php");
    }else{
        $user=$login;
        $_SESSION['user'] = $user;
        header("Location: index.php?action=viewAccount");
    }
}
