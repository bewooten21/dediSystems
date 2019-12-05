<?php

require_once('database.php');

class order_db {
    
    public static function addOrder($orderId, $userId, $total){
        
       
        $db = Database::getDB();
        $query = 'INSERT INTO orders
                 (orderId, userId, total)
              VALUES
                 (:orderId, :userId, :total)';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':orderId', $orderId);
            $statement->bindValue(':userId', $userId);
            $statement->bindValue(':total', $total);

           
            $statement->execute();
            $statement->closeCursor();

            // Get the last order ID that was automatically generated
            $orderId = $db->lastInsertId();
            return $orderId;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            display_db_error($error_message);
        }
    }
    
    public static function getOrderById($orderId){
        $db = Database::getDB();
        $query = 'SELECT * from orders
                  WHERE orderId= :orderId';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':orderId', $orderId);
            $statement->execute();
            $order = $statement->fetch();
            $statement->closeCursor();

          
            return $order;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            display_db_error($error_message);
        }
        
    }
    
    public static function addOrderDetails($orderItemId, $orderId, $prodId, $quantity){
        
        $db = Database::getDB();
        $query = 'INSERT INTO orderdetails
                 (orderItemId, orderId, prodId, quantity)
              VALUES
                 (:orderItemId, :orderId, :prodId, :quantity)';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':orderItemId', $orderItemId);
            $statement->bindValue(':orderId', $orderId);
            $statement->bindValue(':prodId', $prodId);
            $statement->bindValue(':quantity', $quantity);

           
            $statement->execute();
            $statement->closeCursor();

            
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            display_db_error($error_message);
        }
        
    }
    
    public static function getUserOrders($userId){
        $db = Database::getDB();
        
        $query= 'SELECT * from orderdetails JOIN
                  orders ON orderdetails.orderId = orders.orderId JOIN
                  user ON orders.userId = user.userId
                  WHERE orders.userId = :userId
                  
                 ';
        
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':userId', $userId);
            $statement->execute();
            $orders = $statement->fetchAll();
            $statement->closeCursor();

          
            return $orders;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            display_db_error($error_message);
        }
    }
    
    public static function getAllOrders(){
        $db = Database::getDB();
        
        $query= 'SELECT * from orderdetails JOIN
                  orders ON orderdetails.orderId = orders.orderId JOIN
                  user ON orders.userId = user.userId
                  GROUP BY orders.userId
                  
                 ';
        
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':userId', $userId);
            $statement->execute();
            $orders = $statement->fetchAll();
            $statement->closeCursor();

          
            return $orders;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            display_db_error($error_message);
        }
    }
        
    
    
    
}

