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
            <div class="jumbotron" id="white">
                <table class="table table-bordered table-hover  ">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Price</th>
      <th scope="col">Description</th>
      <th scope="col">Quantity</th>
      <th scope="col">Image</th>
      
      
      
    </tr>
  </thead>
  <tbody>
      <?php foreach ($products as $p) : ?>
    <tr>

      <td><?php echo $p->getName(); ?></td>
      <td><?php echo $p->getPrice() ; ?></td>
      <td><?php echo $p->getDesc() ; ?></td>
      <td><?php echo $p->getQuantity() ; ?></td>
      <td><img height="100" width="100" src='<?php echo $p->getImage() ; ?>'> </td>
      
    </tr>
    <?php endforeach; ?>
  
  </tbody>
</table>


            </div>
            
        </div>

        <?php include('./footer.php'); ?>

    </body>
</html>
