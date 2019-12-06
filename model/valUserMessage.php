<?php

$email = filter_input(INPUT_POST, 'email');
$message = filter_input(INPUT_POST, 'message');

$success="";
$email_error = "";
$m_error = "";
$isValid = true;

if ($email === "") {
    $isValid = false;
    $email_error = "Email required";
    $emailClass = "glyphicon glyphicon-remove form-control-feedback";
    $emailError = "form-group has-error has-feedback";
}else if(preg_match('(^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$)',$email)===0){
    $email_error="Please enter a valid email address";
    $emailError = 'form-group has-error has-feedback';
    $emailClass = "glyphicon glyphicon-remove form-control-feedback";
    $isValid = FALSE;
} else {
    $emailClass = "glyphicon glyphicon-ok form-control-feedback";
    $emailError = "form-group has-success has-feedback";
}

if ($message === "") {
    $isValid = false;
    $m_error = "Message required";
    $mClass = "glyphicon glyphicon-remove form-control-feedback";
    $mError = "form-group has-error has-feedback";
} else if(preg_match('/^.{1,4000}$/',$message)===0){
    $m_error='Message must be between 1 and 4000 characters';
    $mClass = "glyphicon glyphicon-remove form-control-feedback";
    $mError = "form-group has-error has-feedback";
    $isValid = FALSE;
}else {
    $mClass = "glyphicon glyphicon-ok form-control-feedback";
    $mError = "form-group has-success has-feedback";
}

if ($isValid === false) {
    include("view/contact.php");
    exit();
} else {
    $success = "Message Sent. Thanks for your feedback!";
    $mClass = "";
    $mError = "form-group";
    $m_error = "";
    $emailClass = "";
    $emailError = "form-group";
    $email_error = "";
    contact_db::addMessage('', $email, $message);
    $message = "";
    $email = "";
    include("view/contact.php");
}

