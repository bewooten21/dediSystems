<?php

class thread {
    private $id, $author, $time, $subject, $body, $posts;
    
    public function __construct($id, $author, $time, $subject, $body, $posts) {
        $this->id = $id;
        $this->author = $author;
        $this->time = $time;
        $this->subject = $subject;
        $this->body = $body;
        $this->posts = $posts;
        
        
    }

    function getId() {
        return $this->id;
    }

    function getAuthor() {
        return $this->author;
    }

    function getTime() {
        return $this->time;
    }

    function getSubject() {
        return $this->subject;
    }

    function getBody() {
        return $this->body;
    }

    function getPosts() {
        return $this->posts;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setAuthor($author) {
        $this->author = $author;
    }

    function setTime($time) {
        $this->time = $time;
    }

    function setSubject($subject) {
        $this->subject = $subject;
    }

    function setBody($body) {
        $this->body = $body;
    }

    function setPosts($posts) {
        $this->posts = $posts;
    }
}