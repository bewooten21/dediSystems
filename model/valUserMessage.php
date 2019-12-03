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
} else {
    $emailClass = "glyphicon glyphicon-ok form-control-feedback";
    $emailError = "form-group has-success has-feedback";
}

if ($message === "") {
    $isValid = false;
    $m_error = "Message required";
    $mClass = "glyphicon glyphicon-remove form-control-feedback";
    $mError = "form-group has-error has-feedback";
} else {
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

