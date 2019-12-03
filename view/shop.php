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
      <td><select name="quantity">
                            
                            <?php
                            for ($i = 1; $i <= $p->getQuantity(); $i++) {
                                ?>
                                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php
                            }
                            ?>
                        </select></td>
      <td><img height="100" width="100" src='<?php echo $p->getImage() ; ?>'> </td>
      <td><form action="index.php" method="post">
                                        <input type="hidden" name="action" value="addToCart">
                                        <input type="hidden" name="id"  value="<?php echo $p->getId(); ?>">


                                        <input type="submit" value="Add To Cart">
                                    </form></td>
      
    </tr>
    <?php endforeach; ?>
  
  </tbody>
</table>


            </div>
            
        </div>

        <?php include('./footer.php'); ?>

    </body>
</html>
