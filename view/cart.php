



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
            <h2>Your Cart</h2>
            <div class="jumbotron">

                <?php if (isset($_SESSION['cart']) && $subtotal != 0) { ?>
                    <?php foreach ($_SESSION['cart'] as $c) : ?>
                        <a class="btn btn-primary btn-sml" href="index.php?action=shop" role="button">Back To Shop</a>
                        <br>
                        <br>
                        <div class="thumbnail" id="product">

                            <img class="resize"  src='<?php echo $c['image']; ?>' >
                            <ul style="list-style-type:none;">

                                <li><p><b><?php echo $c['name']; ?></b></p></li>
                                <li><p id="fontSize"><?php echo $c['desc']; ?></p></li>
                                <li><p id="fontSize">$<?php echo $c['price'] . " x " . $c['qty'] . "= $" . number_format(($c['price'] * $c['qty']), 2); ?></p></li>
                                <li><p id="fontSize"><?php echo $c['desc']; ?></p></li>
                                <li>
                                    <form action="index.php" method="post">
                                        <input type="hidden" name="action" value="updateItemInCart">
                                        <input type="hidden" name="id" value="<?php echo $c['id']; ?>">
                                        <input type="submit" class="btn btn-primary btn-sml" value="Update">
                                        <select name="quantity">

                                            <?php for ($i = 0; $i <= $c['invQty']; $i++) { ?>
                                                <option value="<?php echo $i ?>"><?php echo $i ?></option>

                                            <?php } ?>
                                        </select>

                                    </form>
                                </li>

                            </ul>

                            <br>



                        </div>
                    <?php endforeach; ?>
                    <p><?php echo "Order Total: $" . $subtotal; ?></p> 
                    <br>
                    <p class="error"><b><?php echo $dateMessage ?></b></p>
                    <form action="index.php" method="post">
                        <input type="hidden" name="action" value="submitOrder">
                        Rental Date:
                        <input type="date" name="rentalDate" min="<?php echo $date; ?>"><br>
                        <br>

                        <input type="submit" class="btn btn-primary btn-sml" value="Place Order">
                    </form>


                <?php } else { ?>
                    <?php echo "Your cart is empty"; ?><br>
                    <br><a class="btn btn-primary btn-lg" href="index.php?action=shop" role="button">Shop</a>
                <?php } ?>









            </div>

        </div>

        <footer class="footer">
            <?php include('./footer.php'); ?>
        </footer>

    </body>
</html>