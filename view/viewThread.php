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
        <?php include ('nav.php'); ?> <br>
        <div class="container" id='white'>


            <h3><?php echo $thread->getSubject(); ?></h3>
            <?php if ($posts != false) { ?>

<table class="table " >
                <?php foreach ($posts as $p) : ?>
                    
                        <tr>

                            <td><p class="over" id='postTop'><?php echo $p->getAuthor() . "    " . $p->getTime(); ?></p></td>

                        </tr>
                        <tr>
                                    <td><p class="over" id="border"><?php echo $p->getBody(); ?></p></td>

                        </tr>

                        <tr>
                            <?php if (isset($_SESSION['user'])) { ?>
                                <?php if ($_SESSION['user']->getRole() === "admin" || $_SESSION['user']->getRole() === "owner") { ?>
                                    <td>
                                        <form action="index.php" method="post">
                                            <input type="hidden" name="action" value="deletePost">
                                            <input type="hidden" name="postId"  value="<?php echo $p->getId(); ?>">
                                            <input type="hidden" name="threadId"  value="<?php echo $thread->getId(); ?>">
                                            <input type="submit" value="Delete">
                                        </form>
                                    </td>
                                <?php } ?>
                            <?php } ?>
                        </tr>





                    </table>
                <?php endforeach; ?>
            <?php } ?>

            <br>
            <form action="index.php" method="post">
                <input type="hidden" name="action" value="valPost">
                <input type="hidden" name="threadId" value="<?php echo $thread->getId(); ?>">
                <textarea id="body" name="body" rows="7" style="width:100%;  resize: none" placeholder="<?php echo $postError ?>"></textarea>
                <button type="submit" class="btn btn-default">Submit</button><br>
            </form>
            <br>
        </div>





        <br>
        <footer class="footer">
            <?php include('./footer.php'); ?>
        </footer>
    </body>
</html>
