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

                <div class ="center">
                    <h2><?php echo " " . $_SESSION['user']->getfName() . " " . $_SESSION['user']->getlName(); ?></h2>
                    <p>
                        <?php echo $message ?>
                    </p>
                </div>

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
    </body>
</html>
