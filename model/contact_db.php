<?php

require_once('database.php');

class contact_db {

    public static function addMessage($id, $email, $message) {

        $db = Database::getDB();

        $query = 'INSERT INTO feedback(feedbackId, email, message)
            VALUES(:id, :email,:message)';

        $statement = $db->prepare($query);
        $statement->bindValue(':id', $id);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':message', $message);

        $statement->execute();
        $statement->closeCursor();
    }
    
    public static function getAll(){
        $db = Database::getDB();
        
        $query = 'SELECT * from feedback
                 ';

        $statement = $db->prepare($query);
        $statement->execute();
        $messages = $statement->fetchAll();
        $statement->closeCursor();
        return $messages;
    }
    
    public static function delete($id){
        $db = Database::getDB();

        $query = 'DELETE from feedback
                  WHERE feedbackId = :id ';

        $statement = $db->prepare($query);
        $statement->bindValue(':id', $id);

        $statement->execute();
        $statement->closeCursor();
        
    }

}
