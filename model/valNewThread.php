<?php
require_once 'model/thread_db.php';
require_once 'model/post_db.php';
$subject = filter_input(INPUT_POST, 'subject');
$body = filter_input(INPUT_POST, 'body');



$isValid=true;

if($subject===""){
    $s_error = "Subject required";
    $sClass = "glyphicon glyphicon-remove form-control-feedback";
    $sError = "form-group has-error has-feedback";
    $isValid = FALSE;
}else {
    $sClass = "glyphicon glyphicon-ok form-control-feedback";
    $sError = "form-group has-success has-feedback";
    $s_error = "";
}

if($body===""){
    $b_error = "Body required";
    $bClass = "glyphicon glyphicon-remove form-control-feedback";
    $bError = "form-group has-error has-feedback";
    $isValid = FALSE;
}else {
    $bClass = "glyphicon glyphicon-ok form-control-feedback";
    $bError = "form-group has-success has-feedback";
    $s_error = "";
}

if ($isValid === false) {
    include("view/createThread.php");
    exit();
}else{
    thread_db::add_thread('', $_SESSION['user']->getUsername(), $subject, $body);
    
    $threadId= thread_db::get_last_postbyId();
    
    post_db::add_post('', $threadId, $_SESSION['user']->getUsername(), $body);
    $postCount= thread_db::getPostCount($threadId);
    thread_db::setPostCount($threadId, $postCount);
    $lastPost=thread_db::getLastPost($threadId);
    thread_db::setLastPost($threadId, $lastPost);
    
    header("Location: index.php?action=forum");
    
}




