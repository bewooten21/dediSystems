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
        <br>
        <div class="center">
            
            <h2>My Orders</h2>
            </div>
        
        <div class="container" >
        
            <?php if ($orders !=false){ ?>
            <table class="table table-bordered table-hover table-striped ">
                <thead class="thead-dark">
                    <tr>
                        
                        <th scope="col">OrderId</th>
                        <th scope="col">Total</th>
                        <th scope="col">Status</th>
                        <th scope="col">Rental Date</th>
                        <th scope="col"></th>
                        


                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($orders as $o) : ?>
                        <a href="index.php?action=viewOrder&amp;id=<?php echo $o['orderId']; ?>">
                            <tr >

                            
                            
                            <td><?php echo $o['orderId'] ?> <a href="index.php?action=viewOrder&amp;id=<?php echo $o['orderId']; ?>"><div class="details"><?php echo"(Details)"; ?></div></a></td>
                            <td><?php echo "$".$o['total'];?></td>
                            <td><?php echo $o['status'];?></td>
                             <td><?php echo $o['date'];?></td>
                            
                            
                        <?php  if($o['status']!='CANCELLED' && $o['status']!='Ready for Pickup') {?>
                            <td>
                                <form action="index.php" method="post">
                                    <input type="hidden" name="action" value="cancelOrderAdmin">
                                    <input type="hidden" name="orderId"  value="<?php echo $o['orderId']; ?>">
                                    <input type="submit" class="btn btn-primary btn-sml" value="Cancel">
                                </form>
                            </td>
                        <?php } else  {?>
                            
                            <td></td>
                        <?php } ?>
                            
                            

                        </tr>
                        </a>
                    <?php endforeach; ?>

                </tbody>
            </table>
            
           <?php } else {?>
            
            <?php echo $message; ?><br>
            <br><a class="btn btn-primary btn-lg" href="index.php?action=shop" role="button">Shop</a>
            <?php } ?>
            
            
            
            
       </div>
        </div>
       
        <?php include('footer.php'); ?>
    </body>
</html>