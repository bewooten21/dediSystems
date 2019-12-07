<?php

$id = filter_input(INPUT_POST, 'id');
$un = filter_input(INPUT_POST, 'un');
$fn = filter_input(INPUT_POST, 'fn');
$ln = filter_input(INPUT_POST, 'ln');
$email=filter_input(INPUT_POST, 'email');
$roleId=filter_input(INPUT_POST, 'roleId');
$user= user_db::get_user_by_id($id);

$isValid = true;

$email_error = '';
$un_error = '';
$role_error='';
$fn_error = '';
$ln_error = '';
$emailVal = user_db::check_email($email);
$unVal = user_db::check_username($un);

if($email===$user->getEmail()){
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

if($un===$user->getUsername()){
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
}
else if(preg_match('/^.{4,25}$/',$un)===0){
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
}else if(preg_match('/^.{1,30}$/',$fn)===0){
    $fn_error ="Must be 30 characters or less";
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
} else if(preg_match('/^.{1,30}$/',$ln)===0){
    $ln_error ="Must be 30 characters or less";
    $lnClass = "glyphicon glyphicon-remove form-control-feedback";
    $lnError = "form-group has-error has-feedback";
    $isValid = FALSE;
}else {
    $lnClass = "glyphicon glyphicon-ok form-control-feedback";
    $lnError = "form-group has-success has-feedback";
}

if($roleId===""){
    $role_error = "Role required";
    $roleClass = "glyphicon glyphicon-remove form-control-feedback";
    $roleError = "form-group has-error has-feedback";
    $isValid = FALSE;
}else{
    $roleClass = "glyphicon glyphicon-ok form-control-feedback";
    $roleError = "form-group has-success has-feedback";
}




if ($isValid === false) {
    $roles = role_db::getAll();
    $user= user_db::get_user_by_id($id);
    include("view/editUser.php");
    exit();
} else if ($isValid === true) {
    user_db::adminUpdate_user($id, $fn, $ln, $un, $email, $roleId);
    $user= user_db::get_user_by_id($id);
    $_SESSION['user']=$user;
    $message=$user->getFName(). " " . $user->getLName(). " updated!";
    header("Location: index.php?action=viewUsers");
   
}
