<?php
require('user.php');
require_once('database.php');

class user_db {

    public static function select_all() {
        $db = Database::getDB();

        $query = 'SELECT * FROM user JOIN roles
                  ON user.roleId = roles.roleId';
        $statement = $db->prepare($query);
        $statement->execute();
        $rows = $statement->fetchAll();
        $users = [];

        foreach ($rows as $value) {
            $users[$value['userId']] = new user($value['userId'], $value['fName'], $value['lName'], $value['username'],  $value['email'],$value['password'],$value['roleName']);
            
        }
        $statement->closeCursor();

        return $users;
    }

    public static function get_user_by_id($id) {
        $db = Database::getDB();
        $query = 'SELECT *
              FROM user JOIN roles ON
              user.roleId = roles.roleId
              WHERE user.userId= :id';

        $statement = $db->prepare($query);
        $statement->bindValue(':id', $id);
        $statement->execute();
        $row = $statement->fetch();
        
            $un = $row['username'];
            $hashed_pw = $row['password'];
            $email=$row['email'];
            $fName=$row['fName'];
            $lName=$row['lName'];
            $role=$row['roleName'];
        
        $user= new user($id, $fName, $lName, $un,$email, $hashed_pw,$role );
        
        $statement->closeCursor();

        return $user;
    }

    public static function get_user_by_username($un) {
        $db = Database::getDB();
        $query = 'SELECT *
              FROM user
              WHERE username= :un';

        $statement = $db->prepare($query);
        $statement->bindValue(':un', $un);
        $statement->execute();
        $row = $statement->fetch();

        $id = $row['userId'];
        $un = $row['username'];
            $hashed_pw = $row['password'];
            $email=$row['email'];
            $fName=$row['fName'];
            $lName=$row['lName'];
            $roleId=$row['roleId'];
        
        $user= new user($id, $fName, $lName, $un,$email, $hashed_pw,$roleId );
        $statement->closeCursor();
        
        return $user;
    }

   
    
    public static function add_user($userId, $un, $pw, $email, $fn, $ln, $roleId) {
        
        $db = Database::getDB();
        $query = 'INSERT INTO user(userId,username,password,email,fName,lName,roleId)
            VALUES(:userId,:username,:password,:email,:fName,:lName,:roleId)';
        
            $statement = $db->prepare($query);
            $statement->bindValue(':userId', $userId);
            $statement->bindValue(':username', $un);
            $statement->bindValue(':password', $pw);
            $statement->bindValue(':email', $email);
            $statement->bindValue(':fName', $fn);
            $statement->bindValue(':lName', $ln);
            $statement->bindValue(':roleId', $roleId);
            
            
           
            $statement->execute();
            $statement->closeCursor();
             
    }
    

    public static function update_user($id, $fName, $lName, $un, $email) {
        
        $db = Database::getDB();
        $query = $query = 'UPDATE user
              SET fName = :fName,
                  lName = :lName,
                  username = :un,
                  email = :email
                  
                 
                WHERE userId = :id';
        
            $statement = $db->prepare($query);
            $statement->bindValue(':fName', $fName);
            $statement->bindValue(':lName', $lName);
            $statement->bindValue(':un', $un);
            $statement->bindValue(':email', $email);
            $statement->bindValue(':id', $id);
            $statement->execute();
            $statement->closeCursor();
            
        
    }
     public static function adminUpdate_user($id, $fName, $lName, $un, $email, $roleId) {
        
        $db = Database::getDB();
        $query = $query = 'UPDATE user
              SET fName = :fName,
                  lName = :lName,
                  username = :un,
                  email = :email,
                  roleId= :roleId
                  
                 
                WHERE userId = :id';
        
            $statement = $db->prepare($query);
            $statement->bindValue(':fName', $fName);
            $statement->bindValue(':lName', $lName);
            $statement->bindValue(':un', $un);
            $statement->bindValue(':email', $email);
            $statement->bindValue(':id', $id);
            $statement->bindValue(':roleId', $roleId);
             $statement->execute();
            $statement->closeCursor();
            
        
    }

    public static function delete_by_ID($id) {
        $db = Database::getDB();
        $query = 'DELETE from user WHERE id= :id';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':id', $id);
            $row_count = $statement->execute();
            $statement->closeCursor();
            return $row_count;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            display_db_error($error_message);
        }
    }
    
    public static function validate_user_login($uName) {
        $db = Database::getDB();
        $query = 'SELECT *
              FROM user
              WHERE userName= :uName';

        $statement = $db->prepare($query);
        $statement->bindValue(':uName', $uName);
        $statement->execute();
        $value = $statement->fetch();
        
        $theUser = new user($value['id'], $value['firstName'], $value['lastName'], $value['userName'], $value['password'], $value['level']);

        $statement->closeCursor();

        return $theUser;
    }
    
    public static function reset_pw($userId,$pw){
        $db= Database::getDB();
        
        $query= 'Update user
               set password= :pw
               WHERE userId= :userId';
        
        $statement = $db->prepare($query);
        $statement->bindValue('userId', $userId);
        $statement->bindValue('pw', $pw);
        $statement->execute();
        $statement->closeCursor();
        
    }
    
     public static function check_username($username) {
        $db = Database::getDB();

        $query = 'SELECT * from user WHERE username= :username';
        $statement = $db->prepare($query);
        $statement->bindValue(':username', $username);

        $error = $statement->execute();
        //if query returns a row then username exists
        if ($statement->rowCount() > 0) {
            return false;
        } else {
            return true;
        }
        $statement->closeCursor();
    }
    
    public static function check_email($email) {
        $db = Database::getDB();

        $query = 'SELECT * from user WHERE email= :email';
        $statement = $db->prepare($query);
        $statement->bindValue(':email', $email);

        $statement->execute();
        //if query returns a row then email exists
        if ($statement->rowCount() > 0) {
            return false;
        } else {
            return true;
        }
        $statement->closeCursor();
    }
    
     public static function login($username, $password) {
        $db = Database::getDB();

        $query = 'SELECT * FROM user JOIN roles
                 ON user.roleId = roles.roleId
                 WHERE user.username= :username';
        $statement = $db->prepare($query);
        $statement->bindValue(':username', $username);
        //$statement->bindValue(':password', $password);
        //$error = $statement->execute();

        $statement->execute();
        if ($statement->rowCount() === 1) {
            $row = $statement->fetch();
            $id=$row['userId'];
            $un = $row['username'];
            $hashed_pw = $row['password'];
            $email=$row['email'];
            $fName=$row['fName'];
            $lName=$row['lName'];
            $role=$row['roleName'];
            if (password_verify($password, $hashed_pw)) {
                $user= new user($id, $fName, $lName, $un,$email, $hashed_pw,$role );
                return $user;
            } else {
                return false;
            }
        } else {

            return false;
        }
    }
}

