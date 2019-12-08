<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Shop</title>
        <?php include ('css/css.php'); ?>
        <script src="js/showDesc.js"></script>

    </head>
    <body>
        <main id="select">

            <?php include('nav.php'); ?> 
            <div class="container" >
                <h2>Shop</h2>
                <div class="jumbotron" >
                    <div class="row">
                        <?php
                        foreach ($products as $p) {
                            ?>  
                            <form action="index.php" method="post">
                                <input type="hidden" name="action" value="addToCart">
                                <input type="hidden" name="id"  value="<?php echo $p->getId(); ?>">
                                <div class="col-md-<?php echo $bootstrapColWidth; ?>">

                                    <div class="thumbnail" id="shop">
                                        <img class="resize"  src='<?php echo $p->getImage(); ?>' >
                                        <ul style="list-style-type:none;">

                                            <li><a href="index.php?action=viewProduct&amp;id=<?php echo $p->getID(); ?>"> <p id="fontSize"><?php echo mb_strimwidth($p->getName(), 0, 40, "..."); ?></p></a></li>
                                            <li><p id="fontSize">$<?php echo $p->getPrice(); ?></p></li>
                                                
                                            <li><p id="fontSize"> <select name="quantity">
                                                        <?php if (isset($_SESSION['cart'], $_SESSION['cart'][$p->getId()])) { ?>
                                                            <?php for ($i = 1; $i <= (((int) $p->getQuantity()) - ((int) $_SESSION['cart'][(int) $p->getId()]['qty'])); $i++) { ?>
                                                                <option value="<?php echo $i ?>"><?php echo $i ?></option>

                                                            <?php } ?>
                                                        <?php } ?>


                                                        <?php if (empty($_SESSION['cart']) || isset($_SESSION['cart'][$p->getId()]) === false) { ?>
                                                            <?php for ($i = 1; $i <= $p->getQuantity(); $i++) { ?>

                                                                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                                <?php
                                                            }
                                                            ?>
                                                        <?php } ?>
                                                    </select></p>

                                            </li>

                                            <li><input type="submit"  class="btn btn-primary btn-sml" value="Add To Cart"></li>

                                        </ul>



                                        </form>
                                    </div>


                                </div>
                                <?php
                                $rowCount++;
                                if ($rowCount % $numOfCols == 0) {
                                    echo '</div><div class="row">';
                                }
                            }
                            ?>

                    </div>


                    <a class="btn btn-primary btn-lg" href="index.php?action=viewCart"  role="button">Go To Cart</a>
                </div>

            </div>
            <footer class="footer">
                <?php include('./footer.php'); ?>
            </footer>
        </main>
    </body>
</html>
