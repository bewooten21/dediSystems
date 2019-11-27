<?php

require('product.php');
require_once('database.php');

class product_db {

    public static function addProduct($prodId, $price, $image, $prodDesc, $prodName, $q) {
        $db = Database::getDB();

        $query = 'INSERT into product(prodId, price, image, prodDesc, prodName, quantity)
                    VALUES(:prodId, :price, :image, :prodDesc, :prodName, :q)';

        $statement = $db->prepare($query);
        $statement->bindValue(':prodId', $prodId);
        $statement->bindValue(':price', $price);
        $statement->bindValue(':image', $image);
        $statement->bindValue(':prodDesc', $prodDesc);
        $statement->bindValue(':prodName', $prodName);
        $statement->bindValue(':q', $q);

        $statement->execute();
        $statement->closeCursor();
    }

    public static function getLastProduct_byId() {

        $db = Database::getDB();

        $query = 'select prodId from product where 
                 prodId =(SELECT LAST_INSERT_ID())';

        $statement = $db->prepare($query);
        $statement->execute();
        $id = $statement->fetch();
        $statement->closeCursor();

        return $id['prodId'];
    }
    
    public static function updateImage($prodId, $image){
        
        $db = Database::getDB();
        
        $query = 'UPDATE product
                  SET image = :image 
                  WHERE prodId =:prodId';
        
        $statement = $db->prepare($query);
        $statement->bindValue(':prodId', $prodId);
        $statement->bindValue(':image', $image);
        
        $statement->execute();
        $statement->closeCursor();
    }

    
    public static function getAllProducts(){
        
        $db = Database::getDB();
        
        $query = 'SELECT * from product';
        
        $statement = $db->prepare($query);
        $statement->execute();
        $rows = $statement->fetchAll();
        $products = [];
        
        foreach($rows as $value){
            $products[$value['prodId']]= new product($value['prodId'], $value['price'],$value['image'], $value['prodDesc'], $value['prodName'],$value['quantity']);
        }
        $statement->closeCursor();
        return $products;
    }
    
    public static function getProduct_byId($id){
        $db = Database::getDB();
        
        $query = 'SELECT * from product
                  WHERE prodId = :id ';
        
        $statement = $db->prepare($query);
        $statement->bindValue(':id', $id);
        $statement->execute();
        $row = $statement->fetch();
        $product= new product($row['prodId'],$row['price'],$row['image'],$row['prodDesc'],$row['prodName'],$row['quantity']);
        
        $statement->closeCursor();
        return $product;
    }
    
    public static function updateProduct($prodId, $price, $image, $prodDesc, $prodName, $quantity){
        
        $db = Database::getDB();
        
        $query = 'UPDATE product
                  SET price = :price,
                  image = :image,
                  prodDesc = :prodDesc,
                  prodName = :prodName,
                  quantity = :quantity
                  WHERE prodId = :prodId';
        
        $statement = $db->prepare($query);
        $statement->bindValue(':prodId', $prodId);
        $statement->bindValue(':price', $price);
        $statement->bindValue(':image', $image);
        $statement->bindValue(':prodDesc', $prodDesc);
        $statement->bindValue(':prodName', $prodName);
        $statement->bindValue(':quantity', $quantity);

        $statement->execute();
        $statement->closeCursor();
        
    }
}
