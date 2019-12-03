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

}
