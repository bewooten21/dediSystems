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
        
        <div class="container" >
            
            <table class="table table-bordered table-hover table-striped ">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">User</th>
                        <th scope="col">OrderId</th>
                        <th scope="col">Total</th>
                        


                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($orders as $o) : ?>
                        <tr>

                            
                            <td><?php echo $o['username'] ?></td>
                            <td><?php echo $o['orderId'] ?> <a href="index.php?action=viewOrder&amp;id=<?php echo $o['orderId']; ?>"><div class="details"><?php echo"(Details)"; ?></div></a></td>
                            <td><?php echo $o['total'] ?></td>
                            
                            
                             
                            <td>
                                <form action="index.php" method="post">
                                    <input type="hidden" name="action" value="deleteThread">
                                    <input type="hidden" name="threadId"  value="<?php echo $o['orderId']; ?>">
                                    <input type="submit" value="Delete">
                                </form>
                            </td>
                            <td>
                                <form action="index.php" method="post">
                                    <input type="hidden" name="action" value="deleteThread">
                                    <input type="hidden" name="threadId"  value="<?php echo $o['orderId']; ?>">
                                    <input type="submit" value="Delete">
                                </form>
                            </td>
                            <td>
                                <form action="index.php" method="post">
                                    <input type="hidden" name="action" value="deleteThread">
                                    <input type="hidden" name="threadId"  value="<?php echo $o['orderId']; ?>">
                                    <input type="submit" value="Delete">
                                </form>
                            </td>
                            
                            

                        </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>
            
        </div>
       
        <?php include('footer.php'); ?>
    </body>
</html>