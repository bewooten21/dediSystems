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
        <div class="container" id="white">
            <h3><th colspan="4"><?php echo $thread->getSubject(); ?></th></h3>
            <table class="table table-bordered" >
  <thead class="thead-dark" >

    
  </thead>
  <tbody>
      <?php foreach ($posts as $p) : ?>
    <tr>

      <td id='postTop'><?php echo $p->getAuthor(). "    " . $p->getTime(); ?></td>

    </tr>
    <tr>
        <td id='border'><?php echo $p->getBody() ; ?></td>
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
    <?php endforeach; ?>
  
  </tbody>
</table>
        
        <form action="index.php" method="post">
            <input type="hidden" name="action" value="valPost">
            <input type="hidden" name="threadId" value="<?php echo $thread->getId() ; ?>">
        <textarea id="body" name="body" rows="7" style="width:100%;  resize: none" placeholder="<?php echo $postError ?>"></textarea>
        <button type="submit" class="btn btn-default">Submit</button>
        </form>
        </div>
        <br>
        <?php include('footer.php'); ?>
    </body>
</html>
