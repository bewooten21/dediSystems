


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
            <div class="center">
                <h2>All Users</h2>
            </div>
            <div class="jumbotron">
                <table class="table table-bordered table-hover table-striped ">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Username</th>
                            <th scope="col">Email</th>
                            <th scope="col">Role</th>


                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $u) : ?>
                            <tr>

                                <td><?php echo $u->getFName() . " " . $u->getLName(); ?></td>
                                <td><?php echo $u->getUsername(); ?></td>
                                <td><?php echo $u->getEmail(); ?></td>
                                <td><?php echo $u->getRole(); ?></td>
                                <td>
                                    <form action="index.php" method="post">
                                        <input type="hidden" name="action" value="editUser">
                                        <input type="hidden" name="id"  value="<?php echo $u->getId(); ?>">
                                        <input type="submit" class="btn btn-primary btn-sml" value="Edit">
                                    </form>
                                </td>

                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>

               
            </div>

        </div>

        <footer class="footer">
            <?php include('./footer.php'); ?>
        </footer>

    </body>
</html>