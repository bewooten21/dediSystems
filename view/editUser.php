<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Add Product</title>
        <?php include ('css/css.php');  ?> 
    </head>
    <body>
        <?php include('nav.php'); ?> 
        <div class="container">
  <h2>Edit <?php echo $user->getFName(). " " . $user->getLName() ; ?></h2>
  <form class="form-horizontal" action="index.php" method='post' enctype="multipart/form-data">
      <input type="hidden" name="action" value="valAdminUpdateUser">
      <input type="hidden" name="id" value="<?php echo $user->getId(); ?>">
    <div class="<?php echo $fnError; ?>">
      <label class="control-label col-sm-4" for="fn">First Name:</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" id="fn" placeholder="Enter first name" name="fn" value="<?php echo htmlspecialchars($user->getFName()); ?>">
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
        <input type="text" class="form-control" id="ln" placeholder="Enter last name" name="ln" value="<?php echo htmlspecialchars($user->getLName()); ?>">
        <span class="<?php echo $lnClass; ?>"></span>
      </div>
      <div class="col-sm-2">
          <p class="error">
              <?php echo $ln_error; ?>
          </p>
      </div>
      
    </div>
      
       <div class="<?php echo $unError; ?>">
      <label class="control-label col-sm-4" for="un">Username:</label>
      <div class="col-sm-4">          
        <input type="text" class="form-control" id="un" placeholder="Enter username" name="un" value="<?php echo htmlspecialchars($user->getUsername()); ?>">
        <span class="<?php echo $unClass; ?>"></span>
      </div>
      <div class="col-sm-2">
          <p class="error">
              <?php echo $un_error; ?>
          </p>
      </div>
      
    </div>
      
      <div class="<?php echo $emailError; ?>">
      <label class="control-label col-sm-4" for="email">Email:</label>
      <div class="col-sm-4">          
        <input type="text" class="form-control" id="email" placeholder="Enter email" name="email" value="<?php echo htmlspecialchars($user->getEmail()); ?>">
        <span class="<?php echo $emailClass; ?>"></span>
      </div>
      <div class="col-sm-2">
          <p class="error">
              <?php echo $email_error; ?>
          </p>
      </div>
      
    </div>
      
      <div class="<?php echo $roleError; ?>">
      <label class="control-label col-sm-4" for="role">Role:</label>
      <div class="col-sm-4">          
        <select id="roleId" name="roleId" >
                                    
                   
                                  <?php foreach ($roles as $r) : ?>
                                    <option value="<?php echo $r['roleId'] ?>"> <?php echo $r['roleName'];?> </option>
                                    <?php endforeach; ?>  
                                    
                                    
                                </select>
        <span class="<?php echo $roleClass; ?>"></span>
      </div>
      <div class="col-sm-2">
          <p class="error">
              <?php echo $role_error; ?>
          </p>
      </div>
      
    </div>
      
      
      
      
      <div class="form-group"> 
    <div class="col-sm-offset-4 col-sm-10">
      <button type="submit" class="btn btn-default">Update User</button>
    </div>
  </div>
      
  </form>



        </div>
      <?php include('./footer.php'); ?>
        
    </body>
</html>