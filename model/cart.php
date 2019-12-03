<?php

if(empty($_SESSION['cart'])){
    $_SESSION['cart']= array();
}

$price=$product->getPrice();
$total=$price*$qty;
$item= array(
    'name' => $product->getName(),
    'price' =>$product->getPrice(),
    'desc' => $product->getDesc(),
    'id' =>$product->getId(),
    'qty' =>$qty,
    'total' =>$total
       
);

if(isset($_SESSION['cart'][$id])){
      $_SESSION['cart'][$id]['qty']= ((int)$_SESSION['cart'][$id]['qty'])+$qty;
      $_SESSION['cart'][$id]['total']=$_SESSION['cart'][$id]['total'] +$total;
  }else{
      $_SESSION['cart'][$id]=$item;
  }
  
  
  header("Location: index.php?action=shop");
  
 
