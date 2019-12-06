<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->


<html>
    <head>
        <meta charset="UTF-8">
        
        
        <title>User Comments</title>
        <?php include ('css/css.php'); ?> 
    </head>
    <body>
        <?php include('nav.php'); ?> 
        <div class="container">
            <h2>User Messages</h2>
            <div class="jumbotron">
                <table class="table table-bordered table-hover table-striped ">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Email</th>
                            <th scope="col">Message</th>
                            <th scope="col">Time</th>
                            


                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($comments as $c) : ?>
                            <tr>

                                <td><?php echo $c['email']; ?></td>
                                <td><?php echo $c['message']; ?></td>
                                <td><?php echo $c['time']; ?></td>
                                
                                
                                <td>
                                    <form action="index.php" method="post">
                                        <input type="hidden" name="action" value="deleteMessage">
                                        <input type="hidden" name="id"  value="<?php echo $c['feedbackId']; ?>">


                                        <input type="submit" value="Delete">
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>


            </div>
            
        </div>

        <?php include('./footer.php'); ?>

    </body>
</html>
