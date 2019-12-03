<?php

require('post.php');
require_once('database.php');

class post_db {

    public static function add_post($postId, $threadId, $author, $body) {


        $db = Database::getDB();
        $query = 'INSERT INTO post(postId, threadId,author, body)
            VALUES(:postId, :threadId,:author,:body)';

        $statement = $db->prepare($query);
        $statement->bindValue(':postId', $postId);
        $statement->bindValue(':threadId', $threadId);
        $statement->bindValue(':author', $author);

        $statement->bindValue(':body', $body);

        $statement->execute();
        $statement->closeCursor();
    }

    public static function get_posts_by_threadId($id) {

        $db = Database::getDB();

        $query = 'SELECT * from post
                  WHERE threadId = :id
                 ';

        $statement = $db->prepare($query);
        $statement->bindValue(':id', $id);
        $statement->execute();
        $rows = $statement->fetchAll();
        $posts = [];

        foreach ($rows as $value) {
            $posts[$value['postId']] = new post($value['postId'], $value['threadId'], $value['body'], $value['author'], $value['time']);
        }
        $statement->closeCursor();

        return $posts;
    }
    
    public static function deletePost($id){
        
        $db = Database::getDB();

        $query = 'DELETE from post
                  WHERE postId = :id ';

        $statement = $db->prepare($query);
        $statement->bindValue(':id', $id);

        $statement->execute();
        $statement->closeCursor();
        
    }
    
    public static function deletePosts($id){
        $db = Database::getDB();

        $query = 'DELETE from post
                  WHERE threadId = :id ';

        $statement = $db->prepare($query);
        $statement->bindValue(':id', $id);

        $statement->execute();
        $statement->closeCursor();
    }

}
