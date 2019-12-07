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
        <?php include ('css/css.php'); ?> 
    </head>
    <body>
        <?php include('nav.php'); ?> 
        <div class="container">
            <div class="center">
             <h2>Add Product</h2>
            </div>
            <div class="jumbotron">
           
            <form class="form-horizontal" action="index.php" method='post' enctype="multipart/form-data">
                <input type="hidden" name="action" value="valAddProduct">
                <div class="<?php echo $nameError; ?>">
                    <label class="control-label col-sm-4" for="name">Product Name:</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="name" placeholder="Enter product name" name="name" value="<?php echo htmlspecialchars($name); ?>">
                        <span class="<?php echo $nameClass; ?>"></span>
                    </div>
                    <div class="col-sm-2">
                        <p class="error">
                            <?php echo $name_error; ?>
                        </p>
                    </div>
                </div>
                <div class="<?php echo $pdError; ?>">
                    <label class="control-label col-sm-4" for="pwd">Product Description:</label>
                    <div class="col-sm-4">          
                        <input type="text" class="form-control" id="pd" placeholder="Enter product description" name="pd" value="<?php echo htmlspecialchars($pd); ?>">
                        <span class="<?php echo $pdClass; ?>"></span>
                    </div>
                    <div class="col-sm-2">
                        <p class="error">
                            <?php echo $pd_error; ?>
                        </p>
                    </div>

                </div>

                <div class="<?php echo $priceError; ?>">
                    <label class="control-label col-sm-4" for="price">Set Price:</label>
                    <div class="col-sm-4">          
                        <input type="text" class="form-control" id="price" placeholder="Set product price" name="price" value="<?php echo htmlspecialchars($price); ?>">
                        <span class="<?php echo $priceClass; ?>"></span>
                    </div>
                    <div class="col-sm-2">
                        <p class="error">
                            <?php echo $price_error; ?>
                        </p>
                    </div>

                </div>

                <div class="<?php echo $qError; ?>">
                    <label class="control-label col-sm-4" for="role">Quantity:</label>
                    <div class="col-sm-4">          
                        <select name="quantity">
                            <option value="<?php echo $q; ?>"><?php echo $q; ?></option>
                            <?php
                            for ($i = 1; $i <= 20; $i++) {
                                ?>
                                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php
                            }
                            ?>
                        </select>
                        <span class="<?php echo $qClass; ?>"></span>
                    </div>
                    <div class="col-sm-2">
                        <p class="error">
                            <?php echo $q_error; ?>
                        </p>
                    </div>

                </div>

                <div class="form-group">
                    <label class="control-label col-sm-4" for="price">Add Image:</label>
                    <div class="col-sm-4">          
                        <input type="file" class="form-control" id="image"  name="image" >

                    </div>
                    <div class="col-sm-2">
                        <p class="error">
                            <?php echo $image_error; ?>
                        </p>
                    </div>

                </div>
                <div class="form-group"> 
                    <div class="col-sm-offset-4 col-sm-10">
                        <button type="submit" class="btn btn-default">Add Product</button>
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
