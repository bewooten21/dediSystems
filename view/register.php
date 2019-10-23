<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        
        <title></title>
        <?php include ('css/css.php'); ?> 
    </head>
    <body>
        <?php include('nav.php') ?>
<div class="container">
  <h2>Register</h2>
  <form class="form-horizontal" action="index.php" method='post'>
      <input type="hidden" name="action" value="valRegister">
    <div class="<?php echo $emailError; ?>">
      <label class="control-label col-sm-4" for="email">Email:</label>
      <div class="col-sm-4">
        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="<?php echo htmlspecialchars($email); ?>" >
        <span class="<?php echo $emailClass; ?>"></span>
      </div>
      <div class="col-sm-2">
          <p class="error">
              <?php echo $email_error; ?>
          </p>
      </div>
    </div>
 
      
     
      <div class="<?php echo $unError; ?>">
      <label class="control-label col-sm-4" for="un">Username:</label>
      <div class="col-sm-4">          
        <input type="text" class="form-control" id="un" placeholder="Enter username" name="un" value="<?php echo htmlspecialchars($un); ?>" >
        <span class="<?php echo $unClass; ?>"></span>
      </div>
      <div class="col-sm-2">
          <p class="error">
              <?php echo $un_error; ?>
          </p>
      </div>
    </div>
    <div class="<?php echo $pwError; ?>">
      <label class="control-label col-sm-4" for="pw">Password:</label>
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
        <input type="password" class="form-control" id="cpw" placeholder="Confirm password" name="cpw" value="<?php echo htmlspecialchars($cpw); ?>" >
        <span class="<?php echo $cpwClass; ?>"></span>
      </div>
      <div class="col-sm-2">
          <p class="error">
              <?php echo $cpw_error; ?>
          </p>
      </div>
    </div>
       <div class="<?php echo $fnError; ?>">
      <label class="control-label col-sm-4" for="fn">First Name:</label>
      <div class="col-sm-4">          
        <input type="text" class="form-control" id="fn" placeholder="Enter first name" name="fn" value="<?php echo htmlspecialchars($fn); ?>" >
        <span class="<?php echo $fnClass; ?>"></span>
      </div>
      <div class="col-sm-2">
          <p class="error">
              <?php echo $fn_error; ?>
          </p>
      </div>
    </div>
      <div class="<?php echo $lnError; ?>">
      <label class="control-label col-sm-4" for="ln">Last Name:</label>
      <div class="col-sm-4">          
        <input type="text" class="form-control" id="ln" placeholder="Enter last name" name="ln" value="<?php echo htmlspecialchars($ln); ?>" >
        <span class="<?php echo $lnClass; ?>"></span>
      </div>
      <div class="col-sm-2">
          <p class="error">
              <?php echo $ln_error; ?>
          </p>
      </div>
    </div>
      
      
    
    <div class="form-group">        
      <div class="col-sm-offset-4 col-sm-10">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </form>
</div>
<?php include('footer.php'); ?>
</body>
</html>
 
