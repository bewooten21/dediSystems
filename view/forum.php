<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>DeDiSystems Forum</title>
        <?php include('css\css.php'); ?> 
    </head>
    <body>
        <?php include ('nav.php'); ?> 
        <br>
        <div class="center" >
            <h2>DediSystems Forum</h2>
        </div>
        <div class="container" id="bottom">




            <table class="table table-bordered table-hover table-striped ">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Subject</th>
                        <th scope="col">Author</th>
                        <th scope="col">Posts</th>
                        <th scope="col">Last Post</th>


                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($threads as $t) : ?>
                        <tr>

                            <td><a href="index.php?action=viewThread&amp;id=<?php echo $t->getId(); ?>"><?php echo $t->getSubject(); ?></td>
                            <td><?php echo $t->getAuthor(); ?></td>
                            <td><?php echo $t->getPosts(); ?></td>
                            <td><?php echo $t->getTime(); ?></td>
                            <?php if (isset($_SESSION['user'])) { ?>
                                <?php if ($_SESSION['user']->getRole() === "admin" || $_SESSION['user']->getRole() === "owner") { ?>
                                    <td>
                                        <form action="index.php" method="post">
                                            <input type="hidden" name="action" value="deleteThread">
                                            <input type="hidden" name="threadId"  value="<?php echo $t->getId(); ?>">
                                            <input type="submit" value="Delete">
                                        </form>
                                    </td>
                                <?php } ?>
                            <?php } ?>


                        </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>
            <?php if (isset($_SESSION['user'])) { ?>
                <a class="btn btn-primary btn-sml" href="index.php?action=newThread" role="button">New Thread</a>

            <?php } ?>

        </div>

        <br>
        <footer class="footer">
            <?php include('./footer.php'); ?>
        </footer>
    </body>

</html>
