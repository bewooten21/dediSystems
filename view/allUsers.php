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
            <h2>Shop</h2>
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

      <td><?php echo $u->getFName(). " " .$u->getLName() ; ?></td>
      <td><?php echo $u->getUsername() ; ?></td>
      <td><?php echo $u->getEmail() ; ?></td>
      <td><?php echo $u->getRole() ; ?></td>
      <td>
          <form action="index.php" method="post">
                  <input type="hidden" name="action" value="editUser">
                  <input type="hidden" name="id"  value="<?php echo $u->getId(); ?>">
                  <input type="submit" value="Edit">
              </form>
      </td>
      
    </tr>
    <?php endforeach; ?>
  
  </tbody>
</table>


            </div>
            <a href="index.php?action=addProduct">Add Product</a>
        </div>

        <?php include('./footer.php'); ?>

    </body>
</html>