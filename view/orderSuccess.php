
<!DOCTYPE html>
<html lang="en">
<head>
  <title>DeDiSystems</title>
  <?php include ('css/css.php'); ?> 
</head>
<body>
    <?php include('nav.php') ?>
    <br>
    <div class="container" id="account">
    <div class="jumbotron" id="white">
  
      
 <h2>Order # <?php echo $orderId ;?> Has Been Placed. Thank you <?php echo $_SESSION['user']->getFName() . " ". $_SESSION['user']->getLName() ; ?></h2>
 <a class="btn btn-primary btn-sml" role="button" href="index.php?action=viewOrder&amp;id=<?php echo $orderId; ?>">View Order Details</a>
       
       
 
</div>
    </div>
        
    <footer class="footer">
        <?php include('./footer.php'); ?>
        </footer>
    </body>
</html>

