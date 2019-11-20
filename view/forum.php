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
        <div class="container">
            <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Subject</th>
      <th scope="col">Author</th>
      <th scope="col">Posts</th>
      <th scope="col">Time</th>
      
      
    </tr>
  </thead>
  <tbody>
      <?php foreach ($threads as $t) : ?>
    <tr>

      <td><?php echo $t->getSubject(); ?></td>
      <td><?php echo $t->getAuthor() ; ?></td>
      <td><?php echo $t->getPosts() ; ?></td>
      <td><?php echo $t->getTime() ; ?></td>

    </tr>
    <?php endforeach; ?>
  
  </tbody>
</table>
        <a href='index.php?action=newThread'>New Thread</a>
        </div>
        <?php include('footer.php'); ?>
    </body>
</html>
