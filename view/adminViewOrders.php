<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Admin View Orders</title>
        <?php include('css\css.php'); ?> 
    </head>
    <body>
        <?php include ('nav.php'); ?> 
        <br>
        <div class="center">
            <h2>User Orders</h2>
        </div>
        <div class="container" >
            
            <table class="table table-bordered table-hover table-striped ">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">User</th>
                        <th scope="col">OrderId</th>
                        <th scope="col">Total</th>
                        <th scope="col">Status</th>
                        <th scope="col">Rental Date</th>
                        <th scope="col"></th>
                        
                        


                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($orders as $o) : ?>
                        <tr>

                            
                            <td><?php echo $o['username'] ?></td>
                            <td><?php echo $o['orderId'] ?> <a href="index.php?action=viewOrder&amp;id=<?php echo $o['orderId']; ?>"><div class="details"><?php echo"(Details)"; ?></div></a></td>
                            <td><?php echo $o['total'] ?></td>
                            <td><?php echo $o['status'] ?></td>
                            <td><?php echo $o['date'] ?></td>
                            
                            
                            
                             <?php if($o['status']==='Processing'){ ?>
                            <td>
                                <form action="index.php" method="post">
                                    <input type="hidden" name="action" value="processOrder">
                                    <input type="hidden" name="orderId"  value="<?php echo $o['orderId']; ?>">
                                    <input type="submit" class="btn btn-primary" value="Process">
                                </form>
                            </td>
                             <?php } else if($o['status']==='Recieved/Approved') {?>
                            <td>
                                <form action="index.php" method="post">
                                    <input type="hidden" name="action" value="fullfillOrder">
                                    <input type="hidden" name="orderId"  value="<?php echo $o['orderId']; ?>">
                                    <input type="submit" class="btn btn-primary" value="Fullfill">
                                </form>
                            </td>
                             <?php } else {?>
                            <td></td>
                             <?php } ?>
                            <?php  if($o['status']!='CANCELLED') {?>
                            <td>
                                <form action="index.php" method="post">
                                    <input type="hidden" name="action" value="cancelOrderAdmin">
                                    <input type="hidden" name="orderId"  value="<?php echo $o['orderId']; ?>">
                                    <input type="submit" class="btn btn-primary" value="Cancel">
                                </form>
                            </td>
                            <?php } else {?>
                            <td></td>
                             <?php } ?>
                            
                            
                            
                            

                        </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>
            
        </div>
       
        <footer class="footer">
        <?php include('./footer.php'); ?>
        </footer>
    </body>
</html>