<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>New Thread</title>
        <?php include ('css/css.php');  ?> 
    </head>
    <body>
        <?php include('nav.php'); ?> 
        <div class="container">
            <h2>New Thread</h2>
            <div class="jumbotron">
  
<form class="form-horizontal" action="index.php" method="post">
    <input type="hidden" name="action" value="valNewThread">
  <div class="<?php echo $sError; ?>">
    <label class="control-label col-sm-2" for="subject">Subject:</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" id="subject" name="subject" placeholder="Enter subject" value="<?php echo htmlspecialchars($subject); ?>">
      <span class="<?php echo $sClass; ?>"></span>
    </div>
    <div class="col-sm-2">
          <p class="error">
              <?php echo $s_error; ?>
          </p>
      </div>
  </div>
  <div class="<?php echo $bError; ?>">
    <label class="control-label col-sm-2" for="body">Body:</label>
    <div class="col-sm-6"> 
    <textarea class="form-control" id="body" name="body" rows="15" style="width:100%;  resize: none" placeholder="Enter body"><?php echo htmlspecialchars($body); ?></textarea>
    <span class="<?php echo $bClass; ?>"></span>
    </div>
    <div class="col-sm-2">
          <p class="error">
              <?php echo $b_error; ?>
          </p>
      </div>
  </div>
  
  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Submit</button>
    </div>
  </div>
        
</form>
  </div>
        </div>
             <footer class="footer">
        <?php include('./footer.php'); ?>
        </footer>
        
    </body>
</html>
