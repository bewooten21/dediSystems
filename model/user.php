<?php

class user {
    private $id, $fName, $lName, $username, $email, $password, $role;
    
    public function __construct($id, $fName, $lName, $username, $email, $password, $role) {
        $this->id = $id;
        $this->fName = $fName;
        $this->lName = $lName;
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->role=$role;
        
    }
    
    function getRole() {
        return $this->role;
    }

    function setRole($role) {
        $this->role = $role;
    }

        public function getId() {
        return $this->id;
    }
 
    public function getFName() {
        return $this->fName;
    }

    public function getLName() {
        return $this->lName;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getEmail() {
        return $this->email;
    }
    
    public function getPassword() {
        return $this->password;
    }

    

       
  
    
    public function setId($id) {
        $this->id = $id;
    }
    
    public function setFName($fName) {
        $this->fName = $fName;
    }

    public function setLName($lName) {
        $this->lName = $lName;
    }

    public function setUsername($username) {
        $this->username = $username;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setPassword($password) {
        $this->password = $password;
    }
}


