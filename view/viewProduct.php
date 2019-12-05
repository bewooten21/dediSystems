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
                <div class="row">
                  
                    <form action="index.php" method="post">
                            <input type="hidden" name="action" value="addToCart">
                            <input type="hidden" name="id"  value="<?php echo $product->getId(); ?>">
                        
                            
                            <div class="thumbnail" id="product">
                                 <img class="resize"  src='<?php echo $product->getImage(); ?>' >
                                 <ul style="list-style-type:none;">
                                     
                                     <li><p><b><?php echo $product->getName(); ?></b></p></li>
                                     <li><p id="fontSize">$<?php echo $product->getPrice(); ?></p></li>
                                     <li><p id="fontSize"><?php echo $product->getDesc(); ?></p></li>
                                 </ul>
                               
                                <a href='index.php?action=shop'>Back To Shop</a>
                            </div>
                            
                        
                        
                </div>



            </div>

        </div>

<?php include('./footer.php'); ?>

    </body>
</html>
