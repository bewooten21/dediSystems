<?php
require('thread.php');
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
    
    public static function get_threads(){
        
        $db = Database::getDB();

        $queryUsers = 'SELECT * FROM thread';
        $statement = $db->prepare($queryUsers);
        $statement->execute();
        $rows = $statement->fetchAll();
        $threads = [];

        foreach ($rows as $value) {
            $threads[$value['threadId']]= new thread($value['threadId'], $value['author'], $value['time'], $value['subject'], $value['body'], $value['numPosts']);
        }
        $statement->closeCursor();

        return $threads;
        
    }
    
    public static function get_last_postbyId(){
        
         $db = Database::getDB();
         
         $query= 'select threadId from thread where 
                 threadId =(SELECT LAST_INSERT_ID())';
         
         $statement = $db->prepare($query);
         
         $statement->execute();
         $id = $statement->fetch();
         $statement->closeCursor();
         
         return $id['threadId'];
        
    }
    
    public static function get_thread_byId($id){
        
        $db = Database::getDB();
        
        $query = 'SELECT * from thread 
                  WHERE threadId = :id  
                 ';
                
        $statement = $db->prepare($query);
        $statement->bindValue(':id', $id);
         $statement->execute();
         $row= $statement->fetch();
         $statement->closeCursor();
         
         $thread= new thread($row['threadId'], $row['author'], $row['time'], $row['subject'], $row['body'], $row['numPosts']);
         return $thread;
    }
    
    
    
}

