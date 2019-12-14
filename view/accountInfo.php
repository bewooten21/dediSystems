<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Account Info</title>
        <?php include ('css/css.php'); ?> 
    </head>
    <body>
        <?php include('nav.php') ?>

        <div class="container">
            <div class="center">
                <h2>Account Info</h2>
            </div>
            <div class="jumbotron" id="white">

                <div class="center">
                    <h2><?php echo " " . $_SESSION['user']->getfName() . " " . $_SESSION['user']->getlName(); ?></h2>
                </div>
                <form class="form-horizontal" action="index.php" method='post'>
                    <input type="hidden" name="action" value="valUpdateUser">

                    <div class="<?php echo $emailError; ?>" >
                        <label class="control-label col-sm-4"  for="email">Email:</label>
                        <div class="col-sm-4">
                            <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="<?php echo htmlspecialchars($_SESSION['user']->getEmail()); ?>" >
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
                            <input type="text" class="form-control" id="un" placeholder="Enter username" name="un" value="<?php echo htmlspecialchars($_SESSION['user']->getUsername()); ?>" >
                            <span class="<?php echo $unClass; ?>"></span>
                        </div>
                        <div class="col-sm-2">
                            <p class="error">
                                <?php echo $un_error; ?>
                            </p>
                        </div>
                    </div>
                    <div class="<?php echo $fnError; ?>">
                        <label class="control-label col-sm-4" for="fn">First Name:</label>
                        <div class="col-sm-4">          
                            <input type="text" class="form-control" id="fn" placeholder="Enter first name" name="fn" value="<?php echo htmlspecialchars($_SESSION['user']->getfName()); ?>" >
                            <span class="<?php echo $fnClass; ?>"></span>
                        </div>
                        <div class="col-sm-2">
                            <p class="error">
                                <?php echo $fn_error; ?>
                            </p>
                        </div>
                    </div>
                    <div class="<?php echo $lnError; ?>">
                        <label class="control-label col-sm-4" for="fn">Last Name:</label>
                        <div class="col-sm-4">          
                            <input type="text" class="form-control" id="ln" placeholder="Enter last name" name="ln" value="<?php echo htmlspecialchars($_SESSION['user']->getlName()); ?>" >
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
                            <button type="submit" class="btn btn-primary">Update</button><br>
                        </div>
                    </div>



                    <br>
                    <div class="centerborder">
                        
                            <a class="btn btn-primary btn-sml" href="index.php?action=accountInfo" role="button">Account Info</a>
                            <a class="btn btn-primary btn-sml" href="index.php?action=viewOrders" role="button">Orders</a>
                            <a class="btn btn-primary btn-sml" href="index.php?action=resetPw" role="button">Reset Password</a>
                        
                    </div>

            </div>
        </div>

        <footer class="footer">
            <?php include('./footer.php'); ?>
        </footer>
</html>