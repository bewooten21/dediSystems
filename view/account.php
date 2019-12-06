<!DOCTYPE html>
<html lang="en">
<head>
  <title>DeDiSystems</title>
  <?php include ('css/css.php'); ?> 
</head>
<body>
    <?php include('nav.php') ?>
    
    
  <div class="container">
      <div class="center">
            <h2>My Account</h2>
            </div>
      <div class="jumbotron" id="white">
      <div class="sidebarUsers"> 
          <ul style="list-style: none;">
              <li><a href='index.php?action=resetPw'>Change Password</a></li>
              <li><a href='index.php?action=accountInfo'>Account Info</a></li>
              
          </ul>
      </div>
      
    <h2><?php echo " ".$_SESSION['user']->getfName(). " " .$_SESSION['user']->getlName() ; ?></h2>
    <p>
      <?php echo $message ?>
    </p>
    <br />
    <p>
      <a class="btn btn-primary btn-lg" href="index.php?action=accountInfo" role="button">Account Info</a>
      <a class="btn btn-primary btn-lg" href="index.php?action=viewOrders" role="button">Orders</a>
    </p>
  </div>
  </div>

        
    <?php include('footer.php'); ?>
    </body>
</html>
