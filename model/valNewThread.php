<?php

$subject = filter_input(INPUT_POST, 'subject');
$body = filter_input(INPUT_POST, 'body');

echo $subject . "  ,  " . $body;

$isValid=true;

if($subject===""){
    $s_error = "Subject required";
    $sClass = "glyphicon glyphicon-remove form-control-feedback";
    $sError = "form-group has-error has-feedback";
    $isValid = FALSE;
}else {
    $sClass = "glyphicon glyphicon-ok form-control-feedback";
    $sError = "form-group has-success has-feedback";
}

if($body===""){
    $b_error = "Body required";
    $bClass = "glyphicon glyphicon-remove form-control-feedback";
    $bError = "form-group has-error has-feedback";
    $isValid = FALSE;
}else {
    $bClass = "glyphicon glyphicon-ok form-control-feedback";
    $bError = "form-group has-success has-feedback";
}

if ($isValid === false) {
    include("view/createThread.php");
    exit();
}




