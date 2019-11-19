<?php
require_once('database.php');

class thread_db{
    
    public static function add_thread($threadId, $author, $subject, $body) {
        $i=1;
        
        $db = Database::getDB();
        $query = 'INSERT INTO thread(threadId,author,subject,body,numPosts)
            VALUES(:threadId,:author,:subject,:body,:i)';
        
            $statement = $db->prepare($query);
            $statement->bindValue(':threadId', $threadId);
            $statement->bindValue(':author', $author);
            $statement->bindValue(':subject', $subject);
            $statement->bindValue(':body', $body);
            $statement->bindValue(':i', $i);
           
            
            
           
            $statement->execute();
            $statement->closeCursor();
             
    }
}

