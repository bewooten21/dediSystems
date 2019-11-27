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

        $query = 'SELECT * FROM thread
                        ORDER by lastPost DESC' ;
        $statement = $db->prepare($query);
        $statement->execute();
        $rows = $statement->fetchAll();
        $threads = [];

        foreach ($rows as $value) {
            $threads[$value['threadId']]= new thread($value['threadId'], $value['author'], $value['lastPost'], $value['subject'], $value['body'], $value['numPosts']);
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
    
    public static function getLastPost($threadId){
        $db = Database::getDB();
         
         $query= 'select time from post where 
                 threadId = :threadId
                 ORDER by time desc
                 LIMIT 1';
         
         $statement = $db->prepare($query);
         $statement->bindValue(':threadId', $threadId);
         $statement->execute();
         $id = $statement->fetch();
         $statement->closeCursor();
         $time=$id['time'];
         return $time;
        
    }
    
    public static function setLastPost($threadId, $lastPost){
        $db = Database::getDB();
        
        $query = 'UPDATE thread
                  SET lastPost = :lastPost
                  WHERE threadId = :threadId';
        
        $statement = $db->prepare($query);
        
        $statement->bindValue(':threadId', $threadId);
        $statement->bindValue(':lastPost', $lastPost);
        $statement->execute();
        $statement->closeCursor();
        
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
    
    public static function setPostCount($threadId, $postCount){
        
        $db = Database::getDB();
        
        $query = 'UPDATE thread
                  SET numPosts = :postCount
                  WHERE threadId = :threadId
                  ';
        
        $statement = $db->prepare($query);
        $statement->bindValue(':threadId', $threadId);
        $statement->bindValue(':postCount', $postCount);
         $statement->execute();
         
         $statement->closeCursor();
    }
    
    public static function getPostCount($threadId){
        
        $db = Database::getDB();
        
        $query = 'SELECT count(*)
                  FROM post
                  where threadId = :threadId';
        
        $statement = $db->prepare($query);
        $statement->bindValue(':threadId', $threadId);
         $statement->execute();
         $count= $statement->fetch();
         
         $statement->closeCursor();
        $count= $count['count(*)'];
         return $count;
    }
    
    
    
}

