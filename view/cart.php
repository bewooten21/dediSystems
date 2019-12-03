<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
        <?php foreach ($_SESSION['cart'] as $c) : ?>
        <table>
                            <tr>

                                <td><?php echo $c['name']; ?></td>
                                <td><?php echo $c['desc']; ?></td>
                                <td><?php echo $c['qty']; ?></td>
                                <td><?php echo $c['price']; ?></td>
                                <td><?php echo $c['total']; ?></td>
                                
                                
                                
                                
                                
                               
                            </tr>
                        <?php endforeach; ?>
        </table>
        <h3><?php echo $subtotal ?></h3>
    </body>
</html>
