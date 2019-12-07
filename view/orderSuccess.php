
<!DOCTYPE html>
<html lang="en">
<head>
  <title>DeDiSystems</title>
  <?php include ('css/css.php'); ?> 
</head>
<body>
    <?php include('nav.php') ?>
    <br>
    
    <div class="jumbotron" id="white">
  <div class="container" id="account">
      
 <h2>Order # <?php echo $orderId ;?> Has Been Placed. Thank you <?php echo $_SESSION['user']->getFName() . " ". $_SESSION['user']->getLName() ; ?></h2>
       
       
 
</div>
    </div>
        
    <?php include('footer.php'); ?>
    </body>
</html>

