<?php

require_once('database.php');

class role_db{
    
    public static function getAll(){
        $db = Database::getDB();
        
        $query = 'SELECT * from roles';
        
        $statement = $db->prepare($query);
         
         $statement->execute();
         $roles= $statement->fetch();
         $statement->closeCursor();
         
         return $roles;
    }
}

