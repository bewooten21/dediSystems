<?php

$pw = filter_input(INPUT_POST, 'pw');
$cpw = filter_input(INPUT_POST, 'cpw');
$isValid = true;

$pw_error = '';
$cpw_error = '';
$p="";
if ($pw === "") {
    $pw_error = "Password required";
    $pwClass = "glyphicon glyphicon-remove form-control-feedback";
    $pwError = "form-group has-error has-feedback";
    $isValid = FALSE;
} else if(preg_match('/^.{8,20}$/',$pw)===0){
    $pw_error ="Must be 8-20 characters";
    $pwClass = "glyphicon glyphicon-remove form-control-feedback";
    $pwError = "form-group has-error has-feedback";
    $isValid = FALSE;
} else if(preg_match('(.*[A-Z].*)',$pw)===0){
    $pw_error='Must contain at least one capital letter';
    $pwClass = "glyphicon glyphicon-remove form-control-feedback";
    $pwError = "form-group has-error has-feedback";
    $isValid = FALSE;
} else if(preg_match('(.*[a-z].*)',$pw)===0){
    $pw_error='Must contain at least one lower case letter';
    $pwClass = "glyphicon glyphicon-remove form-control-feedback";
    $pwError = "form-group has-error has-feedback";
    $isValid = FALSE;
}else {
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

if ($isValid === false) {
    include("view/resetPw.php");
    exit();
}else if($isValid===true){
    $options = ['cost' => 11];
    $hashedPw = password_hash($pw, PASSWORD_BCRYPT, $options);
    
    user_db::reset_pw($_SESSION['user']->getId() , $hashedPw);
    $message="Password changed";
    include('view/account.php');
    
}

