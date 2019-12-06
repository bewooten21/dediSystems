



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
            <h2>Shop</h2>
            <div class="jumbotron">
               
                  
                    <?php foreach ($_SESSION['cart'] as $c) : ?>
                        
                            
                            <div class="thumbnail" id="product">
                                 <img class="resize"  src='<?php echo $c['image']; ?>' >
                                 <ul style="list-style-type:none;">
                                     
                                     <li><p><b><?php echo $c['name']; ?></b></p></li>
                                     <li><p id="fontSize"><?php echo $c['desc']; ?></p></li>
                                     <li><p id="fontSize"><?php echo $c['price']. " x " . $c['qty']. "= $" . number_format(($c['price'] * $c['qty']),2); ?></p></li>
                                     <li><p id="fontSize"><?php echo $c['desc']; ?></p></li>
                                     <li><a class="btn btn-primary btn-sml" href="index.php?action=Update" role="button">Update</a></li>
                                     <p></p>
                                     <li><a class="btn btn-primary btn-sml" href="index.php?action=Remove" role="button">Remove</a></li>
                                     
                                     
                                 </ul>
                                 
                                
                            </div>
                    <?php endforeach; ?>
                          <p><?php echo "Order Total: $". $_SESSION['cart']['total']; ?></p>  
                        
                        
               



            </div>

        </div>

<?php include('./footer.php'); ?>

    </body>
</html>