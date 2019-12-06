

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Shop</title>
        <?php include ('css/css.php'); ?> 
    </head>
    <body>
        <?php include('nav.php'); ?> 
        <div class="container">
            <h2><?php echo "Order #". $order['orderId']; ?></h2>
            <div class="jumbotron">
               
                  
                    <?php foreach ($orderDetails as $o) : ?>
                        
                            
                            <div class="thumbnail" id="product">
                                 <img class="resize"  src='<?php echo $o['image']; ?>' >
                                 <ul style="list-style-type:none;">
                                     
                                     <li><p><b><?php echo $o['prodName']; ?></b></p></li>
                                     <li><p id="fontSize"><?php echo $o['prodName']; ?></p></li>
                                     <li><p id="fontSize"><?php echo $o[3]. " x " . $o['price']. "= $" . number_format(($o[3] * $o['price']),2); ?></p></li>
                                     
                                     
                                 </ul>
                                 
                                
                            </div>
                    <?php endforeach; ?>
                          <p><?php echo "Order Total: $". $order['total']; ?></p>  
                          <p><?php echo "Rental Date: ". $order['date']; ?></p>  
                          <?php  if($order['status']!='CANCELLED' && $order['status']!='Ready for Pickup') {?>
                            
                                <form action="index.php" method="post">
                                    <input type="hidden" name="action" value="cancelOrderAdmin">
                                    <input type="hidden" name="orderId"  value="<?php echo $o['orderId']; ?>">
                                    <input type="submit" value="Cancel">
                                </form>
                            
                        <?php } ?>
                        
                        
               



            </div>

        </div>

<?php include('./footer.php'); ?>

    </body>
</html>

