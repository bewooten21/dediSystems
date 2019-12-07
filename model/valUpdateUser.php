<?php

$email = filter_input(INPUT_POST, 'email');
$un = filter_input(INPUT_POST, 'un');

$fn = filter_input(INPUT_POST, 'fn');
$ln = filter_input(INPUT_POST, 'ln');

$isValid = true;

$email_error = '';
$un_error = '';

$fn_error = '';
$ln_error = '';
$emailVal = user_db::check_email($email);
$unVal = user_db::check_username($un);

if($email===$_SESSION['user']->getEmail()){
    $emailError = 'form-group has-success has-feedback';
    $emailClass = "glyphicon glyphicon-ok form-control-feedback";
}else if($emailVal === false){
    $email_error = "Email assocaited with account";
    $emailError = 'form-group has-error has-feedback';
    $emailClass = "glyphicon glyphicon-remove form-control-feedback";
    $isValid = FALSE;
}else if($email === ""){
    $email_error = "Email required";
    $emailError = 'form-group has-error has-feedback';
    $emailClass = "glyphicon glyphicon-remove form-control-feedback";
    $isValid = FALSE;
}else if(preg_match('(^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$)',$email)===0){
    $email_error="Please enter a valid email address";
    $emailError = 'form-group has-error has-feedback';
    $emailClass = "glyphicon glyphicon-remove form-control-feedback";
    $isValid = FALSE;
}else if(preg_match('/^.{1,40}$/',$email)===0){
    $email_error='Must be 40 characters or less';
    $emailError = 'form-group has-error has-feedback';
    $emailClass = "glyphicon glyphicon-remove form-control-feedback";
    $isValid = FALSE;
}else{
    $emailError = 'form-group has-success has-feedback';
    $emailClass = "glyphicon glyphicon-ok form-control-feedback";
}

if($un===$_SESSION['user']->getUsername()){
    $unClass = "glyphicon glyphicon-ok form-control-feedback";
    $unError = "form-group has-success has-feedback";
}else if($unVal===false){
    $un_error = "Username taken";
    $unClass = "glyphicon glyphicon-remove form-control-feedback";
    $unError = "form-group has-error has-feedback";
    $isValid = FALSE;
}else if($un === ""){
    $un_error = "Username required";
    $unClass = "glyphicon glyphicon-remove form-control-feedback";
    $unError = "form-group has-error has-feedback";
    $isValid = FALSE;
}else if(preg_match('/^[A-Za-z_-][A-Za-z0-9_-]*$/',$un)===0){
    $un_error='Username must begin with a letter';
    $unClass = "glyphicon glyphicon-remove form-control-feedback";
    $unError = "form-group has-error has-feedback";
    $isValid = FALSE;
}else if(preg_match('/^.{4,25}$/',$un)===0){
    $un_error='Username must be between 4 and 25 characters';
    $unClass = "glyphicon glyphicon-remove form-control-feedback";
    $unError = "form-group has-error has-feedback";
    $isValid = FALSE;
}else{
    $unClass = "glyphicon glyphicon-ok form-control-feedback";
    $unError = "form-group has-success has-feedback";
}





if ($fn === "") {
    $fn_error = "First name required";
    $fnClass = "glyphicon glyphicon-remove form-control-feedback";
    $fnError = "form-group has-error has-feedback";
    $isValid = FALSE;
} else if(preg_match('/^.{1,30}$/',$fn)===0){
    $fn_error ="Must be 30 characters or less";
    $fnClass = "glyphicon glyphicon-remove form-control-feedback";
    $fnError = "form-group has-error has-feedback";
    $isValid = FALSE;
}else {
    $fnClass = "glyphicon glyphicon-ok form-control-feedback";
    $fnError = "form-group has-success has-feedback";
}

if ($ln === "") {
    $ln_error = "Last name required";
    $lnClass = "glyphicon glyphicon-remove form-control-feedback";
    $lnError = "form-group has-error has-feedback";
    $isValid = FALSE;
}else if(preg_match('/^.{1,30}$/',$ln)===0){
    $ln_error ="Must be 30 characters or less";
    $lnClass = "glyphicon glyphicon-remove form-control-feedback";
    $lnError = "form-group has-error has-feedback";
    $isValid = FALSE;
} else {
    $lnClass = "glyphicon glyphicon-ok form-control-feedback";
    $lnError = "form-group has-success has-feedback";
}





if ($isValid === false) {
    include("view/accountInfo.php");
    exit();
} else if ($isValid === true) {
    user_db::update_user($_SESSION['user']->getId(), $fn, $ln, $un, $email);
    $user=user_db::get_user_by_id($_SESSION['user']->getId());
    $_SESSION['user']=$user;
    $message="Account info updated!";
   include('view/account.php');
}
