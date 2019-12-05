

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>DeDiSystems</title>
        <?php include('css\css.php'); ?> 
    </head>
    <body>
        <?php include ('nav.php'); ?> 
        <h2>Your Cart</h2>
        <div class="container" id="shop">
            
            <?php foreach ($_SESSION['cart'] as $c) : ?>
        <table>
                            <tr>

                                <td><?php echo $c['name']; ?></td>
                                <td><?php echo $c['desc']; ?></td>
                                <td><?php echo $c['qty']; ?></td>
                                <td><?php echo $c['price']; ?></td>
                                <td><?php echo $c['total']; ?></td>
                                <td>
                                <form action="index.php" method="post">
                                        <input type="hidden" name="action" value="submitOrder">
                                        <input type="submit" value="Update">
                                    </form>
                                </td>
                                <td>
                                <form action="index.php" method="post">
                                        <input type="hidden" name="action" value="submitOrder">
                                        <input type="submit" value="Delete">
                                    </form>
                                </td>

                               
                            </tr>
                        <?php endforeach; ?>
                            <tr>
                                <td>
                                <form action="index.php" method="post">
                                        <input type="hidden" name="action" value="submitOrder">
                                        <input type="submit" value="Place Order">
                                    </form>
                                </td>
                            </tr>
        </table>
        <h3><?php echo $subtotal ?></h3>
            
        </div>
       
        <?php include('footer.php'); ?>
    </body>
</html>