<!DOCTYPE html>
<html lang="en">
    <head>
        <title>DeDiSystems</title>
        <?php include ('css/css.php'); ?> 
    </head>
    <body>
        <?php include('nav.php') ?>
        <h2 class="center">Contact Us</h2>
        <div class="container">
            <div class="jumbotron">
                <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
<h3 class="center">Send Us A Message!</h3>
<p class="center" style="color:red; font-weight: bold;">We would love to hear your opinions and make DeDiSystems your goto for PA Rentals for the future </p>
                <form class="form-horizontal" action="index.php" method="post">
                    <input type="hidden" name="action" value="valUserMessage">
                    <div class="<?php echo $emailError; ?>">
                        <label class="control-label col-sm-2" for="email">Email:</label>
                        <div class="col-sm-6">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" value="<?php echo htmlspecialchars($email); ?>">
                            <span class="<?php echo $emailClass; ?>"></span>
                        </div>
                        <div class="col-sm-2">
                            <p class="error">
                                <?php echo $email_error; ?>
                            </p>
                        </div>
                    </div>
                    <div class="<?php echo $mError; ?>">
                        <label class="control-label col-sm-2" for="message">Message:</label>
                        <div class="col-sm-6"> 
                            <textarea class="form-control" id="message" name="message" rows="15" style="width:100%;  resize: none" placeholder="Enter message"><?php echo htmlspecialchars($message); ?></textarea>
                            <span class="<?php echo $mClass; ?>"></span>
                        </div>
                        <div class="col-sm-2">
                            <p class="error">
                                <?php echo $m_error; ?>
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
        <?php include('footer.php'); ?>
    </body>
</html>