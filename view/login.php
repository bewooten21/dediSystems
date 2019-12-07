<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <?php include ('css/css.php'); ?> 
    </head>
    <body>
        <?php include('nav.php'); ?> 
        <div class="container">
            <div class="center">
                <h2>Login</h2>
            </div>
            <div class="jumbotron">
                <form class="form-horizontal" action="index.php" method='post'>
                    <input type="hidden" name="action" value="valLogin">
                    <div class="<?php echo $unError; ?>">
                        <label class="control-label col-sm-4" for="un">Username:</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="un" placeholder="Enter username" name="un" value="<?php echo htmlspecialchars($un); ?>">
                            <span class="<?php echo $unClass; ?>"></span>
                        </div>
                        <div class="col-sm-2">
                            <p class="error">
                                <?php echo $un_error; ?>
                            </p>
                        </div>
                    </div>
                    <div class="<?php echo $pwError; ?>">
                        <label class="control-label col-sm-4" for="pwd">Password:</label>
                        <div class="col-sm-4">          
                            <input type="password" class="form-control" id="pw" placeholder="Enter password" name="pw" value="<?php echo htmlspecialchars($pw); ?>">
                            <span class="<?php echo $pwClass; ?>"></span>
                        </div>
                        <div class="col-sm-2">
                            <p class="error">
                                <?php echo $pw_error; ?>
                            </p>
                        </div>

                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4" ></label>
                        <div class="col-sm-4">          
                            <a href='index.php?action=register'>Don't have an account? Register here</a>
                        </div>
                    </div>



                        <div class="form-group">        
                            <div class="col-sm-offset-4 col-sm-10">
                                <br><button type="submit" class="btn btn-primary">Login</button>
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
