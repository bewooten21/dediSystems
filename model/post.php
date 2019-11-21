<?php

class post {
    private $id, $threadId, $body, $author, $time;
    
    public function __construct($id,$threadId, $body,$author, $time) {
        $this->id = $id;
        $this->author = $author;
        $this->time = $time;
        $this->threadId = $threadId;
        $this->body = $body;
        
    }
    function getId() {
        return $this->id;
    }

    function getThreadId() {
        return $this->threadId;
    }

    function getBody() {
        return $this->body;
    }

    function getAuthor() {
        return $this->author;
    }

    function getTime() {
        return $this->time;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setThreadId($threadId) {
        $this->threadId = $threadId;
    }

    function setBody($body) {
        $this->body = $body;
    }

    function setAuthor($author) {
        $this->author = $author;
    }

    function setTime($time) {
        $this->time = $time;
    }


}
