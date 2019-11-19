<!DOCTYPE html>
<html lang="en">
<head>
  <title>DeDiSystems</title>
  <?php include ('css/css.php'); ?> 
</head>
<body>
    <?php include('nav.php') ?>
    
    <div class="jumbotron" id="white">
  <div class="container">
      <div class="sidebarUsers"> 
          <ul style="list-style: none;">
              <li><a href='index.php?action=viewOrders'>Orders</a></li>
              <li><a href='index.php?action=accountInfo'>Account Info</a></li>
              <li>ssssssssssss</li>
          </ul>
      </div>
      <h1>Account</h1>
    <h2><?php echo " ".$_SESSION['user']->getfName(). " " .$_SESSION['user']->getlName() ; ?></h2>
    <p>
      <?php echo $message ?>
    </p>
    <br />
    <p>
      <a class="btn btn-primary btn-lg" href="#" role="button">Download Free Trial »</a>
      <a class="btn btn-primary btn-lg" href="#" role="button">Learn more »</a>
    </p>
  </div>
</div>
        </div>
    <?php include('footer.php'); ?>
    </body>
</html>
