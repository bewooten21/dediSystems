<?php

require_once('database.php');

class order_db {
    
    public static function addOrder($orderId, $userId, $total,$status, $date){
        
       
        $db = Database::getDB();
        $query = 'INSERT INTO orders
                 (orderId, userId, total, status, date)
              VALUES
                 (:orderId, :userId, :total, :status, :date)';
        
            $statement = $db->prepare($query);
            $statement->bindValue(':orderId', $orderId);
            $statement->bindValue(':userId', $userId);
            $statement->bindValue(':total', $total);
            $statement->bindValue(':status', $status);
            $statement->bindValue(':date', $date);

           
            $statement->execute();
            $statement->closeCursor();

            // Get the last order ID that was automatically generated
            $orderId = $db->lastInsertId();
            return $orderId;
         
        
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
                  GROUP BY orderdetails.orderId
                  ORDER BY orders.date ASC
                 ';
        
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':userId', $userId);
            $statement->execute();
            $orders = $statement->fetchAll();
            $statement->closeCursor();

          if($statement ->rowCount() > 0){
              return $orders;
          }else{
              return false;
          }
            
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
                  GROUP BY orderdetails.orderId
                  ORDER BY orders.date ASC
                  
                 ';
        
        try {
            $statement = $db->prepare($query);
            
            $statement->execute();
            $orders = $statement->fetchAll();
            $statement->closeCursor();

          
            return $orders;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            display_db_error($error_message);
        }
    }
    
    public static function getOrderDetailsByOrderId($orderId){
        
        $db = Database::getDB();
        
        $query= 'SELECT * from orderdetails JOIN
                 product ON orderdetails.prodId = product.prodId
                  WHERE orderId= :orderId
                  
                 ';
        
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':orderId', $orderId);
            $statement->execute();
            $orderDetails = $statement->fetchAll();
            $statement->closeCursor();

          
            return $orderDetails;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            display_db_error($error_message);
        }
        
    }
    
    public static function updateOrderStatus($orderId, $status){
        $db = Database::getDB();
        $query = $query = 'UPDATE orders
              SET status = :status
                   
                WHERE orderId = :orderId';
        
            $statement = $db->prepare($query);
            $statement->bindValue(':status', $status);
            $statement->bindValue(':orderId', $orderId);
            $statement->execute();
            $statement->closeCursor();
    }
    

    
    public static function cancelOrder($orderId, $status){
        $db = Database::getDB();

        $query = 'UPDATE orders
                  SET status = :status,
                  date = "CANCELLED"
                  WHERE orderId = :orderId ';

        $statement = $db->prepare($query);
        $statement->bindValue(':orderId', $orderId);
        $statement->bindValue(':status', $status);

        $statement->execute();
        $statement->closeCursor();
    }
    
    public static function checkDate($date){
        
        $db = Database::getDB();

        $query = 'SELECT date from orders WHERE date= :date';
        $statement = $db->prepare($query);
        $statement->bindValue(':date', $date);

        $statement->execute();
        //if query returns a row then username exists
        if ($statement->rowCount() > 0) {
            return false;
        } else {
            return true;
        }
        $statement->closeCursor();
    }
        
  
    
}

