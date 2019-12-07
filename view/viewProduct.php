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
            <h2>Product Details</h2>
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
                                <li>
                                    <p id="fontSize"> <select name="quantity">
                                    <?php if (isset($_SESSION['cart'], $_SESSION['cart'][$product->getId()])) { ?>
                                        <?php for ($i = 1; $i <= (((int) $product->getQuantity()) - ((int) $_SESSION['cart'][(int) $product->getId()]['qty'])); $i++) { ?>
                                            <option value="<?php echo $i ?>"><?php echo $i ?></option>

                                        <?php } ?>
                                    <?php } ?>


                                    <?php if (empty($_SESSION['cart']) || isset($_SESSION['cart'][$product->getId()]) === false) { ?>
                                        <?php for ($i = 1; $i <= $product->getQuantity(); $i++) { ?>

                                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                            <?php
                                        }
                                        ?>
                                    <?php } ?>
                                </select></p>
                                </li>
                                <li><input type="submit" class="btn btn-primary btn-sml" value="Add To Cart"></li>
                            </ul>
                            
                            
                            </form><br>
                            
                        </div>

                        <br><a class="btn btn-primary btn-sml" href="index.php?action=shop" role="button">Back To Shop</a>

                </div>



            </div>

        </div>

        <footer class="footer">
            <?php include('./footer.php'); ?>
        </footer>

    </body>
</html>
