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

          </ul>
      </div>
      <h1>Reset Password</h1>
    <h2><?php echo " ".$_SESSION['user']->getfName(). " " .$_SESSION['user']->getlName() ; ?></h2>
    <form class="form-horizontal" action="index.php" method='post'>
      <input type="hidden" name="action" value="valResetPw">
    
    <div class="<?php echo $pwError; ?>">
      <label class="control-label col-sm-4" for="pw">New Password:</label>
      <div class="col-sm-4">          
        <input type="password" class="form-control" id="pw" placeholder="Enter password" name="pw" value="<?php echo htmlspecialchars($pw); ?>" >
        <span class="<?php echo $pwClass; ?>"></span>
      </div>
      <div class="col-sm-2">
          <p class="error">
              <?php echo $pw_error; ?>
          </p>
      </div>
    </div>
      <div class="<?php echo $cpwError; ?>">
      <label class="control-label col-sm-4" for="pw">Confirm password:</label>
      <div class="col-sm-4">          
        <input type="password" class="form-control" id="cpw" placeholder="Confirm password" name="cpw" value="<?php echo htmlspecialchars($p); ?>" >
        <span class="<?php echo $cpwClass; ?>"></span>
      </div>
      <div class="col-sm-2">
          <p class="error">
              <?php echo $cpw_error; ?>
          </p>
      </div>
    </div>


      
      
    
    <div class="form-group">        
      <div class="col-sm-offset-4 col-sm-10">
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
    </div>
  
 
  </div>
</div>
        </div>
    <?php include('footer.php'); ?>
    </body>
</html>

